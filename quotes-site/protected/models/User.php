<?php

/**
 * This is the model class for table "dd_user".
 *
 * The followings are the available columns in table 'dd_user':
 * @property string $Id
 * @property string $Username
 * @property string $Password
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $UserType
 * @property string $CompanyName
 * @property string $Address1
 * @property string $Address2
 * @property string $City
 * @property string $State
 * @property string $PostCode
 * @property string $Country
 * @property string $Phone
 * @property string $PaymentType
 * @property string $PaymentAccount
 * @property string $GoogleAnalytics
 * @property string $Lang
 * @property string $UserVerification
 * @property string $Created
 * @property string $Modified
 * @property string $Active
 * @property integer $Validated
 *
 * The followings are the available model relations:
 * @property St4Link[] $st4Links
 * @property St4Country $country
 */
class User extends CActiveRecord
{
    const WEAK = 0;
    const STRONG = 1;

    public $validationHash = 354;

    public $linkHash;

    static $languages = array('en-uk' => 'English (UK)', 'pt-br' => 'Portugues (BR)', 'es' => 'Espanol');

    static $allRoles = array('administrator' => 'administrator', 'supplier' => 'supplier', 'customer' => 'customer');

    static $rolesSignup = array('supplier' => 'supplier', 'customer' => 'customer');

    /**
     * New fields
     */

    public $RandomPassword = null;
    public $Password2 = null;
    public $Email2 = null;

    public $PlanType = null;
    public $TermsAndConditions = null;

