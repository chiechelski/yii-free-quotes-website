<?php
/* @var $this LeftMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<?php
    $requestUrl = Yii::app()->request->url;
    $this->widget('zii.widgets.CMenu', array(
        'items'=>array(
            array('label' => yii::t('menu', 'About us'), 'url' => array('site/page/view/about'),
                'active' => (($requestUrl == '/about-us')? true: false)),
            array('label' => yii::t('menu', 'How it works'), 'url' => array('site/page/view/howitworks'),
                'active' => (($requestUrl == '/how-it-works')? true: false)),
            /*array('label' => yii::t('menu', 'Promote your services'), 'url' => array('site/page/view/promote'),
                'active' => (($requestUrl == '/promote-your-services')? true: false)),*/
            array('label' => yii::t('menu', 'How It Works for service providers'), 'url' => array('/how-it-works-for-service-providers'),
                'active' => (($requestUrl == '/how-it-works-for-service-providers')? true: false)),
            array('label' => yii::t('menu', 'Terms and conditions'), 'url' => array('site/page/view/terms'),
                'active' => (($requestUrl == '/terms-and-conditions')? true: false)),
            array('label' => yii::t('menu', 'Contact Us'), 'url' => array('site/contact'),
                'active' => (($requestUrl == '/contact-us')? true: false)),
        ),
        'htmlOptions' => array('class' => 'list-unstyled menu-left hidden-xs'),
    ));
?>