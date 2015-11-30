<?php

/**
 * This is the model class for table "dd_category".
 *
 * The followings are the available columns in table 'dd_category':
 * @property string $Id
 * @property string $Name
 * @property string $Url
 * @property string $Parent
 * @property string $Active
 *
 * The followings are the available model relations:
 * @property DBCategory $parent
 * @property DBCategory[] $ddCategories
 */
class DBCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBCategory the static model class
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
		return 'dd_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Url', 'required'),
			array('Name', 'length', 'max'=>50),
			array('Url', 'length', 'max'=>32),
			array('Parent', 'length', 'max'=>11),
			array('Active', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Url, Parent, Active', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'DBCategory', 'Parent'),
			'ddCategories' => array(self::HAS_MANY, 'DBCategory', 'Parent'),
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
			'Url' => 'Url',
			'Parent' => 'Parent',
			'Active' => 'Active',
		);
	}

    /**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getAllCategories($filters = array(), $options = array())
	{
        $db = $connection=Yii::app()->db;

        $dbCommand = $db->createCommand()
                        ->select('*')
                        ->from('dd_category c');

        $where = array();
        $whereVals = array();

        // First level
        $where['Parent'] = 'Parent IS NULL';

        // Filters
        foreach ($filters as $key => $filter)
        {
            if (!empty($filter))
            {
                $where[$key] = $key . ' = :' . $key;
                $whereVals[':' . $key] = $filter;
            }
        }

        // Options
        foreach ($options as $key => $option)
        {
            if ($key == 'NotParent')
            {
                $where['Parent'] = 'Parent IS NOT NULL';

                if (!empty($filters['Parent']))
                    $where['Parent'] .= ' AND Parent = :Parent ';
            }
        }

        $dbCommand->where(
            implode(' AND ', $where),
            $whereVals
        );

        $result = $dbCommand->queryAll();

        return $result;
	}

    public function getAllSubCategories($filter = array())
    {
        $results = $this->getAllCategories($filter, array('Parent'));

        $subcategories = array();
        foreach ($results as $result)
        {
            $subcategories[$result['Parent']][] = $result;
        }

        return $subcategories;
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
        echo 'ssss';

		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('Parent',$this->Parent,true);
		$criteria->compare('Active',$this->Active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}