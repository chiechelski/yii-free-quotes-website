<?php

class BusinessMenuWidget extends CWidget
{
    public $title = 'Simple Quote Form';
    public $visible = true;

    public function init()
    {

    }

    public function run()
    {
        $this->renderContent();
    }

    protected function renderContent()
    {
		$model = new DBCategory();
        $this->render('BusinessMenuWidget', array(

		));
    }
}