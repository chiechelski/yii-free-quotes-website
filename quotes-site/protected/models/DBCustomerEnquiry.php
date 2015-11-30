<?php

/**
 * This is the model class for table "dd_customer_enquiry".
 *
 * The followings are the available columns in table 'dd_customer_enquiry':
 * @property string $Id
 * @property string $User
 * @property string $Title
 * @property string $Description
 * @property string $Priority
 * @property string $Proceed
 * @property string $CommissionPaid
 * @property string $Feedback
 * @property string $Active
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property DdBusinessQuote[] $ddBusinessQuotes
 * @property DdUser $user
 * @property DdCategory[] $ddCategories
 */
class DBCustomerEnquiry extends CActiveRecord
{
    public $newCustomer = false;

    public $_objCustomer = null;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCustomerEnquiry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dd_customer_enquiry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title, Description', 'required'),
			array('User, Priority', 'length', 'max'=>11),
			array('Title', 'length', 'max'=>256),
			array('CommissionPaid, Feedback, Active', 'length', 'max'=>3),
			array('Description, ExpectedCompletionDate, ExpectedPaymentDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, User, Title, Description, Priority, Proceed, CommissionPaid, Feedback, Active, Created', 'safe', 'on'=>'search'),
		);
	}

    public function getRefNum()
    {
        return 'DDE' . $this->Id;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ddBusinessQuotes' => array(self::HAS_MANY, 'DdBusinessQuote', 'Enquiry'),
			'user' => array(self::BELONGS_TO, 'DdUser', 'User'),
			'ddCategories' => array(self::MANY_MANY, 'DdCategory', 'dd_customer_enquiry_category(Enquiry, Category)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'User' => 'Customer',
			'Title' => 'Title',
			'Description' => 'Description',
			'Priority' => 'Priority',
			// 'Proceed' => 'Proceed',
            'ExpectedCompletionDate' => 'Expected Completion Date',
            'ExpectedPaymentDate' => 'Expected Payment Date',
			'CommissionPaid' => 'Commission Paid',
			'Feedback' => 'Feedback',
			'Active' => 'Active',
			'Created' => 'Created',
		);
	}

    public function getCustomers($usersId = array())
    {
        if (empty($usersId))
            return array();

        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('u.Id, u.FirstName, u.LastName')
                        ->from('dd_user u')
                        ->where(array('in', 'u.Id', $usersId));

        $customers = $dbCommand->queryAll();

        $result = array();
        foreach ($customers as $customer)
        {
            $result[$customer['Id']] = $customer['FirstName'] . ' ' . $customer['LastName'] ;
        }

        return $result;
    }

    public function getCustomer()
    {
        if (empty($this->User))
            return '';

        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('u.Id, u.FirstName, u.LastName')
                        ->from('dd_user u');

        $dbCommand->where(
            'u.Id = :user',
            array(':user' => $this->User)
        );

        $result = $dbCommand->queryAll();

        $customer = '';
        if (!empty($result))
            $customer = $result[0]['FirstName'] . ' ' . $result[0]['LastName'] ;

        return $customer;
    }

    public function getQuotes($type = '')
    {
        // return array();
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('bc.Id, bc.Title, bc.Price, bc.Tax, bc.Active, bc.Selected, u.CompanyName, GROUP_CONCAT(bqf.Id) Files')
                        ->from('dd_business_quote bc')
                        ->join('dd_user u', 'bc.User = u.Id')
                        ->leftjoin('dd_business_quote_file bqf', 'bc.Id = bqf.Quote')
                         ;

        $user = Yii::app()->user->getInfo();

        $extra = "";
        if ($type == 'Customer')
            $extra .= " AND bc.Active = 'Yes' AND bc.Price > 0 ";
        elseif ($type == 'Supplier')
            $extra .= " AND bc.User = " . $user->Id;

        $dbCommand->where(
            'bc.Enquiry = :enquiry ' . $extra,
            array(':enquiry' => $this->Id)
        );

        $dbCommand->group('bc.Id');

        $result = $dbCommand->queryAll();

        return $result;
    }

    public function confirmQuote($quoteId)
    {
        $db = $connection=Yii::app()->db;

        // TODO - Events
        // Selecting quote
        $query =  "UPDATE dd_business_quote
            SET Selected = 'Yes'
            WHERE Enquiry = " . $this->Id . " AND Id = " . (int) $quoteId . " ;";
        $db->createCommand($query)->execute();

        // Changing other quotes to no
        $query =  "UPDATE dd_business_quote
            SET Selected = 'No', Active = 'No'
            WHERE Enquiry = " . $this->Id . " AND Id <> " . (int) $quoteId . " ;";
        $db->createCommand($query)->execute();


        // Emailing suppliers
        $dbCommand = $db->createCommand()
                        ->select('bc.User, bc.Selected')
                        ->from('dd_business_quote bc')
                        ->where(
                            'bc.Enquiry = :enquiry ',
                            array(':enquiry' => $this->Id)
                        );
        $quotes = $dbCommand->queryAll();

        $customerModel = User::model()->findByPk($this->User);
        foreach ($quotes as $quote)
        {
            $supplierModel = User::model()->findByPk($quote['User']);
            if ($quote['Selected'] == 'Yes')
                $emailType = 'supplierHired';
            else
                $emailType = 'supplierNotHired';

            $supplierModel->sendEmail($emailType, false, array(
                'CustomerName' => $customerModel->getFullName(), 'JobTitle' => $this->Title));
        }
    }

    public function saveCustomerEnquiry($params = array())
    {
        $categoryId = 0;
        $subject = 'No category selected';

        if (!empty($params['category']))
        {
            $categoryModel = new DBCategory;
            $subcategoryList = $categoryModel->getAllSubCategories(array('Id' => $params['category']));

            $categoryId = key($subcategoryList);

            if (!empty($categoryId))
            {
                $categoryList = $categoryModel->getAllCategories(array('Id' => $categoryId));
                $category = $categoryList[0];
            }

            if (!empty($subcategoryList[$categoryId][0]['Name']))
            {
                $subject = $category['Name'] . ' - ' . $subcategoryList[$categoryId][0]['Name'];
                $categoryId = $params['category'];
            }
        }

        if (!empty($params['service']))
            $subject = $params['service'];

        $this->Title = $subject;
        $this->Description = $params['jobDescription'];
        $this->When = $params['when'];

        $this->Address1 = @$params['address1'];
        $this->Address2 = @$params['suburb'];
        $this->City = @$params['city'];
        $this->PostCode = @$params['postcode'];
        $this->Country = 1; // NZ - change it later
        $this->Phone = @$params['phoneNumber'];
        $this->Mobile = @$params['Mobile'];

        // Finding / Creating User
        $customer = User::model()->findByAttributes(array('Email' => $params['email']));

        if (empty($customer->Id))
        {
            $customer = new User;

            $customer->FirstName = @$params['firstName'];
            $customer->LastName = @$params['lastName'];

            $customer->Username = uniqid();

            $customer->UserType = 'customer';

            $customer->Email = $customer->Email2 = @$params['email'];
            $customer->Phone = @$params['phoneNumber'];
            $customer->Address1 = @$params['address1'];
            $customer->Address2 = @$params['suburb'];
            $customer->City = @$params['city'];
            $customer->PostCode = @$params['postcode'];

            $customer->save(true, false);

            $this->newCustomer = true;

            // send welcome email
            $customer->sendEmail('jobEnquiry', true);
        }
        else if (empty($customer->Validated))
            $customer->sendEmail('jobEnquiry', false);
        else
            $customer->sendEmail('jobEnquiry', null);

        $this->_objCustomer = $customer;

        $this->User = $customer->Id;

        $this->save();

        // Saving specific date
        if ($params['when'] == 'specific-date')
        {
            $enquirySpecificDate = new DBCustomerEnquiryDate;
            $enquirySpecificDate->Enquiry = $this->Id;
            $enquirySpecificDate->From = date('Y-m-d', strtotime($params['specificDate'])) . ' ' . $params['specificFromHour'];
            $enquirySpecificDate->To = date('Y-m-d', strtotime($params['specificDate'])) . ' ' . $params['specificToHour'];

            if ($enquirySpecificDate->From < $enquirySpecificDate->To)
                $enquirySpecificDate->save();
        }

        // Enquiry category
        if (!empty($categoryId))
        {
            $enquiryCategory = new DBCustomerEnquiryCategory();
            $enquiryCategory->Enquiry = $this->Id;
            $enquiryCategory->Category = $categoryId;

            $enquiryCategory->save();
        }
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Priority',$this->Priority,true);
		// $criteria->compare('Proceed',$this->Proceed,true);
		$criteria->compare('CommissionPaid',$this->CommissionPaid,true);
		$criteria->compare('Feedback',$this->Feedback,true);
		$criteria->compare('Active',$this->Active,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getSpecificDates()
    {
        $criteria = new CDbCriteria();
        $criteria->compare('Enquiry', $this->Id);

        $dates = DBCustomerEnquiryDate::model()->findAll($criteria);

        return $dates;
    }

    public function getNotes()
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('n.*, u.FirstName')
                        ->from('dd_customer_enquiry_note n')
                        ->join('dd_user u', 'n.User = u.Id');

        $dbCommand->where(
            'n.Enquiry = :enquiry ',
            array(':enquiry' => $this->Id)
        );

        $dbCommand->order('n.Added DESC');

        $notes = $dbCommand->queryAll();

        return $notes;
    }

    public function getCustomerInfo()
    {
        $criteria = new CDbCriteria();
        $criteria->compare('Id', $this->User);

        $user = User::model()->find($criteria);

        return $user;
    }

    public function save()
    {
        if (empty($this->User))
            $this->User = null;

        $this->Created = gmdate('Y-m-d H:i:s');

        return parent::save();
    }
}