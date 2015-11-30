<?php

/**
 * SuppliersSearchForm class.
 * SuppliersSearchForm is the data structure for keeping
 */
class SuppliersSearchForm extends CFormModel
{
    public $Name;
	public $Email;
    public $Category;
    public $Active = 'Yes';
    public $ShowOnDirectory;
    public $PlanType;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// email has to be a valid email address
			// array('Email', 'email'),
            array('Email, Name, Category, ShowOnDirectory, PlanType, Active', 'safe'),
		);
	}

    public function setNewAttributes()
    {
        if (!empty($_POST['SuppliersSearchForm']))
        {
            $this->attributes = $_POST['SuppliersSearchForm'];
            Yii::app()->session['SuppliersSearchForm'] = $_POST['SuppliersSearchForm'];
        }
        elseif (!empty(Yii::app()->session['SuppliersSearchForm']))
        {
            $this->attributes = Yii::app()->session['SuppliersSearchForm'];
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
                OR LastName LIKE ('" . $name . "%')
                OR CompanyName LIKE ('" . $name . "%')");
        }

        if (!empty($this->Category))
        {
            $criteria->join = 'INNER JOIN dd_category_user cu
                ON cu.User = u.Id
                    AND cu.Category = ' . $this->Category;
        }

        if (!empty($this->Active))
        {
            $criteria->compare('Active', $this->Active);
        }

        if (!empty($this->PlanType))
        {
            $criteria->compare('PlanType', $this->PlanType);
        }

        if (!empty($this->ShowOnDirectory))
        {
            $criteria->compare('ShowOnDirectory', $this->ShowOnDirectory);
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
			'Email' => 'Supplier Email',
            'ShowOnDirectory' => 'OnSite',
            'PlanType' => 'PlanType',
		);
	}
}