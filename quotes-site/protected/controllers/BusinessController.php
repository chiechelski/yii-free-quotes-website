<?php

class BusinessController extends Controller
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
				'actions'=>array('packagetypes'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('directory', 'profile', 'settings', 'index', 'quote',
                                   'delquotefile', 'customerenquiries', 'enquiryview'),
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

    public function actionPackageTypes()
	{
        echo $this->renderPartial('package_types');
        exit();
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionProfile()
	{
        $modelCat = new DBCategory();
        $modelCatUser = new DBCategoryUser();

		$model = $this->loadModel();

		$userId = Yii::app()->user->getInfo()->Id;

		if (isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if ($model->save())
            {
                Yii::app()->user->setFlash('profile', 'Your business details have been saved.');
				$this->refresh();
            }
		}
        else if (isset($_POST['Categories']))
        {
            $subcategoriesId = array_map('intval', $_POST['subCategory']);

            if ($modelCatUser->linkCategoriesToUser($subcategoriesId, $userId))
            {
                Yii::app()->user->setFlash('categories', 'Your category options have been saved.');
                $this->refresh();
            }
        }

		$this->render('profile', array(
			'model' => $model,
            'categories' => $modelCat->getAllCategories(),
            'subCategories' => $modelCat->getAllSubCategories(),
            'selectedSubCategories' => $modelCatUser->getUserCategories($userId),
		));
	}

    /**
	 * Remove Quote File view
	 */
    public function actionDelQuoteFile($quote, $file)
    {
        if (!Yii::app()->user->isAdmin())
        {
            $quoteModel = DBBusinessQuote::model()->findByPk($quote);

            $user = Yii::app()->user->getInfo();

            if ($quoteModel->User != $user->Id)
                throw new CHttpException(404,'The specified post cannot be found.');
        }

        $quote = DBBusinessQuote::model()->findByPk($quote);

        $model = DBBusinessQuoteFile::model()->findByPk($file);

        $model->delete();

        if (!empty($quoteModel))
            $this->redirect('/business/quote/' . $quote->Id . '/enquiry/' . $quote->Enquiry);
        else
            $this->redirect('/admin/quote/' . $quote->Id . '/enquiry/' . $quote->Enquiry);

    }

    public function actionCustomerEnquiries()
    {
        $user = Yii::app()->user->getInfo();

        $criteria = new CDbCriteria();
        $criteria->alias = 'e';
        $criteria->join='INNER JOIN dd_business_quote q
            ON q.Enquiry = e.Id AND q.User = ' . $user->Id;
        // $criteria->condition='Client.businessId='. Yii::app()->userInfo->business;
        $criteria->order = 'Created DESC';
        //$criteria->compare('UserType', User::$allRoles['supplier']);

        $count = DBCustomerEnquiry::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $models = DBCustomerEnquiry::model()->findAll($criteria);

        $enquiriesId = array();
        $userEnquiriesId = array();
        foreach ($models as $model)
        {
            $enquiriesId[$model->Id] = $model->Id;
            if (!empty($model->User))
                $userEnquiriesId[$model->User] = $model->User;
        }

        $customers = DBCustomerEnquiry::model()->getCustomers($userEnquiriesId);

        $categories = DBCustomerEnquiryCategory::model()->getCategories($enquiriesId);

		$this->render('enquiries', array(
			'models' => $models,
            'pages' => $pages,
            'customers' => $customers,
            'categories' => $categories,
		));
    }

    /**
	 * Enquiry view
	 */
    public function actionEnquiryView($id)
    {
        $user = Yii::app()->user->getInfo();

        $criteria = new CDbCriteria();
        $criteria->alias = 'e';
        $criteria->join = 'INNER JOIN dd_business_quote q
            ON q.Enquiry = e.Id AND q.User = ' . $user->Id . '
                AND e.Id = ' . (int) $id;

        $models = DBCustomerEnquiry::model()->findAll($criteria);

        $model = @$models[0];

        if (!empty($model))
            $this->render('enquiry_view', array('model' => $model));
        else
            throw new CHttpException(404,'The specified post cannot be found.');
    }

    /**
	 * Business Quote
	 */
    public function actionQuote($id, $enquiry)
    {
        $enquiryModel = DBCustomerEnquiry::model()->findByPk($enquiry);

        $user = null;
        if (!empty($id))
        {
            $model = DBBusinessQuote::model()->findByPk($id);
            $user = User::model()->findByPk($model->User);

            $userInfo = Yii::app()->user->getInfo();

            if ($userInfo->Id != $user->Id)
                throw new CHttpException(404,'The specified post cannot be found.');
        }
        else
            $model = new DBBusinessQuote;

        if (isset($_POST['DBBusinessQuote']))
        {
            $origAttr = $model->attributes;

            $model->attributes = $_POST['DBBusinessQuote'];
            if ($model->validate())
            {
                $model->Enquiry = $enquiry;

                if ($model->save())
                {
                    // uploading images
                    $uploadedFile = CUploadedFile::getInstance($model, 'File');

                    if (!empty($uploadedFile))
                    {
                        $quoteFile = new DBBusinessQuoteFile;
                        $quoteFile->FileName = $uploadedFile->name;
                        $quoteFile->FileType = $uploadedFile->type;
                        $quoteFile->FileSize = $uploadedFile->size;
                        $quoteFile->Quote  = $id;

                        if ($quoteFile->save())
                        {
                            $path = Yii::app()->basePath . '/../data/files/quote/' . $id;

                            // Creating dir
                            if (!file_exists($path))
                                mkdir($path, 0777);

                            $uploadedFile->saveAs($path . '/' . $quoteFile->Id . '.txt');
                        }
                    }

                    if (!empty($id))
                    {
                        Yii::app()->user->setFlash('quote', 'Quote ' .  $model->Title . ' settings have been saved.');

                        $customer = User::model()->findByPk($enquiryModel->User);

                        // Sending customer email with new quote
                        if ($origAttr['Price'] != $model->Price && $model->Price > 0)
                            $customer->sendEmail('supplierQuoteForCustomer', false, array(
                                'SupplierName' => $user->CompanyName, 'JobTitle' => $enquiryModel->Title));

                        $this->refresh();
                    }
                    else
                    {
                        $model->Enquiry = $enquiry;
                        Yii::app()->user->setFlash('quote', 'Quote ' .  $model->Title . ' has been added.');
                        $this->redirect('/admin/enquiry/view/' . $enquiry);
                    }
                }

                // form inputs are valid, do something here
                return;
            }
        }

        $this->render('quote', array(
            'model' => $model,
            'enquiry' => $enquiryModel,
            'user' => $user,
        ));
    }

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionDirectory()
	{
		$model = $this->loadBusinessExtraModel();

		$user = Yii::app()->user->getInfo();

		if (isset($_POST['DBBusinessExtra']))
		{
            $_POST['DBBusinessExtra']['User'] = $user->Id;

            $oldLogo = $model->Logo;
            $model->attributes = $_POST['DBBusinessExtra'];

            $uploadedFile = CUploadedFile::getInstance($model, 'Logo');

            if (!empty($uploadedFile))
                $model->Logo = $uploadedFile;
            else
                $model->Logo = $oldLogo;

			if ($model->save())
            {
                if (!empty($uploadedFile))
                {
                    $path = Yii::app()->basePath . '/../data/logo/' . $user->Id;

                    // Creating dir
                    if (!file_exists($path))
                        mkdir($path, 0777);

                    // Creating file
                    if (file_exists($path . '/' . $uploadedFile))
                        rename ($path . '/' . $uploadedFile, $path . '/' . $uploadedFile . '.old' . uniqid());

                    $uploadedFile->saveAs($path . '/' . $uploadedFile);
                }

                Yii::app()->user->setFlash('directory', 'Your details have been saved.');
				$this->refresh();
            }
		}

		$this->render('directory', array(
			'model' => $model
		));
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSettings()
	{
		$model = $this->loadModel();

		$user = Yii::app()->user->getInfo();

		if (isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if ($model->save())
            {
                Yii::app()->user->setFlash('settings', 'Your settings have been saved.');
				$this->refresh();
            }
		}

		$this->render('settings', array(
			'model' => $model
		));
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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadBusinessExtraModel($id = 0)
	{
        if (empty($id))
        {
            $user = Yii::app()->user->getInfo();
            $id = $user->Id;
        }

		$model = DBBusinessExtra::model()->find('User = ' . $id);

		if ($model === null)
			return new DBBusinessExtra;

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
