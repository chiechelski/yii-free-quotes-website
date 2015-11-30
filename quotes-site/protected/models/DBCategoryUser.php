<?php

/**
 * This is the model class for table "dd_category_user".
 *
 * The followings are the available columns in table 'dd_category_user':
 * @property string $Id
 * @property string $Category
 * @property string $User
 *
 * The followings are the available model relations:
 * @property DdCategory $category
 * @property DdUser $user
 */
class DBCategoryUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCategoryUser the static model class
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
		return 'dd_category_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Category, User', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Category, User', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'DdCategory', 'Category'),
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
			'Category' => 'Category',
			'User' => 'User',
		);
	}

    /**
	 * Save Link View
	 */
    public function linkCategoriesToUser($categories, $userId)
    {
        $userId = (int) $userId;

        // First delete
        self::model()->deleteAll("User = " . (int) $userId);

        // Then link categories
        $db = $connection=Yii::app()->db;

        if (!empty($categories))
        {
            $query =  "INSERT INTO " . $this->tableName() . " (User, Category)";

            $values = array();
            foreach ($categories as $cat)
            {
                $values[] = ' ( ' . $userId . ' , ' .  $cat . ' ) ';
            }

            $query .= ' VALUES ' . implode(',', $values);

            $db->createCommand($query)->execute();
        }

        return true;
    }

    /**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getUserCategories($userId = 0)
	{
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('Category')
                        ->from( $this->tableName() . ' uc')
                        ->where(
                            'User = :User',
                            array(':User' => $userId)
                        );

        $result = $dbCommand->queryAll();

        $categories = array();
        foreach ($result as $res)
        {
            $categories[$res['Category']] = $res['Category'];
        }

        return $categories;
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
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('User',$this->User,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}