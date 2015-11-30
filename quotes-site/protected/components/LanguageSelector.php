<?php

class LanguageSelector extends CWidget
{
    public function init()
    {
        
    }
    
    public function run()
    {        
        $currentLang = Yii::app()->language;
        $languages = Yii::app()->params->languages;
        $this->render('LanguageSelector', array('currentLang' => $currentLang, 'languages'=>$languages));
    }
}