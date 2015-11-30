<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    public $user;

	public function authenticate()
	{
        //$user = new User();
        $user = User::model()->find('Username = :userName OR Email=:email',
                array(':userName' => CHtml::encode($this->username), ':email' => CHtml::encode($this->username)));

        if ($user)
        {
            // if ($user->password === md5($user->salt.$this->password)) {
            if ((CPasswordHelper::verifyPassword($this->password, $user->InitialPassword)
                && $user->ApplicationType == 'dd')
                || ($user->InitialPassword === $this->password))
            {
                $this->errorCode = self::ERROR_NONE;
                $this->setUser($user);
            }
        }

        unset($user);
        return !$this->errorCode;

        /*$authenticatedUser = $user->authenticate($this->username, $this->password);
        if (!empty($authenticatedUser))
        {
            $this->setUser($user);
            public $user;
            return true;
        }
        else
			$this->errorCode=self::ERROR_NONE;
        */
        /*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
        */
	}

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(CActiveRecord $user)
    {
        $this->user = $user;
    }
}