    //will hold the encrypted password for update actions.
    public $InitialPassword;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'dd_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Email, UserType', 'required'),
            array('Password, Password2, Email2', 'required', 'on' => 'insert'),
			array('Validated', 'numerical', 'integerOnly' => true),
			array('Username, FirstName, LastName, City, State', 'length', 'max'=>50),
			array('PaymentAccount, UserVerification', 'length', 'max'=>32),
            array('Password', 'length', 'max'=>64),
			array('Email, Email2, CompanyName, Address1, Address2', 'length', 'max'=>100),
			array('PostCode', 'length', 'max'=>10),
            array('Phone', 'length', 'max'=>25),
            array('Mobile', 'length', 'max'=>25),
			array('Country', 'length', 'max'=>11),
			array('PaymentType', 'length', 'max'=>6),
			array('GoogleAnalytics', 'length', 'max'=>64),
			array('Lang', 'length', 'max'=>9),
			array('Active', 'length', 'max'=>3),
			//array('UserType', 'safe'),

            array('Email', 'email','checkMX'=>true),
            array('Password2', 'compare', 'compareAttribute' => 'Password'/*, 'on' => 'register'*/),
            array('Email2', 'compare', 'compareAttribute' => 'Email', 'on' => 'i'),
            array('Password', 'passwordStrength', 'strength'=>self::STRONG),
            array('UserType', 'checkAtLeastOneCheckBox'),
            // array('Username', 'checkUniqueUsername'),
            array('Email', 'checkUniqueEmail'),

            array('PlanType, ShowOnDirectory', 'safe'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Username, Password, ApplicationId, FirstName, LastName, Email, Email2, UserType, CompanyName, Address1, Address2, City, State, PostCode, Country, Phone, PaymentType, PaymentAccount, GoogleAnalytics, Lang, UserVerification, Created, Modified, Active, Validated', 'safe', 'on'=>'search'),
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

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Username' => 'Username',
			'Password' => 'Password',
            'Password2' => 'Confirm Password',
			'ApplicationType' => 'Application',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Email' => 'Email',
            'Email2' => 'Confirm Email',
			'UserType' => 'Account Type',
			'CompanyName' => 'Company Name',
			'Address1' => 'Address1',
			'Address2' => 'Address2',
			'City' => 'City',
			'State' => 'State',
			'PostCode' => 'Post Code',
			'Country' => 'Country',
			'Phone' => 'Phone',
			'PaymentType' => 'Payment Type',
			'PaymentAccount' => 'Payment Account',
			'GoogleAnalytics' => 'Google Analytics',
			'Lang' => 'Lang',
			'UserVerification' => 'User Verification',
			'Created' => 'Created',
			'Modified' => 'Modified',
			'Active' => 'Active',
			'Validated' => 'Validated',
            'RandomPassword' => 'Generate Random Password'
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
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('ApplicationId',$this->ApplicationId,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Email',$this->Email,true);
        $criteria->compare('Email2',$this->Email2,true);
		$criteria->compare('UserType',$this->UserType,true);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('Address1',$this->Address1,true);
		$criteria->compare('Address2',$this->Address2,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('PostCode',$this->PostCode,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('PaymentType',$this->PaymentType,true);
		$criteria->compare('PaymentAccount',$this->PaymentAccount,true);
		$criteria->compare('GoogleAnalytics',$this->GoogleAnalytics,true);
		$criteria->compare('Lang',$this->Lang,true);
		$criteria->compare('UserVerification',$this->UserVerification,true);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('Modified',$this->Modified,true);
		$criteria->compare('Active',$this->Active,true);
		$criteria->compare('Validated',$this->Validated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function checkAtLeastOneCheckBox($attribute, $params)
    {
        if (!empty($this->UserType))
            return true;

        $this->addError($attribute, 'You must choose at least one Account Type!');
    }

    public function checkUniqueUsername($attribute, $params)
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('Id')
                        ->from('dd_user u');

        if (!empty($this->Id))
        {
            $dbCommand->where(
                ' Username  = :username AND Id <> :id ',
                array(
                    'username' => $this->Username, 'id' => $this->Id
                )
            );
        }
        else
        {
             $dbCommand->where(
                ' Username  = :username',
                array('username' => $this->Username)
            );
        }

        $result = $dbCommand->queryAll();

        if (empty($result))
            return true;

        $this->addError($attribute, 'The selected username has been already assigned for another user. Please choose another username.');
    }

    public function checkUniqueEmail($attribute, $params)
    {
        if ($this->ApplicationType != 'dd')
            return true;

        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('Id')
                        ->from('dd_user u');

        if (!empty($this->Id))
        {
            $dbCommand->where(
                ' Email  = :email AND Id <> :id ',
                array(
                    'email' => $this->Email, 'id' => $this->Id
                )
            );
        }
        else
        {
             $dbCommand->where(
                ' Email  = :email',
                array('email' => $this->Email)
            );
        }

        $result = $dbCommand->queryAll();

        if (empty($result))
            return true;

        $this->addError($attribute, 'The selected email address is already in use. Please click on <a href="/login/reset">this link</a> to reset your password.');
    }

    public function getEmailName()
    {
        $name = 'There';
        if (!empty($this->FirstName))
        {
            $name = ucfirst($this->FirstName);
            if (!empty($this->LastName))
                $name .= ' ' . ucfirst($this->LastName);
        }
        elseif (!empty($this->LastName))
        {
            $name = ucfirst($this->LastName);
        }
        elseif (!empty($this->CompanyName))
        {
            $name = ucfirst($this->CompanyName);
        }

        return $name;
    }

    public function resetPassword()
    {
        $hash = md5(uniqid('DD'));

        // Reseting Password
        $resetPassword = new DBUserPasswordReset();
        $resetPassword->User = $this->Id;
        $resetPassword->Hash = $hash;
        $resetPassword->ExpireDate = date('Y-m-d H:i:s', strtotime('+2 hour', mktime()));
        $resetPassword->IpAddress = ip2long($_SERVER['REMOTE_ADDR']);
        $resetPassword->save();

        //set mail properties
        $mail = new YiiMailer('resetPassword',
            array(
                'Id' => $this->Id,
                'Name' => $this->getEmailName(),
                'LinkHash' => $hash,
                'Description' => 'Reset Password'
            )
        );

        $mail->setFrom(Yii::app()->params['infoEmail'], Yii::app()->params['infoEmailName']);
        $mail->setSubject('Done & Dusted - Reset your Passsword');
        $mail->setTo($this->Email);

        //send
        if ($mail->send())
            return true;
        else
            return false;
    }

    public function sendEmail($type = 'welcomeCustomer', $signupFromEnquiry = false, $params2 = array())
    {
        $title = '';

        $params = array(
            'Id' => $this->Id,
            'Name' => $this->getEmailName(),
            'Description' => 'Reset Password',
            'signupFromEnquiry' => $signupFromEnquiry,
        );

        if (!empty($params2))
        {
            foreach ($params2 as $key => $val)
                $params[$key] = $val;
        }

        switch ($type)
        {
            case 'supplierHired':
                $title = 'Great news! ' . $params['CustomerName'] . ' has selected your services for ' . $params['JobTitle'] . '';
                $params['Description'] = $title;
                break;
            case 'supplierNotHired':
                $title = '' . $params['CustomerName'] . ' has not selected your services for ' . $params['JobTitle'] . '';
                $params['Description'] = $title;
                break;
            case 'supplierQuoteForCustomer':
                $title = 'Great news! ' . $params['SupplierName'] . ' has submitted a quote for ' . $params['JobTitle'] . '';
                $params['Description'] = $title;
                break;

            case 'welcomeCustomer':
            case 'jobEnquiry':

                $title = 'Welcome';
                $params['Description'] = 'Welcome to Done & Dusted!';
                if ($type == 'jobEnquiry')
                {
                    $title = 'Job Enquiry';
                    $params['Description'] = 'Job Enquiry!';
                }

                 // Reseting Password
                if ($signupFromEnquiry)
                {
                    $hash = md5(uniqid('DD'));
                    $resetPassword = new DBUserPasswordReset();
                    $resetPassword->User = $this->Id;
                    $resetPassword->Hash = $hash;
                    $resetPassword->ExpireDate = date('Y-m-d H:i:s', strtotime('+2 hour', mktime()));
                    $resetPassword->IpAddress = ip2long($_SERVER['REMOTE_ADDR']);
                    $resetPassword->save();
                }
                else
                    $hash = rand(100,999) . base64_encode(($this->Id + $this->validationHash) . rand(100,999));

                $params['LinkHash'] = $hash;
                $this->linkHash = $hash;

                break;
        }

        // just to keep an eye on the emails
        $bcc = 'gustavo@donedusted.co.nz';

        //set mail properties
        $mail = new YiiMailer($type, $params);

        $mail->setFrom(Yii::app()->params['infoEmail'], Yii::app()->params['infoEmailName']);
        $mail->setSubject('Done & Dusted - ' . $params['Description']);
        $mail->setTo($this->Email);

        if (!empty($bcc))
            $mail->setBcc($bcc);

        //send
        if ($mail->send())
            return true;
        else
            return false;
    }

    public function afterFind()
    {
        //reset the password to null because we don't want the hash to be shown.
        $this->InitialPassword = $this->Password;

        $this->Password = null;

        parent::afterFind();
    }

    public function beforeSave()
    {
        // in this case, we will use the old hashed password.
        if (empty($this->Password) && !empty($this->InitialPassword))
            $this->Password = $this->InitialPassword;

        if (empty($this->Country))
            $this->Country = null;

        return parent::beforeSave();
    }

    public function getNbrSuppliers($type = '', $params = array())
    {
        $user = Yii::app()->user->getInfo();
        $db = $connection=Yii::app()->db;

        if ($type == 'day')
        {
            $now = date("Y-m-d");

            $date = array($now . ' 00:00:00', $now . ' 23:59:59');

            $dateFormat = '%Hh';
            $groupBy = '%Y-%m-%d%H';
        }
        else
        {
            $now = date("Y-m-d", strtotime("-1 month"));
            $after = date("Y-m-d");

            $date = array($now . ' 00:00:00', $after . ' 23:59:59');

            $dateFormat = '%d %b';
            $groupBy = '%Y-%m-%d';
        }

        $groupBy = " DATE_FORMAT(U.Created, '" . $groupBy . "') ";

        $sql = "
            SELECT SQL_CACHE DATE_FORMAT(U.Created, '" . $dateFormat . "') as Day,
                COUNT(U.Id) AS NbrCreated
            FROM " . $this->tableName() . " U
            WHERE
                U.UserType = 'supplier' AND
                U.Created BETWEEN '" . $date[0] . "' AND '" . $date[1] . "'
            GROUP BY " . $groupBy . ";";

        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryAll();

        if (!empty($result))
            return $result;
        else
            array();
    }

    public function getNbrEnquiries($type = '', $params = array())
    {
        $user = Yii::app()->user->getInfo();
        $db = $connection=Yii::app()->db;

        if ($type == 'day')
        {
            $now = date("Y-m-d");

            $date = array($now . ' 00:00:00', $now . ' 23:59:59');

            $dateFormat = '%Hh';
            $groupBy = '%Y-%m-%d%H';
        }
        else
        {
            $now = date("Y-m-d", strtotime("-1 month"));
            $after = date("Y-m-d");

            $date = array($now . ' 00:00:00', $after . ' 23:59:59');

            $dateFormat = '%d %b';
            $groupBy = '%Y-%m-%d';
        }

        $groupBy = " DATE_FORMAT(CU.Created, '" . $groupBy . "') ";

        $sql = "
            SELECT SQL_CACHE DATE_FORMAT(CU.Created, '" . $dateFormat . "') as Day,
                COUNT(CU.Id) AS NbrCreated
            FROM dd_customer_enquiry CU
            WHERE
                CU.Created BETWEEN '" . $date[0] . "' AND '" . $date[1] . "'
            GROUP BY " . $groupBy . ";";

        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryAll();

        if (!empty($result))
            return $result;
        else
            array();
    }

    public function notDeleted()
    {
        return false;
    }

     /**
     * Create random username
     * @param type $lenght
     * @return type
     */
    public static function createRandomUsername($lenght = 10)
    {
        $chars   = "QWERTZUIOPASDFGHJKLYXCVBNMasdfghjklqwertzuiopyxcvbnm1234567890";
        $shuffle = str_split($chars);
        shuffle($shuffle);
        $string  = implode("", $shuffle);
        return substr($string, 0, $lenght).time();
    }

    public static function prepareUserForAuthorisation($id, $username, $type = '')
    {
        if (strpos($username, "@"))
        {
            $user = self::model()->find('(LOWER(Email) = ? OR ApplicationId = ?) AND ApplicationType = ?', array($username, $id, $type));
        }
        else
        {
            $user = self::model()->find('LOWER(Username) = ?', array($username));
        }

        if ($user instanceof user)
        {
            return $user;
        }

        return NULL;
    }

    public function passwordStrength($attribute, $params)
    {
        if ($params['strength'] === self::WEAK)
            $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';
        elseif ($params['strength'] === self::STRONG)
            $pattern = '/^(?=.*[0-9A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%\.\/]{6,}$/';

        $passwordVal = $this->$attribute;

        if (!preg_match($pattern, $this->$attribute) && !empty($passwordVal))
            $this->addError($attribute, 'Your password is not strong enough!');
    }

    public function getQuotes()
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('bc.Enquiry, ce.Title, ce.Description, bc.Id, bc.Title, bc.Price, bc.Tax, bc.Active, bc.Selected')
                        ->from('dd_business_quote bc')
                        ->join('dd_customer_enquiry ce', 'bc.Enquiry = ce.Id');

        $dbCommand->where(
            'bc.User = :user ',
            array(':user' => $this->Id)
        );

        $result = $dbCommand->queryAll();

        return $result;
    }

    public function getAccountType()
    {
        if ($this->isBusiness())
            return 'business';
        else
            return 'customer';
    }

    public function displayUser()
    {
        if ($this->ApplicationType == 'google')
            return $this->Email;
        else
            return $this->getEmailName();
    }

    public function authenticate($username, $password)
    {
        $db = $connection=Yii::app()->db;

        $sql = "SELECT * FROM dd_user WHERE Username = '" . $username . "' AND Password = '" . $password . "' ";
        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryRow();

        if (!empty($result))
            return $result;
        else
            false;
    }

    public function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }

    public function getAddress()
    {
        $address = array();

        if (!empty($this->Address1))
            $address[] = 'Address: ' . $this->Address1;

        if (!empty($this->City))
            $address[] = 'City: ' . $this->City;

        if (!empty($this->PostCode))
            $address[] = 'PostCode: ' . $this->PostCode;

        return implode('<br />', $address);
    }

    public function isAdmin()
    {
        return strpos($this->UserType, 'administrator') !== false;
    }

    public function isBusiness()
    {
        return strpos($this->UserType, 'supplier') !== false;
    }

    public function isCustomer()
    {
        return strpos($this->UserType, 'customer') !== false;
    }

    public function transformUserType($toArray = false)
    {
        $userTypes = '';
        if (is_array($this->UserType) && !$toArray)
        {
            $userTypes = array();

            if (!empty($this->UserType))
            {
                foreach ($this->UserType as $key => $value)
                {
                    if ($value > 0)
                        $userTypes[] = $key;
                }
            }

            $this->UserType = implode(',', $userTypes);
        }
        else if (!is_array($this->UserType) && $toArray)
        {
            $uTypes = explode(',', $this->UserType);

            $userTypes = array();

            if (!empty($uTypes))
            {
                foreach ($uTypes as $userType)
                {
                    $userTypes[$userType] = 1;
                }
            }

            $this->UserType = $userTypes;
        }
    }

    public function setPassword($password = '')
    {
        $hash = CPasswordHelper::hashPassword($password);

        $this->InitialPassword = $password;

        $this->Password = $hash;
        $this->Password2 = $hash;
    }

    public function save($generatePassword = false, $sendWelcomeEmail = true)
    {
        $this->transformUserType();

        $this->Created = gmdate('Y-m-d H:i:s');
        $this->Modified = gmdate('Y-m-d H:i:s');

        // randomly generating user password - used on customer and supplier page
        if (!empty($_POST['User']['RandomPassword']) || $generatePassword)
        {
            $this->InitialPassword = $this->Password2 = uniqid();
        }

        // adding hash if new user
        if (!empty($this->Password2) && !empty($this->InitialPassword)
            && ($this->InitialPassword == $this->Password2 || (empty($this->Id))))
        {
            $this->setPassword($this->Password2);
        }

        $result = parent::save();

        $this->transformUserType(true);

        if ($sendWelcomeEmail)
            $this->sendEmail('welcomeCustomer');

        return $result;
    }
}