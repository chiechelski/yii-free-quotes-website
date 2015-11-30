<?php

class GraphWidget extends CWidget
{
    public $title = 'New Link';
    public $visible = true;

    public $type = 'suppliers';

    public function init()
    {

    }

    public function run()
    {
        $model = new User;
        $this->renderContent($model);
    }

    protected function renderContent($user)
    {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile('https://www.google.com/jsapi');

        $data = array();
        $data['cols'][] = array('id' => '', 'label' => 'Day', 'pattern' => '', 'type' => 'string');
        $data['cols'][] = array('id' => '', 'label' => 'NbrCreated', 'pattern' => '', 'type' => 'number');

        $user = new User;

        if ($this->type == 'suppliers')
            $data['rows'] = $user->getNbrSuppliers();
        else
            $data['rows'] = $user->getNbrEnquiries();

		$this->render('GraphWidget', array(
			'model' => $user,
            'graphData' => $data
		));
    }
}