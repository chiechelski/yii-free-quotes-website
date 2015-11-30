<?php

/**
 * EnquiriesSearchForm class.
 * EnquiriesSearchForm is the data structure for keeping
 */
class EnquiriesSearchForm extends CFormModel
{
    public $RefNum;
    public $Name;
	public $Email;
    public $Category;
    public $Priority;
    public $Active = 'Yes';

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// email has to be a valid email address
			// array('Email', 'email'),
            array('RefNum, Name, Email, Active, Category, Priority', 'safe'),
		);
	}

    public function setNewAttributes()
    {
        if (!empty($_POST['EnquiriesSearchForm']))
        {
            $this->attributes = $_POST['EnquiriesSearchForm'];
            Yii::app()->session['EnquiriesSearchForm'] = $_POST['EnquiriesSearchForm'];
        }
        elseif (!empty(Yii::app()->session['EnquiriesSearchForm']))
        {
            $this->attributes = Yii::app()->session['EnquiriesSearchForm'];
        }
    }

    public function applyCriteria(&$criteria)
    {
        if (!empty($this->Name) || !empty($this->Email))
        {
            $criteria->join = "INNER JOIN dd_user u
                ON ce.User = u.Id ";

            if (!empty($this->Name))
            {
                $name = addcslashes($this->Name, '%_\'');
                $criteria->join .= "
                        AND
                        (   u.FirstName LIKE ('" . $name . "%')
                            OR u.LastName LIKE ('" . $name . "%')
                        ) ";
            }

            if (!empty($this->Email))
            {
                $email = addcslashes($this->Email, '%_\'');
                $criteria->join .= " AND u.Email LIKE  ('" . $email . "%')";
            }
        }

        if (!empty($this->Category))
        {
            $criteria->join = 'INNER JOIN dd_customer_enquiry_category cec
                ON ce.Id = cec.Enquiry
                    AND cec.Category = ' . $this->Category;
        }

        if (!empty($this->Priority))
        {
            $criteria->compare('ce.Priority', $this->Priority);
        }

        if (!empty($this->Active))
        {
            $criteria->compare('ce.Active', $this->Active);
        }

        if (!empty($this->RefNum))
        {
            $refnum = str_replace('DDE', '', mysql_real_escape_string(addcslashes($this->RefNum, '%_')));
            $criteria->compare('Id', $refnum);
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