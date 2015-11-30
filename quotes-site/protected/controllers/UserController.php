<?php

class UserController extends Controller
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'signup', 'businesssignup', 'termsandconditions'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'update', 'account'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if ($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    public function actionTermsandconditions($type = null)
    {
        echo $this->renderPartial('terms-popup', array('type' => $type), true);
        exit;
    }

    /**
	 * Creates a new business user acocunt.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    public function actionBusinessSignup($type = null)
    {
        $model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['User']))
		{
            $model->attributes = $_POST['User'];

            $model->InitialPassword = $_POST['User']['Password'];

            if ($model->validate())
            {
                if ($model->save())
                {
                    $userModel = $model;

                    Yii::app()->session['SignupUser'] = $model;

                    $model = new LoginForm;

                    $model->attributes = $model;

                    Yii::app()->user->setFlash('signup', 'Thank you for signing up. <br />Please login to update your company details using the form below.');

                    try
                    {
                        /* Company Registered Email */
                        $subject = '=?UTF-8?B?'.base64_encode('Done & Dusted - New Company has subscribed ' . $_POST['User']['Email']).'?=';
                        $headers = "From: DoneAndDusted <info@donedusted.co.nz>\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-type: text/plain; charset=UTF-8";

                        if (isset($_POST['User']['Password']))
                            unset($_POST['User']['Password']);
                        if (isset($_POST['User']['Password2']))
                            unset($_POST['User']['Password2']);

                        mail(Yii::app()->params['adminEmail'], $subject, var_export($_POST['User'], true), $headers);
                    }
                    catch(Exception $exp)
                    {
                        // nothing
                    }

                    // validate user input and redirect to the previous page if valid
                    if ($model->login())
                        $this->redirect(array('/business/profile'));
                    else
                        $this->redirect(array('/login'));

                    exit();
                }
            }
		} else {
            //echo '<pre>'; print_r($model->UserType); echo '</pre>';
        }

		$this->render('signup_business', array(
			'model' => $model,
            'type' => $type,
		));
    }

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSignup()
	{
		$model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
            $model->InitialPassword = $_POST['User']['Password'];

            if ($model->validate())
            {
                if ($model->save())
                {
                    $model = new LoginForm;

                    $model->attributes = $model;

                    Yii::app()->user->setFlash('signup', 'Thank you for signing up. <br />Please login to update your profile details using the form below.');

                    try
                    {
                        /* Company Registered Email */
                        $subject = '=?UTF-8?B?'.base64_encode('Done & Dusted - New User has registered ' . $_POST['User']['Email']).'?=';
                        $headers = "From: DoneAndDusted <info@donedusted.co.nz>\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-type: text/plain; charset=UTF-8";

                        if (isset($_POST['User']['Password']))
                            unset($_POST['User']['Password']);
                        if (isset($_POST['User']['Password2']))
                            unset($_POST['User']['Password2']);

                        mail(Yii::app()->params['adminEmail'], $subject, var_export($_POST['User'], true), $headers);
                    }
                    catch(Exception $exp)
                    {
                        // nothing
                    }

                    $model = new LoginForm;
                    if ($model->login())
                    {
                        $this->redirect(array('/customer/profile'));
                    }
                    else
                        $this->redirect(array('/login'));

                    exit();
                }
            }
            else
            {
                $model->Password = @$_POST['User']['Password'];
                $model->Password2 = @$_POST['User']['Password2'];
            }
		} else {
            //echo '<pre>'; print_r($model->UserType); echo '</pre>';
        }

        //echo '--------->';
        //exit();

		$this->render('signup', array(
			'model' => $model,
		));
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAccount()
	{
		$model = $this->loadModel();

		if (isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];

			$model->attributes=$_POST['User'];
			if ($model->save(false, false))
            {
                Yii::app()->user->setFlash('settings', 'Your settings have been saved.');
				$this->refresh();
            }
		}

		$this->render('update',array(
			'model' => $model
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('update',array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
    /*
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id = 0)
	{
        if (empty($id))
        {
            $user = Yii::app()->user->getInfo();
            $id = $user->Id;
        }

		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
