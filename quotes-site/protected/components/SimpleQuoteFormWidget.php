<?php

class SimpleQuoteFormWidget extends CWidget
{
    public $title = 'Simple Quote Form';
    public $visible = true;

    public function init()
    {

    }

    public function run()
    {
        $model = new SimpleQuoteForm;

        //$this->performAjaxValidation($model);
        $this->renderContent($model);
    }

    protected function renderContent($model)
    {
		$this->render('SimpleQuoteFormWidget', array(
			'model' => $model,
		));
    }

    private function setCreatedLink($hash)
    {
        $createdLinksSession = Yii::app()->session['createdLinks'];

        if (empty($createdLinksSession))
            $createdLinksSession = array($hash);
        else
            $createdLinksSession[] = $hash;

        Yii::app()->session['createdLinks'] = $createdLinksSession;
    }
}