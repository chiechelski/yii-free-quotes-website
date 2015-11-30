<?php
/* @var $this LeftMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<?php
    $requestUrl = Yii::app()->request->url;
    $this->widget('zii.widgets.CMenu', array(
        'items'=>array(
            array('label' => yii::t('menu', 'Overview'), 'url' => array('/admin/overview'),
                'active' => (($requestUrl == '/admin/overview')? true: false)),
            array('label' => yii::t('menu', 'Suppliers'), 'url' => array('/admin/suppliers'),
                'active' => ((strpos($requestUrl, '/admin/supplier') !== false)? true: false)),
            array('label' => yii::t('menu', 'Customers'), 'url' => array('/admin/customers'),
                'active' => ((strpos($requestUrl, '/admin/customers') !== false)? true: false)),
            array('label' => yii::t('menu', 'Enquiries'), 'url' => array('/admin/enquiries'),
                'active' => (($requestUrl == '/admin/enquiries')? true: false)),
            array('label' => yii::t('menu', 'My Account'), 'url' => array('/admin/account'),
                'active' => (($requestUrl == '/admin/account')? true: false)),
        ),
        'htmlOptions' => array('class' => 'nav nav-tabs account-nav-tabs'),
    ));
?>
