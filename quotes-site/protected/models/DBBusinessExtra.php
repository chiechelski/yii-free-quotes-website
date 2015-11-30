<?php

/**
 * This is the model class for table "dd_business_extra".
 *
 * The followings are the available columns in table 'dd_business_extra':
 * @property string $Id
 * @property string $User
 * @property string $Title
 * @property string $Description
 * @property string $Logo
 * @property string $Url
 * @property string $Path
 *
 * The followings are the available model relations:
 * @property DdUser $user
 */
class DBBusinessExtra extends CActiveRecord
{
    public $UserModel = null;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBBusinessExtra the static model class
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
		return 'dd_business_extra';
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
			array('Title, Logo, Url, Path', 'length', 'max'=>255),
			array('Description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, User, Title, Description, Logo, Url', 'safe', 'on'=>'search'),
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
			'Title' => 'Title',
			'Description' => 'About Your Company',
			'Logo' => 'Logo',
			'Url' => 'Website Url',
            'Path' => 'Directory Path',
		);
	}

    public function loadUserModel()
    {
        if (!empty($this->User))
            $this->UserModel = User::model()->findByAttributes(array('Id' => $this->User));
    }

    /*
    public function getCompanyExtra($path = '')
    {
        $db = $connection=Yii::app()->db;

        $sql = "
            SELECT BE.*
            FROM dd_user U
            INNER JOIN dd_business_extra BE
                ON BE.User = U.Id
                    AND BE.Path LIKE ('%" . $path . "%')
            LIMIT 1;";

        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryAll();

        if (!empty($result[0]))
            return $result[0];
        else
            array();
    }
    */

    public function save()
    {
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
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Logo',$this->Logo,true);
		$criteria->compare('Url',$this->Url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}