<?php

/**
 * This is the model class for table "dd_customer_enquiry_category".
 *
 * The followings are the available columns in table 'dd_customer_enquiry_category':
 * @property string $Enquiry
 * @property string $Category
 */
class DBCustomerEnquiryCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCustomerEnquiryCategory the static model class
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
		return 'dd_customer_enquiry_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Enquiry, Category', 'required'),
			array('Enquiry, Category', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Enquiry, Category', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Enquiry' => 'Enquiry',
			'Category' => 'Category',
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

		$criteria->compare('Enquiry',$this->Enquiry,true);
		$criteria->compare('Category',$this->Category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCategories($enquiriesId = array())
    {
        if (empty($enquiriesId))
            return array();

        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('c.Id, e.Enquiry, c.Name')
                        ->from('dd_customer_enquiry_category e')
                        ->join('dd_category c', 'c.Id = e.Category')
                        ->where(array('in', 'e.Enquiry', $enquiriesId));

        $categories = $dbCommand->queryAll();

        $result = array();
        foreach ($categories as $category)
        {
            $result[$category['Enquiry']] = $category['Name'];
        }

        return $result;
    }

}