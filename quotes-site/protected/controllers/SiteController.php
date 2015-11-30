<?php

class SiteController extends Controller
{
    public $embedContent = false;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->embedContent = true;

        $model = new DBCategory();
		$this->render('index', array(
			'categories' => $model->getAllCategories(),
            'subCategories' => $model->getAllSubCategories(),
		));
	}

    /**
	 * This is the site signup process completed
	 */
	public function actionSignupCompleted()
	{
        $signupUser = Yii::app()->session['SignupUser'];

		$this->render('signup_completed', array(
			'signupUser' => $signupUser,
		));
	}

    /**
	 * This is the action for the sitemap
	 */
	public function actionSitemap($type = 'page')
	{
        $db = Yii::app()->db;

        // Getting categegories linked to enquiries
        $dbCommand = $db->createCommand()
                        ->select('u.Id, u.CompanyName, be.Path')
                        ->from('dd_user u')
                        ->join('dd_business_extra be',
                            "be.User = u.Id
                                AND ShowOnDirectory = 'Yes'
                                AND Active = 'Yes'
                                AND UserType = 'supplier'")
                        ->group('u.Id');

        $companies = $dbCommand->queryAll(true);

        if ($type == 'xml')
        {
            header("Content-type: text/xml");

            echo $this->renderPartial('sitemapxml', array('companies' => $companies), true);
            exit();
        }

        $this->render('sitemap', array('model' => @$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
        $this->render('error', array('model' => @$model));
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if (isset($_POST['ContactForm']))
		{
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate())
			{
				$name= '=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject= '=?UTF-8?B?'.base64_encode('Done & Dusted - Contact - ' . $model->subject).'?=';
				$headers = "From: Done Dusted Info <" . Yii::app()->params['infoEmail'] . ">\r\n" .
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, var_export($_POST['ContactForm'], true)  , $headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

    /**
	 * Displays login options
	 */
    public function actionSignupOptions()
	{
        $model = new LoginForm;

		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status' => 'failure',
                'title' => yii::t('signup', 'Sign up'),
                'div' => $this->renderPartial('signup_options', array('model' => $model), true)));
            exit;
        }
        else
            $this->render('signup_options', array('model' => $model));
	}

    /**
	 * Displays login options
	 */
    public function actionSignupTypes()
	{
        $model = new LoginForm;

		$this->render('signup_types', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
            {
                $user = User::prepareUserForAuthorisation(null, $model->username);
                if ($user->UserType == 'supplier')
                    $this->redirect(array('/business/profile'));
                elseif ($user->UserType == 'customer')
                    $this->redirect(array('/customer/overview'));
                else
                    $this->redirect(array('admin/overview'));
            }
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

    /**
	 * MEthod to verify user email
	 */
	public function actionVerify($id, $hash)
	{
        $model = new LoginForm;
        $userModel = User::model()->findByAttributes(array('Id' => @$id));

        $flag = false;

        if (!empty($userModel))
        {
            $hash = (substr(base64_decode(substr($hash, 3)), 0, -3) - $userModel->validationHash);
            if ($id == $hash)
            {
                Yii::app()->user->setFlash('verify-success','Thanks, you email address has been successfully verified. Please use the form below to login to your account.');

                $userModel->Validated = 1;

                $userModel->update();

                $flag = true;
            }
        }

        if (!$flag)
        {
            Yii::app()->user->setFlash('verify-failed','Sorry, but this link has expired. Please click on the Forgot your password link below to reset your password.');
        }

        $this->redirect(array('login/'));

        exit();
    }

    /**
	 * Displays the reset password page
	 */
	public function actionResetPassword($id, $hash, $type = 'reset')
	{
        $model = new UserPasswordResetForm;

        $userModel = User::model()->findByAttributes(array('Id' => @$id));
        $userHashModel = DBUserPasswordReset::model()->findByAttributes(array('User' => @$id, 'Hash' => $hash));

        // expired link
        if (empty($userHashModel) || empty($userModel)
            || $userHashModel->ExpireDate <= date('Y-m-d H:i:s'))
        {
            Yii::app()->user->setFlash('expired-reset','Sorry, but this link has expired. Please use the form below to reset your password.');

            $this->redirect(array('login/reset'));

            return true;
        }

        $model->Email = $userModel->Email;

        // collect user input data
		if (isset($_POST['UserPasswordResetForm']))
		{
			$model->attributes = $_POST['UserPasswordResetForm'];

            if ($model->validate())
            {
                $userModel->Validated = 1;
                $userModel->setPassword($model->Password);

                if ($userModel->update())
                {
                    $userHashModel->ExpireDate = date('Y-m-d H:i:s');
                    $userHashModel->update();

                    Yii::app()->user->setFlash('password-reset', 'Your password has been succesfully changed. Please login now using the form below.');

                    $this->redirect(array('login'));

                    return true;
                }
            }
        }

        $this->render('reset_password', array('model' => $model, 'type' => $type));
    }

    /**
	 * Displays the set password page
	 */
	public function actionPassword($id, $hash)
	{
        $this->actionResetPassword($id, $hash, 'password');
    }

    /**
	 * Displays the reset password page
	 */
	public function actionReset()
	{
		$model = new ForgotPasswordForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['ForgotPasswordForm']))
		{
			$model->attributes = $_POST['ForgotPasswordForm'];

			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->reset())
            {
                Yii::app()->user->setFlash('reset', 'We\'ve sent you an email containing a link to reset your password. Please check your email and follow the guidelines contained within.');

                $this->refresh();
            }
		}
		// display the login form
		$this->render('reset', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}