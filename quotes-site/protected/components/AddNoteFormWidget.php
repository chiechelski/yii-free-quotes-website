<?php

class AddNoteFormWidget extends CWidget
{
    public $enquiry = null;
    public $title = 'Add notes Form';
    public $visible = true;

    public function init()
    {

    }

    public function run()
    {
        $model = new DBCustomerEnquiryNote;

        //$this->performAjaxValidation($model);
        $this->renderContent($model);
    }

    protected function renderContent($model)
    {
        if (!empty($_POST['DBCustomerEnquiryNote']))
        {
            $model->attributes = @$_POST['DBCustomerEnquiryNote'];
            $model->Enquiry = $this->enquiry->Id;
            if ($model->validate())
            {
                $model->User = Yii::app()->user->Id;
                $model->save();

                Yii::app()->user->setFlash('enquiryNoteAdded', 'Note has successfully been  added!');

                $this->controller->redirect('/admin/enquiry/view/' . $this->enquiry->Id);
            }
        }

		$this->render('AddNoteFormWidget', array(
			'model' => $model,
		));
    }
}