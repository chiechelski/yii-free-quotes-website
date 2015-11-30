<?php

/**
 * This is the model class for table "dd_user_password_reset".
 *
 * The followings are the available columns in table 'dd_user_password_reset':
 * @property string $Id
 * @property string $User
 * @property string $Hash
 * @property string $ExpireDate
 * @property string $IpAddress
 *
 * The followings are the available model relations:
 * @property DdUser $user
 */
class DBUserPasswordReset extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBUserPasswordReset the static model class
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
		return 'dd_user_password_reset';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('User', 'length', 'max'=>11),
			array('Hash', 'length', 'max'=>50),
			array('ExpireDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, User, Hash, ExpireDate', 'safe', 'on'=>'search'),
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
			'User' => 'User',
			'Hash' => 'Hash',
			'ExpireDate' => 'Expire Date',
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
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Hash',$this->Hash,true);
		$criteria->compare('ExpireDate',$this->ExpireDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}