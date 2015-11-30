<?php

/**
 * This is the model class for table "st4_link".
 *
 * The followings are the available columns in table 'st4_link':
 * @property string $Hash
 * @property string $OrigUrl
 * @property integer $UrlBase
 * @property string $User
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property St4User $user
 */
class Link extends CActiveRecord
{

    static $baseURLs = array(0 => 'http://st4.me/', 1 => 'http://sharethis4.me/');

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Link the static model class
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
		return 'st4_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OrigUrl', 'required', 'message'=>'URL cannot be blank'),
			array('UrlBase', 'numerical', 'integerOnly'=>true),
			array('Hash', 'length', 'max'=>128),
            array('OrigUrl', 'CUrlValidator', 'message'=>'Invalid URL'),
			array('OrigUrl', 'length', 'max'=>1000),
			array('User', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Hash, OrigUrl, UrlBase, User, Created', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'St4User', 'User'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Hash' => 'Hash',
			'OrigUrl' => 'Orig Url',
			'UrlBase' => 'Url Base',
			'User' => 'User',
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

		$criteria->compare('Hash',$this->Hash,true);
		$criteria->compare('OrigUrl',$this->OrigUrl,true);
		$criteria->compare('UrlBase',$this->UrlBase);
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
	 * Overriding save method
	 */
    public function save()
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('GMT'));
        $this->Created = $date->format('Y-m-d H:i:s');

        if (!empty($this->OrigUrl))
        {
            if (strpos($this->OrigUrl, 'https//') === false)
                $this->OrigUrl = 'http://' . str_replace('http://', '', $this->OrigUrl);
            else
                $this->OrigUrl = 'https://' . str_replace('https://', '', $this->OrigUrl);
        }

        // checking if hash exists
        if (!empty($this->OrigUrl))
            $this->Hash = $this->getNextHash();

        return parent::save();
    }

    /**
	 * Create Url
	 */
    public function createNewUrl()
    {
        $newUrl = Link::$baseURLs[$this->UrlBase] . $this->Hash;
        return $newUrl;
    }

    /**
	 * Save Link View
	 */
    public function saveLinkView()
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        $db = $connection=Yii::app()->db;

        $query =  "INSERT INTO st4_link_view (Link, Ip) VALUES (" . $this->Id . ", " . ip2long($ip) . ") ";
        $db->createCommand($query)->execute();

        return true;
    }

    /**
	 * Testing if hash exist, if not suggest alternative
	 */
    public function getNextHash()
    {
        $db = $connection=Yii::app()->db;
        $hash = $this->Hash;

        if (!empty($hash))
        {
            $sql = "SELECT Hash FROM st4_link WHERE Hash = '" . $hash . "' LIMIT 1";
            $dbCommand = $db->createCommand($sql);
            $result = $dbCommand->queryAll();

            // Doesnt exist can create
            if (empty($result))
            {
                // SAVE
                return $hash;
            }
        }

        $transaction = $db->beginTransaction();

        try {
            // Get your data
            $query =  "UPDATE st4_link_current_number SET Number = Number + 1;";
            $db->createCommand($query)->execute();

            // Make the insert
            $sql = "SELECT Number FROM st4_link_current_number LIMIT 1";
            $dbCommand = $db->createCommand($sql);
            $result = $dbCommand->queryRow();

            $numberId = $result['Number'];

            $hash = $this->toBase($numberId);
            $this->Hash = $hash;

            // Commit
            $transaction->commit();

        }
        catch (Exception $e)
        {
            $transaction->rollback();
        }

        return $this->getNextHash();
    }


    static function transformUrl($url)
    {
        return self::$baseURLs[0] . 'url/?l=' . urlencode(str_replace('http://', '',$url));
    }

    /**
	 * To Base 64 string
	 */
    function toBase($num, $b=62)
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = $num  % $b ;
        $res = $base[$r];
        $q = floor($num/$b);
        while ($q)
        {
            $r = $q % $b;
            $q =floor($q/$b);
            $res = $base[$r].$res;
        }
        return $res;
    }

    /**
	 * To integer Url
	 */
    function to10( $num, $b=62)
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $limit = strlen($num);
        $res = strpos($base,$num[0]);
        for($i=1;$i<$limit;$i++) {
            $res = $b * $res + strpos($base,$num[$i]);
        }
        return $res;
    }


}