<?php

/**
 * ForgotPasswordForm class.
 * ForgotPasswordForm is the data structure for keeping
 * user login form data. It is used by the 'reset' password action of 'SiteController'.
 */
class ForgotPasswordForm extends CFormModel
{
	public $Email;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email is required
			array('Email', 'required'),

            // existent username
            array('Email', 'checkExistentEmail'),

            // exceed limit
            array('Email', 'checkExceedRequestLimit'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'Email' => 'Enter your email address',
		);
	}

    public function checkExceedRequestLimit($attribute, $params)
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('COUNT(*) as total')
                        ->from('dd_user_password_reset');

        $dbCommand->where(
           ' IpAddress  = :ip
            AND DATE_FORMAT(CURDATE(), \'%d%m%Y\') = DATE_FORMAT(ExpireDate, \'%d%m%Y\') ',
           array('ip' => ip2long($_SERVER['REMOTE_ADDR']))
        );

        $result = $dbCommand->queryAll();

        if (!empty($result[0]['total']) && $result[0]['total'] > 10)
        {
            $this->addError($attribute, 'You exceed the limit of daily password request. Plase contact the Done and Dusted team if you need a help to reset your password.');
            return false;
        }

        return true;
    }

    public function checkExistentEmail($attribute, $params)
    {
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('Id')
                        ->from('dd_user u');

        $dbCommand->where(
           ' Email  = :email',
           array('email' => $this->Email)
        );

        $result = $dbCommand->queryAll();

        if (!empty($result))
            return true;

        $this->addError($attribute, 'The selected email address can not be found on our database. Please insert a different email address to reset the password.');
    }

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if (!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function reset()
	{
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('Id')
                        ->from('dd_user u')
                        ->limit(1);

        $dbCommand->where(
           ' Email  = :email',
           array('email' => $this->Email)
        );

        $user = $dbCommand->queryAll();

        $userModel = User::model()->findByAttributes(array('Id' => @$user[0]['Id']));

        $userModel->resetPassword();

        return true;
	}
}
