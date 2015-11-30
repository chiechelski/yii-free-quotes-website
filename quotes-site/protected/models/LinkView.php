<?php

/**
 * This is the model class for table "st4_link_view".
 *
 * The followings are the available columns in table 'st4_link_view':
 * @property string $Link
 * @property string $Ip
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property St4Link $link
 */
class LinkView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LinkView the static model class
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
		return 'st4_link_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Created', 'required'),
			array('Link, Ip', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Link, Ip, Created', 'safe', 'on'=>'search'),
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
			'link' => array(self::BELONGS_TO, 'St4Link', 'Link'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Link' => 'Link',
			'Ip' => 'Ip',
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

		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('Ip',$this->Ip,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getVisits($type = '', $params = array())
    {   
        $user = Yii::app()->user->getInfo();        
        $db = $connection=Yii::app()->db;
        
        if ($type == 'day')
        {
            $now = date("Y-m-d");
            
            $date = array($now . ' 00:00:00', $now . ' 23:59:59');
            
            $dateFormat = '%Hh';
            $groupBy = '%Y-%m-%d%H';
        }
        else
        {
            $now = date("Y-m-01");
            $after = date("Y-m-d");
            
            $date = array($now . ' 00:00:00', $after . ' 23:59:59');
            
            $dateFormat = '%d %b';
            $groupBy = '%Y-%m-%d';
        }
        
        if (isset($params['groupBy']))
        {
            if ($params['groupBy'] == 'account')
            {
                $groupBy = 'L.User';
            }
        } 
        else
        {
            $groupBy = " DATE_FORMAT(LV.Created, '" . $groupBy . "') ";
        }
        
        $sql = "
            SELECT SQL_CACHE DATE_FORMAT(LV.Created, '" . $dateFormat . "') as Day,
                COUNT(*) as NbrVisits,
                COUNT(DISTINCT L.Id, LV.Ip) as NbrUniqueVisits,
                COUNT(DISTINCT L.Id) as NbrLinks
            FROM st4_link_view LV
            INNER JOIN st4_link L ON LV.Link = L.Id
                AND L.User = " . $user->Id . "
                AND LV.Created BETWEEN '" . $date[0] . "' AND '" . $date[1] . "'
            GROUP BY " . $groupBy . ";";
        
        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryAll();
                
        if (!empty($result))        
            return $result;
        else
            array();
    }
    
    public function getCountryVisits($type = '', $params = array())
    {   
        $user = Yii::app()->user->getInfo();        
        $db = $connection=Yii::app()->db;
        
        if ($type == 'day')
        {
            $now = date("Y-m-d");
            
            $date = array($now . ' 00:00:00', $now . ' 23:59:59');
            
            $dateFormat = '%Hh';
            $groupBy = '%Y-%m-%d%H';
        }
        else
        {
            $now = date("Y-m-01");
            $after = date("Y-m-d");
            
            $date = array($now . ' 00:00:00', $after . ' 23:59:59');
            
            $dateFormat = '%d %b';
            $groupBy = '%Y-%m-%d';
        }
        
        $sql = "
            SELECT C.Code as Country,
                COUNT(*) as NbrVisits,
                COUNT(DISTINCT L.Id, LV.Ip) as NbrUniqueVisits
            FROM st4_link_view LV
            INNER JOIN st4_link L ON LV.Link = L.Id
                AND L.User = " . $user->Id . "
                AND LV.Created BETWEEN '" . $date[0] . "' AND '" . $date[1] . "'
            INNER JOIN st4_link_country C ON LV.Ip = C.Ip
            -- INNER JOIN st4_ip4_country C2 ON C2.Code = C.Code
            GROUP BY DATE_FORMAT(LV.Created, '" . $groupBy . "') ;";
                
        $dbCommand = $db->createCommand($sql);
        $result = $dbCommand->queryAll();
                
        if (!empty($result))        
            return $result;
        else
            array();
    }
}