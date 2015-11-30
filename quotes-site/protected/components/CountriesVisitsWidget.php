<?php

class CountriesVisitsWidget extends CWidget
{
    public $title = 'New Link';
    public $visible = true; 
 
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
                
        $linkViews = new LinkView;
        $data['rows'] = $linkViews->getCountryVisits();
                     
		$this->render('CountriesVisitsWidget', array(
			'model' => $user,
            'graphData' => $data
		));
    }
}