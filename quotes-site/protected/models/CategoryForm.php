<?php

/**
 * CategoryForm class.
 * CategoryForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CategoryForm extends CFormModel
{
    public $firstName;
	public $lastName;
	public $email;

	public $subject;
    public $category;
    public $subcategory;
    public $phoneNumber;

    public $location;
    public $address1;
    public $suburb;
    public $city;
    public $postcode;
    public $country;

    public $when;
    public $specificDate;
    public $specificFromHour;
    public $specificToHour;

    public $service;
	public $jobDescription;

	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('firstName, lastName, email, jobDescription,  when', 'required'),

            array('service', 'requiredSpecial'),
			// email has to be a valid email address
			array('email', 'email'),
            array('firstName, lastName, email, location, address1, suburb, city, postcode, country, service, category, phoneNumber, specificDate, specificFromHour, specificToHour, service', 'safe'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'captchaAction' => 'site/captcha'),
		);
	}

    public function requiredSpecial($attribute,$params)
	{
        if (empty($this->service) && empty($this->category))
        {
            $this->addError('service', 'Job description cannot be blank.');
            return false;
		}
        return true;
    }

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'firstName' => 'First name',
            'lastName' => 'Last name',
            'verifyCode' => 'Verification code',
            'service' => 'What do you need?',
            'body' => 'Job description',
            'address1' => 'Address',
            'location' => 'Where do you need?',
            'when' => 'When do you need?',
		);
	}
}