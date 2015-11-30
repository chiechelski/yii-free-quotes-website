<?php

/**
 * This is the model class for table "st4_country".
 *
 * The followings are the available columns in table 'st4_country':
 * @property string $Id
 * @property string $Name
 * @property string $Currency
 * @property string $Timezone
 * @property string $Created
 * @property string $Modified
 * @property string $Active
 *
 * The followings are the available model relations:
 * @property St4User[] $st4Users
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return 'st4_country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Currency, Created, Modified', 'required'),
			array('Name', 'length', 'max'=>50),
			array('Currency', 'length', 'max'=>32),
			array('Timezone', 'length', 'max'=>10),
			array('Active', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Currency, Timezone, Created, Modified, Active', 'safe', 'on'=>'search'),
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
			'st4Users' => array(self::HAS_MANY, 'St4User', 'Country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Name' => 'Name',
			'Currency' => 'Currency',
			'Timezone' => 'Timezone',
			'Created' => 'Created',
			'Modified' => 'Modified',
			'Active' => 'Active',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('Timezone',$this->Timezone,true);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('Modified',$this->Modified,true);
		$criteria->compare('Active',$this->Active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}