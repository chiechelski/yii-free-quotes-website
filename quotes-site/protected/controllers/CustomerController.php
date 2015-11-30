<?php

class CustomerController extends Controller
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
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('overview', 'settings', 'index', 'enquiryview',
                    'confirmquote', 'quotefile'),
				'users' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin','delete'),
				'expression' => 'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionOverview()
	{
        $user = Yii::app()->user->getInfo();

        $criteria = new CDbCriteria();
        $criteria->compare('User', $user->Id);

        $count = DBCustomerEnquiry::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $models = DBCustomerEnquiry::model()->findAll($criteria);

        $enquiriesId = array();
        foreach ($models as $model)
        {
            if (!empty($model->User))
                $enquiriesId[$model->User] = $model->User;
        }

        $customers = DBCustomerEnquiry::model()->getCustomers($enquiriesId);

		$this->render('overview', array(
			'models' => $models,
            'pages' => $pages,
            'customers' => $customers,
		));
	}

    /**
	 * Enquiry view
	 */
    public function actionEnquiryView($id)
    {
        $model = DBCustomerEnquiry::model()->findByPk($id);

        $user = Yii::app()->user->getInfo();

        if ($model->User == $user->Id)
            $this->render('enquiry_view', array('model' => $model));
        else
            throw new CHttpException(404,'The specified post cannot be found.');
    }

    /**
	 * Confirm Quote
	 */
    public function actionConfirmQuote($enquiry, $quote)
    {
        $model = DBCustomerEnquiry::model()->findByPk($enquiry);

        $user = Yii::app()->user->getInfo();

        $model->confirmQuote($quote);

        Yii::app()->user->setFlash('confirmedQuote', 'Quote has been Selected.');

        $this->redirect('/customer/enquiry/view/' . $enquiry);

        exit();
    }

    /**
	 * Quote File view
	 */
    public function actionQuoteFile($quote, $file)
    {
        if (!Yii::app()->user->isAdmin())
        {
            $quoteModel = DBBusinessQuote::model()->findByPk($quote);

            $customerId = $quoteModel->getEnquiryCustomer();

            $user = Yii::app()->user->getInfo();

            if ($customerId != $user->Id && $quoteModel->User != $user->Id)
                throw new CHttpException(404,'The specified post cannot be found.');
        }

        $model = DBBusinessQuoteFile::model()->findByPk($file);

        $filepath = Yii::app()->basePath . '/../data/files/quote/' . $quote . '/' . $file . '.txt';

        // Creating dir
        if (!file_exists($filepath))
            throw new CHttpException(404,'The specified post cannot be found.');

        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public"); // needed for i.e.
        header("Content-Type: " . $model->FileType);
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:" . $model->FileSize);
        header("Content-Disposition: attachment; filename=" . $model->FileName);
        readfile($filepath);

        die();
    }

    /**
	 * Index
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
	public function loadModel($id = 0)
	{
        if (empty($id))
        {
            $user = Yii::app()->user->getInfo();
            $id = $user->Id;
        }

		$model=User::model()->findByPk($id);
		if ($model===null)
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
