<?php
/* @var $this BusinessMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<?php
    $user = Yii::app()->user->getInfo();

    $requestUrl = Yii::app()->request->url;

    $links = array();
    if ($user->UserType == 'customer')
    {
        $links =
            array_merge($links,array(
                    array('label' => yii::t('menu', 'Overview'), 'url' => array('/customer/overview'),
                        'active' => (($requestUrl == '/customer/overview')? true: false)),
                    'setting' => array('label' => yii::t('menu', 'My Account'), 'url' => array('/customer/profile'),
                        'active' => (($requestUrl == '/customer/profile')? true: false)),
                )
            );
    }

    if ($user->UserType == 'supplier')
    {
        $links =
            array_merge($links,array(
                    array('label' => yii::t('menu', 'Business Details'), 'url' => array('/business/profile'),
                        'active' => (($requestUrl == '/business/profile')? true: false)),
                    'enquiry' => array('label' => yii::t('menu', 'Customer Enquiries'), 'url' => array('/business/customer/enquiries'),
                        'active' => (($requestUrl == '/business/customer/enquiries')? true: false)),
                    array('label' => yii::t('menu', 'Directory Details'), 'url' => array('/business/directory'),
                        'active' => (($requestUrl == '/business/directory')? true: false)),
                    'setting' => array('label' => yii::t('menu', 'Account Settings'), 'url' => array('/business/settings'),
                        'active' => (($requestUrl == '/business/settings')? true: false)),

                )
            );
    }

    $this->widget('zii.widgets.CMenu', array(
        'items'=> $links,
        'htmlOptions' => array('class' => 'nav nav-tabs account-nav-tabs'),
    ));

?>
