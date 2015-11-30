<?php

/**
 * This is the model class for table "dd_customer_enquiry_note".
 *
 * The followings are the available columns in table 'dd_customer_enquiry_note':
 * @property string $Id
 * @property string $Enquiry
 * @property string $User
 * @property string $Note
 *
 * The followings are the available model relations:
 * @property DdCustomerEnquiry $enquiry
 * @property DdUser $user
 */
class DBCustomerEnquiryNote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCustomerEnquiryNote the static model class
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
		return 'dd_customer_enquiry_note';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Enquiry, Note', 'required'),
			array('Enquiry, User', 'length', 'max' => 11),
			array('Note', 'length', 'max' => 1256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Enquiry, User, Note, Added', 'safe', 'on' => 'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Enquiry' => 'Enquiry',
			'User' => 'User',
			'Note' => 'Note',
            'Added' => 'Added',
		);
	}

    public function save()
    {
        if (empty($this->User))
            $this->User = null;

        $this->Added = gmdate('Y-m-d H:i:s');

        return parent::save();
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
		$criteria->compare('Enquiry',$this->Enquiry,true);
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Note',$this->Note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}