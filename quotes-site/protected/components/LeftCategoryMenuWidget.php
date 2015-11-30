<?php

class LeftCategoryMenuWidget extends CWidget
{
    public $title = 'Simple Quote Form';
    public $visible = true;
    public $selectedCategory = '';

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
        $this->render('LeftCategoryMenuWidget', array(
            'categories' => $model->getAllCategories(),
            'selectedCategory' => $this->selectedCategory,
		));
    }
}