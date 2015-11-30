<?php

class CategoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF
			)
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create', 'index', 'view', 'show', 'autocomplete', 'enquiry'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($category, $subcategory = '')
	{
        $model = new DBCategory;

        $categoryList = $model->getAllCategories(array('Url' => $category));
        $category = @$categoryList[0];

        if (!empty($subcategory))
        {
            $subcategoryList = $model->getAllSubCategories(array('Url' => $subcategory));
            $subcategory = @$subcategoryList[$category['Id']][0];
        }
        else
        {
            $subcategoryList = $model->getAllSubCategories(array('Parent' => $category['Id']));
            $subcategory = array();
        }

        $this->render('view',array(
			'category' => $category,
            'subCategory' => $subcategory,
            'subCategoryList' => $subcategoryList,
		));
	}

    public function actionEdit()
	{
        $model = new DBCategory;

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='dbcategory-form-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['DBCategory']))
        {
            $model->attributes=$_POST['DBCategory'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('form', array('model'=>$model));
    }
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    */

    public function actionEnquiry()
    {
        $model = new DBCategory;

        if (isset($_POST['CategoryForm']))
        {
			$model->attributes = $_POST['CategoryForm'];
			if ($model->validate())
			{

			}
            else
                $simpleForm = $_POST['CategoryForm'];
        }
        elseif (isset($_POST['SimpleQuoteForm']))
            $simpleForm = $_POST['SimpleQuoteForm'];
        else
            $simpleForm = array();

        $category = array();
        $subcategory = array();
        if (!empty($simpleForm['category']))
        {
            $categoryList = $model->getAllCategories(array('Id' => $simpleForm['category']));

            if (!empty($categoryList))
            {
                // to do
            }
            else
            {
                $subcategoryList = $model->getAllSubCategories(array('Id' => $simpleForm['category']));

                $categoryId = key($subcategoryList);

                if (!empty($categoryId))
                {
                    $categoryList = $model->getAllCategories(array('Id' => $categoryId));
                    $category = $categoryList[0];
                }

                $subcategory = @$subcategoryList[$categoryId][0];
            }
        }

        $this->render('view', array(
			'category' => $category,
            'subCategory' => $subcategory,
		));
    }

    public function actionAutoComplete($term, $type = 'all')
    {
        $term = addcslashes($term, '%_');

        $condition =  "Name LIKE :match AND Parent IS NOT NULL";

        $q = new CDbCriteria(array(
            'condition' => $condition,
            'params'    => array(':match' => "%$term%")
        ));

        $query = DBCategory::model()->findAll($q);

        $list = array();
        foreach($query as $q)
        {
            $data['value'] = $q['Name'];
            $data['label'] = $q['Name'];
            $data['id'] = $q['Id'];

            $list[] = $data;
            unset($data);
        }

        echo json_encode($list);
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('DBCategory', array(
            'criteria' => array(
                'condition' => 'Parent IS NULL',
                'order' => 'Created DESC',
            ),
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
		$this->render('index', array(
			'categories' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Link::model()->findByAttributes(array('Hash' => $id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='link-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
