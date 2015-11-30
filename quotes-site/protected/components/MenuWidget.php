<?php

class MenuWidget extends CWidget
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
        $this->render('MenuWidget', array(
			'categories' => $model->getAllCategories(),
            'subCategories' => $model->getAllSubCategories(),
		));
    }
}