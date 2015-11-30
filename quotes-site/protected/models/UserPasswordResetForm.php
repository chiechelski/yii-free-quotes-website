<?php

/**
 * This is the model class for table "dd_user".
 *
 * The followings are the available columns in table 'dd_user':
 * @property string $Password
 * @property string $Email
 *
 * The followings are the available model relations:
 * @property St4Link[] $st4Links
 * @property St4Country $country
 */
class UserPasswordResetForm extends CFormModel
{
    const WEAK = 0;
    const STRONG = 1;

    public $Email = null;
    public $Password = null;
    public $Password2 = null;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Email, Password, Password2', 'required'),
            array('Email', 'email', 'checkMX' => true),
            array('Password2', 'compare', 'compareAttribute' => 'Password'),
            array('Password', 'passwordStrength', 'strength' => self::STRONG),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Password' => 'Password',
            'Password2' => 'Confirm Password',
			'Email' => 'Email',
		);
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
}