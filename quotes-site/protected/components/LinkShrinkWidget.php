<?php

class LinkShrinkWidget extends CWidget
{
    public $title = 'New Link';
    public $visible = true; 
 
    public function init()
    {
        
    }
 
    public function run()
    {
        $model = new Link;
        
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
		if (isset($_POST['Link']) 
            && isset($_POST['submitLink']) && $_POST['submitLink'] == "Shrink")
		{
            $user = Yii::app()->user->getInfo();
            
            if (isset($user->Id) && !empty($user->Id))
                $_POST['Link']['User'] = $user->Id;
            
            $model->attributes = $_POST['Link'];
            $model->UrlBase = 0;

			if ($model->save())
            {
                $this->setCreatedLink($model->Hash);
				$this->controller->redirect(array('/link/' . $model->Hash));
            }
		}

		$this->render('LinkShrinkWidget', array(
			'model'=>$model,
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