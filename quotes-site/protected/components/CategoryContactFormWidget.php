<?php

class CategoryContactFormWidget extends CWidget
{
    public $title = 'Simple Quote Form';
    public $visible = true;
    public $quoteCategory = '';
    public $category = null;
    public $subCategory = null;

    public function init()
    {

    }

    public function run()
    {
        $model = new CategoryForm;

        //$this->performAjaxValidation($model);
        $this->renderContent($model);
    }

    protected function renderContent($model)
    {
		if (isset($_POST['CategoryForm']))
		{
            $model->attributes = $_POST['CategoryForm'];
            if ($model->validate())
            {
                $enquiry = new DBCustomerEnquiry;
                $enquiry->saveCustomerEnquiry($model->attributes);

                // email us
                $subject = '=?UTF-8?B?'.base64_encode('Done & Dusted - ' . $enquiry->Title).'?=';
				$headers = "From: Done Dusted Info <" . Yii::app()->params['infoEmail'] . ">\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, var_export($_POST['CategoryForm'], true), $headers);

                Yii::app()->user->setFlash('categoryQuote','Thank you for sending your enquiry. <br />We will respond to you as soon as possible.');
                Yii::app()->user->setFlash('track-conversion', 981316901);

                // new customer redirect to password set up page
                if ($enquiry->newCustomer)
                {
                    if (!empty($enquiry->_objCustomer->linkHash))
                    {
                        $this->controller->redirect(array('login/password/' . $enquiry->_objCustomer->Id . '/' . $enquiry->_objCustomer->linkHash));
                        exit();
                    }
                }

                $this->controller->redirect(array('login/'));
                exit();
            }
		}
        elseif (isset($_POST['SimpleQuoteForm']))
        {
            $model->attributes = $_POST['SimpleQuoteForm'];
        }

		$this->render('CategoryContactFormWidget', array(
			'model' => $model,
            'quoteCategory' => $this->quoteCategory,
            'category' => $this->category,
            'subCategory' => $this->subCategory
		));
    }
}