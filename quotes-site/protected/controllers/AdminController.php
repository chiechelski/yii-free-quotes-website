<?php

class AdminController extends Controller
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
				'actions' => array('index'),
				'users' => array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array(
                    'admin','delete', 'overview', 'suppliers', 'supplier', 'supplierview',
                    'customers', 'customer', 'directory', 'confirmquote',
                    'enquiries', 'enquiry', 'enquiryview', 'quote',
                    'supplierautocomplete', 'customerautocomplete',
                ),
				'expression' => 'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates link
	 */
	public function actionCreate()
	{
        $model = $this->loadModel();

		$this->render('create', array(
			'model' => $model,
		));
	}

    /**
	 * Account Overview
	 */
	public function actionOverview()
	{
        $model = $this->loadModel();

		$this->render('overview', array(
			'model' => $model,
		));
	}

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionSupplier($id, $userType = 'supplier')
	{
        if (!empty($id))
            $model = $this->loadModel($id);
        else
            $model = new User;

		$user = Yii::app()->user->getInfo();

		if (isset($_POST['User']))
		{
            if (empty($id))
                $_POST['User']['UserType'] = $userType;

            $model->attributes = $_POST['User'];

            $sendEmail = (empty($id)? true : false);
            if ($model->save(false, $sendEmail))
            {
                // Messages
                if ($userType == 'supplier')
                    $message = 'Supplier ' .  $model->CompanyName;
                else
                    $message = 'Customer ' .  $model->FirstName;

                // Saving
                if (!empty($id))
                {
                    Yii::app()->user->setFlash($userType, $message . ' settings have been saved.');
                    $this->refresh();
                }
                else
                {
                    Yii::app()->user->setFlash($userType, $message . ' has been added.');
                    $this->redirect('/admin/' . $userType . '/' . $model->Id);
                }
            }
		}

		$this->render($userType, array(
			'model' => $model,
		));
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSupplierview($id)
	{
        $modelCat = new DBCategory();
        $modelCatUser = new DBCategoryUser();

        $model = $this->loadModel($id);
		$userId = $id;

		if (isset($_POST['Categories']))
        {
            $subcategoriesId = array_map('intval', $_POST['subCategory']);

            if ($modelCatUser->linkCategoriesToUser($subcategoriesId, $userId))
            {
                Yii::app()->user->setFlash('categories', 'Your category options have been saved.');
                $this->refresh();
            }
        }

		$this->render('supplier_view', array(
			'model' => $model,
            'categories' => $modelCat->getAllCategories(),
            'subCategories' => $modelCat->getAllSubCategories(),
            'selectedSubCategories' => $modelCatUser->getUserCategories($userId),
		));
	}


    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionDirectory($id)
	{
		$model = $this->loadBusinessExtraModel($id);

        $user = $this->loadModel($id);

		if (isset($_POST['DBBusinessExtra']))
		{
            $_POST['DBBusinessExtra']['User'] = $id;

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
                    $path = Yii::app()->basePath . '/../data/logo/' . $id;

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
			'model' => $model,
            'user' => $user
		));
	}

    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadBusinessExtraModel($id = 0)
	{
		$model = DBBusinessExtra::model()->find('User = ' . $id);

		if ($model === null)
			return new DBBusinessExtra;

		return $model;
	}

    /**
	 * List suppliers
	 */
	public function actionSuppliers($userType = 'supplier')
	{
        $criteria = new CDbCriteria();
        $criteria->alias = 'u';
        $criteria->compare('u.UserType', User::$allRoles[$userType]);

        // filters
        if ($userType == 'supplier')
            $searchForm = new SuppliersSearchForm();
        else
            $searchForm = new CustomersSearchForm();

        // Set attributes
        $searchForm->setNewAttributes();
        $searchForm->applyCriteria($criteria);

        // user count
        $count = User::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $models = User::model()->findAll($criteria);

        $template = 'suppliers';
        if ($userType == 'customer')
            $template = 'customers';

        $db = Yii::app()->db;

        // getting categegories linked to suppliers
        $dbCommand = $db->createCommand()
                        ->select('c.Id, c.Name')
                        ->from('dd_category c')
                        ->join('dd_category_user cu', 'c.Id = cu.Category')
                        ->group('c.Id');

        $categories = $dbCommand->queryAll(true);

        $this->render($template, array(
            'models' => $models,
            'pages' => $pages,
            'searchform' => $searchForm,
            'subCategories' => $categories,
        ));
	}

    /**
	 * List customers
	 */
	public function actionCustomers()
	{
        $this->actionSuppliers('customer');
	}

    /**
	 * List customers
	 */
	public function actionCustomer($id)
	{
        $this->actionSupplier($id, 'customer');
	}

    /**
	 * List of enquiries
	 */
	public function actionEnquiries()
	{
        // criteria
        $criteria = new CDbCriteria();
        $criteria->alias = 'ce';
        $criteria->order = 'Created DESC';

        // filters
        $searchForm = new EnquiriesSearchForm();

        // Set attributes
        $searchForm->setNewAttributes();
        $searchForm->applyCriteria($criteria);

        // count
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

        // Enquiry user Categories
        $categories = DBCustomerEnquiryCategory::model()->getCategories($enquiriesId);

        $db = Yii::app()->db;

        // Getting categegories linked to enquiries
        $dbCommand = $db->createCommand()
                        ->select('c.Id, c.Name')
                        ->from('dd_category c')
                        ->join('dd_customer_enquiry_category ec', 'c.Id = ec.Category')
                        ->group('c.Id');

        $subCategories = $dbCommand->queryAll(true);

		$this->render('enquiries', array(
			'models' => $models,
            'pages' => $pages,
            'customers' => $customers,
            'categories' => $categories,
            'searchform' => $searchForm,
            'subCategories' => $subCategories,
		));
	}

    /**
	 * Enquiry view
	 */
    public function actionEnquiryView($id)
    {
        $model = DBCustomerEnquiry::model()->findByPk($id);

        $this->render('enquiry_view', array('model' => $model));
    }

    /**
	 * Customer Enquiry
	 */
    public function actionEnquiry($id)
    {
        $user = null;
        if (!empty($id))
        {
            $model = DBCustomerEnquiry::model()->findByPk($id);

            if (!empty($model->User))
                $user = User::model()->findByPk($model->User);
        }
        else
            $model = new DBCustomerEnquiry;

        if (isset($_POST['DBCustomerEnquiry']))
        {
            $model->attributes = $_POST['DBCustomerEnquiry'];
            if ($model->validate())
            {
                if ($model->save())
                {
                    if (!empty($id))
                    {
                        Yii::app()->user->setFlash('enquiry', 'Enquiry ' .  $model->Title . ' settings have been saved.');
                        $this->refresh();
                    }
                    else
                    {
                        Yii::app()->user->setFlash('enquiry', 'Enquiry ' .  $model->Title . ' has been added.');
                        $this->redirect('/admin/enquiry/view/' . $model->Id);
                    }
                }

                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('enquiry', array(
            'model' => $model,
            'user' => $user,
        ));
    }

    /**
	 * Creates link
	 */
	public function actionCreatedlinks()
	{
        $model = $this->loadModel();

		$this->render('createdlinks',array(
			'createdLinks' => Yii::app()->session['createdMultipleLinks'],
            'errorLinks' => Yii::app()->session['errorMultipleLinks'],
		));
	}

    /**
	 * Confirm Quote
	 */
    public function actionConfirmQuote($enquiry, $quote)
    {
        $model = DBCustomerEnquiry::model()->findByPk($enquiry);

        $user = Yii::app()->user->getInfo();

        $model->confirmQuote($quote);

        Yii::app()->user->setFlash('quote', 'Quote has been Selected.');

        $this->redirect('/admin/enquiry/view/' . $enquiry);

        exit();
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

                    $customer = User::model()->findByPk($enquiryModel->User);

                    if (!isset($user) && !empty($model->User))
                        $user = User::model()->findByPk($model->User);

                    // Sending customer email with new quote
                    if ($origAttr['Price'] != $model->Price && $model->Price > 0)
                        $customer->sendEmail('supplierQuoteForCustomer', false, array(
                            'SupplierName' => @$user->CompanyName, 'JobTitle' => $enquiryModel->Title));

                    if (!empty($id))
                    {
                        Yii::app()->user->setFlash('quote', 'Quote ' .  $model->Title . ' settings have been saved.');
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

    public function actionSupplierAutoComplete($term, $userType = 'supplier')
    {
        $term = addcslashes($term, '%_'); // escape LIKE's special characters

        if ($userType == 'supplier')
            $condition =  "CompanyName LIKE :match AND 'supplier' IN (UserType)";
        else
            $condition = "(FirstName LIKE :match || LastName LIKE :match) AND 'customer' IN (UserType)";

        $q = new CDbCriteria(array(
            'condition' => $condition,
            'params'    => array(':match' => "%$term%")
        ));

        $query = User::model()->findAll($q);

        $list = array();
        foreach($query as $q)
        {
            $data['value'] = $q['Id'];

            if ($userType == 'supplier')
                $data['label'] = $q['CompanyName'] . '(' . $q['Id'] . ')';
            else
                $data['label'] = $q['FirstName'] . ' ' . $q['LastName'] . '(' . $q['Id'] . ')';

            $list[] = $data;
            unset($data);
        }

        echo json_encode($list);
    }

    public function actionCustomerAutoComplete($term)
    {
        $this->actionSupplierAutoComplete($term, 'customer');
    }

    /**
	 * Creates link
	 */
	public function actionLinks()
	{
        $user = Yii::app()->user->getInfo();

        $dataProvider = new CActiveDataProvider('Link', array(
            'criteria' => array(
                'condition' => 'User = ' . $user->Id,
                'order' => 'Created DESC',
            ),
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
		$this->render('links',array(
			'dataProvider'=>$dataProvider,
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
			if($model->save(false, false))
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('update',array(
			'model'=>$model,
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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

		$model = User::model()->findByPk($id);
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
