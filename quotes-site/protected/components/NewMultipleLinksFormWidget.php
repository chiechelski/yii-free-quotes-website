<?php

class NewMultipleLinksFormWidget extends CWidget
{
    public $title='New Link';
    public $visible = true; 
 
    public function init()
    {
        
    }
 
    public function run()
    {
        $model=new Link;
        
        //$this->performAjaxValidation($model); 
        $this->renderContent($model);
    }
 
    /*
    protected function performAjaxValidation($model)
    {        
        //$this->layout=false;
        if (isset($_POST['ajax']) && $_POST['ajax']==='link-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }*/
    
    protected function renderContent($model)
    {
		if (isset($_POST['Link']) && isset($_POST['submitMultipleLinks']))
		{
            $user = Yii::app()->user->getInfo();
            
            if (isset($user->Id) && !empty($user->Id))
                $_POST['Link']['User'] = $user->Id;
            
            $origUrls = preg_split('/\r\n|[\r\n]/', $_POST['Link']['OrigUrl']);
            
            Yii::app()->session['createdMultipleLinks'] = array();
            Yii::app()->session['errorMultipleLinks'] = array();
                     
            $linksCreated = 0;
            foreach ($origUrls as $origUrl)
            {
                try {
                    $model = new Link;                    
                    $model->attributes = $_POST['Link'];                    
                    $model->OrigUrl = $origUrl;
                    if ($model->save())
                    {
                        $this->setCreatedLink($model);
                        $linksCreated++;
                    }
                } 
                catch (Exception $e)
                {
                    $this->setCreatedLink($model, true);
                }
            }
                        
            if ($linksCreated > 0)
                $this->controller->redirect(array('/admin/createdlinks'));
		}

		$this->render('NewMultipleLinksForm', array(
			'model'=>$model,
		));
    }   
    
    private function setCreatedLink($model, $error = false)
    {
        if ($error)
            $index = 'errorMultipleLinks';
        else
            $index = 'createdMultipleLinks';
        
        $model = clone $model;
        
        $createdLinksSession = Yii::app()->session[$index];
                
        if (empty($createdLinksSession))
            $createdLinksSession = array($model);
        else
            $createdLinksSession[] = $model;

        Yii::app()->session[$index] = $createdLinksSession;
        
        return $error;
    }    
}