<div id="language-select">
<?php 
    if (sizeof($languages) < 4) 
    {
        // Render options as links
        $lastElement = end($languages);
        
        foreach ($languages as $key => $lang) 
        {
            echo "<img class='flags' src=\"" . Yii::app()->request->baseUrl . "/images/flag_" . $key . ".png\" />";
            echo "<div class='link'>";
            if ($key != $currentLang) 
            {
                echo CHtml::link(
                     $lang, 
                     $this->getOwner()->createMultilanguageReturnUrl($key));
            } 
            else 
                echo '<b>' . $lang . '</b>';
            echo "</div>";
        }
    }
    else 
    {
        // Render options as dropDownList
        echo CHtml::form();
        foreach ($languages as $key=>$lang) 
        {
            echo CHtml::hiddenField(
                $key, 
                $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        echo CHtml::dropDownList('language', $currentLang, $languages,
            array(
                'submit'=>'',
            )
        ); 
        echo CHtml::endForm();
    }
?>
</div>