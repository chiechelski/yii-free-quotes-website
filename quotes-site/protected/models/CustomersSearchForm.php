<?php

/**
 * CustomersSearchForm class.
 * CustomersSearchForm is the data structure for keeping
 */
class CustomersSearchForm extends CFormModel
{
    public $Name;
	public $Email;
    public $Active = 'Yes';

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// email has to be a valid email address
			// array('Email', 'email'),
            array('Email, Name, Active', 'safe'),
		);
	}

    public function setNewAttributes()
    {
        if (!empty($_POST['CustomersSearchForm']))
        {
            $this->attributes = $_POST['CustomersSearchForm'];
            Yii::app()->session['CustomersSearchForm'] = $_POST['CustomersSearchForm'];
        }
        elseif (!empty(Yii::app()->session['CustomersSearchForm']))
        {
            $this->attributes = Yii::app()->session['CustomersSearchForm'];
        }
    }

    public function applyCriteria(&$criteria)
    {
        if (!empty($this->Email))
        {
            $email = addcslashes($this->Email, '%_\'');
            $criteria->compare('Email', $email, true);
        }

        if (!empty($this->Name))
        {
            $name = addcslashes($this->Name, '%_\'');
            $criteria->addCondition("FirstName LIKE ('" . $name . "%')
                OR LastName LIKE ('" . $name . "%')");
        }

        if (!empty($this->Active))
        {
            $criteria->compare('Active', $this->Active);
        }
    }

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'Email' => 'Email',
		);
	}
}