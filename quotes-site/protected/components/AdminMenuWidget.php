<?php

class AdminMenuWidget extends CWidget
{
    public $title = 'Admin Menu Widget';
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
        $this->render('AdminMenuWidget', array(

		));
    }
}