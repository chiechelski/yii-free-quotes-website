<?php

class AccountStats extends CWidget
{
    public $title = 'New Link';
    public $visible = true; 
 
    public function init()
    {
        
    }
 
    public function run()
    {
        $model = new Link;        
        $this->renderContent($model);
    }
     
    protected function renderContent($model)
    {
        $param = array('groupBy' => 'account');
        
        $linkViews = new LinkView;
        $data = $linkViews->getVisits('month', $param);
        
		$this->render('AccountStats', array(
            'linksStats' => @$data[0]
		));
    }
}