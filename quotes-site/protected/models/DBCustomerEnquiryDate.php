<?php

/**
 * This is the model class for table "dd_customer_enquiry_date".
 *
 * The followings are the available columns in table 'dd_customer_enquiry_date':
 * @property string $Id
 * @property string $Enquiry
 * @property string $From
 * @property string $To
 *
 * The followings are the available model relations:
 * @property DdCustomerEnquiry $enquiry
 */
class DBCustomerEnquiryDate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCustomerEnquiryDate the static model class
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
		return 'dd_customer_enquiry_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Enquiry, From, To', 'required'),
			array('Enquiry', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Enquiry, From, To', 'safe', 'on'=>'search'),
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
			'From' => 'From',
			'To' => 'To',
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
		$criteria->compare('Enquiry',$this->Enquiry,true);
		$criteria->compare('From',$this->From,true);
		$criteria->compare('To',$this->To,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}