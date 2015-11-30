<?php

/**
 * This is the model class for table "dd_business_quote_file".
 *
 * The followings are the available columns in table 'dd_business_quote_file':
 * @property string $Id
 * @property string $Quote
 * @property string $Title
 * @property string $FileName
 * @property string $FileType
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property DdBusinessQuote $quote
 */
class DBBusinessQuoteFile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBBusinessQuoteFile the static model class
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
		return 'dd_business_quote_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Quote, Created', 'required'),
			array('Quote', 'length', 'max'=>11),
			array('Title, FileName, FileType', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Quote, Title, FileName, FileType, Created', 'safe', 'on'=>'search'),
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
			'quote' => array(self::BELONGS_TO, 'DdBusinessQuote', 'Quote'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Quote' => 'Quote',
			'Title' => 'Title',
			'FileName' => 'File Name',
			'FileType' => 'File Type',
			'Created' => 'Created',
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
		$criteria->compare('Quote',$this->Quote,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('FileName',$this->FileName,true);
		$criteria->compare('FileType',$this->FileType,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function save()
    {
        $this->Created = gmdate('Y-m-d H:i:s');

        return parent::save();
    }
}