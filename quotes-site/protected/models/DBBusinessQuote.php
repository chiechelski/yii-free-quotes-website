<?php

/**
 * This is the model class for table "dd_business_quote".
 *
 * The followings are the available columns in table 'dd_business_quote':
 * @property string $Id
 * @property string $User
 * @property string $Enquiry
 * @property string $Title
 * @property string $Description
 * @property string $Price
 * @property string $Tax
 * @property string $Active
 * @property string $Selected
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property DdCustomerEnquiry $enquiry
 * @property DdUser $user
 */
class DBBusinessQuote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBBusinessQuote the static model class
	 */
    public $File = null;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dd_business_quote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title, Description, User', 'required'),
			array('User, Enquiry', 'length', 'max'=>11),
			array('Title', 'length', 'max'=>255),
			array('Price, Tax', 'length', 'max'=>10),
            array('Price, Tax', 'numerical'),
			array('Active, Selected', 'length', 'max'=>3),
			array('Description, File', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, User, Enquiry, Title, Description, Price, Tax, Active, Selected, Created', 'safe', 'on'=>'search'),
            array('File', 'file', 'allowEmpty' => true, 'types'=>'doc, odt, pdf, docx', 'message' => 'File extension not supported'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'enquiry' => array(self::BELONGS_TO, 'DdCustomerEnquiry', 'Enquiry'),
			'user' => array(self::BELONGS_TO, 'DdUser', 'User'),
		);
	}

    public function getRefNum()
    {
        return 'DDQ' . $this->Id;
    }

    public function loadFiles()
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('qf.*')
                        ->from('dd_business_quote_file qf')
                        ->where(
                            'qf.Quote = :Quote',
                            array(':Quote' => $this->Id));

        $files = $dbCommand->queryAll();

        return $files;
    }

    public function getEnquiryCustomer()
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('ce.User')
                        ->from('dd_customer_enquiry ce')
                        ->where(
                            'ce.Id = :Enquiry',
                            array(':Enquiry' => $this->Enquiry));

        $user = $dbCommand->queryAll();

        if (empty($user[0]['User']))
            return 0;
        else
            return $user[0]['User'];
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'User' => 'Supplier',
			'Enquiry' => 'Enquiry',
			'Title' => 'Title',
			'Description' => 'Description',
			'Price' => 'Price',
			'Tax' => 'Tax',
			'Active' => 'Active',
			'Selected' => 'Selected',
			'Created' => 'Created',
            'File' => 'Attachment (use this field to upload a file for this quote)',
		);
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
		$criteria->compare('Enquiry',$this->Enquiry,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Price',$this->Price,true);
		$criteria->compare('Tax',$this->Tax,true);
		$criteria->compare('Active',$this->Active,true);
		$criteria->compare('Selected',$this->Selected,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function save()
    {
        $this->Created = gmdate('Y-m-d H:i:s');

        return parent::save();
    }
}