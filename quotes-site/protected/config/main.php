<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'Free Quoting Sites',

    // preloading 'log' component
    'preload' => array('log'),

    'language' => 'en',
    'sourceLanguage'=>'en',

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.Mandrillwrap',
        'ext.YiiMailer.YiiMailer',
    ),

    'modules' => array(
        'gii' => array(
            'class'=>'system.gii.GiiModule',
            'password'=>'ponsonb1',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),

    // application components
    'components' => array(

        'clientScript' => array(
            'packages' => array(
                'jquery' => array(

                )
            ),
        ),

        'session' => array(
            'autoStart'=>true,
        ),

        'GoogleApis' => array(
            'class' => 'ext.GoogleApis.GoogleApis',

            // See http://code.google.com/p/google-api-php-client/wiki/OAuth2
            'clientId' => 'YOUR_CLIENT_ID',
            'clientSecret' => 'YOUR_CLIENT_SECRET',
            'redirectUri' => 'YOUR_REDIRECT_URI',
            // // This is the API key for 'Simple API Access'
            'developerKey' => 'YOUR_DEVELOPER_KEY',
        ),

        'request' => array(
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
        ),

        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'autoUpdateFlash' => false,
        ),

        // uncomment the following to enable URLs in path-format
        'urlManager' =>
            array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    '/category/autocomplete' => 'category/autocomplete',
                    '/category/enquiry' => 'category/enquiry',
                    '/category/<category:[\w\W]+>/<subcategory:[\w\W]*>' => 'category/view/category/<category>/subcategory/<subcategory>',
                    '/category/<category:[\w\W]+>' => 'category/view/category/<category>/subcategory/',
                    '/categories' => 'category/index',

                    'signup-completed' => 'site/signupcompleted',
                    'signup-options' => 'site/signupoptions',

                    's/<path:[\w\W]+>' => 'supplier/view/path/<path>',

                    /* Business Urls */
                    'business/new/free' => 'user/businesssignup/type/free',
                    'business/new/medium' => 'user/businesssignup/type/medium',
                    'business/new/premium' => 'user/businesssignup/type/premium',
                    'business/new' => 'user/businesssignup',
                    'login' => 'site/login',
                    'business/login' => 'site/login',
                    'login/reset' => 'site/reset',
                    'login/verify/<id:[\d]+>/<hash:[\w\W]+>' => 'site/verify/id/<id>/hash/<hash>',
                    'login/password/<id:[\d]+>/<hash:[\w\W]+>' => 'site/password/id/<id>/hash/<hash>',
                    'login/reset/<id:[\d]+>/<hash:[\w\W]+>' => 'site/resetpassword/id/<id>/hash/<hash>',

                    /* Account Urls */
                    'business/logout' => 'site/logout',
                    /*'account/business/profile' => 'business/profile',
                    'account/business/settings' => 'business/settings',
                    'account/business/directory' => 'business/directory',*/

                    /* User Urls */
                    'customer/enquiry/view/<id:[\d]+>' => 'customer/enquiryview/id/<id>',
                    'customer/enquiry/view/<id:[\d]+>/confirm/<quote:[\d]+>' => 'customer/confirmquote/enquiry/<id>/quote/<quote>',
                    'customer/quote/<id:[\d]+>/file/<file:[\d]+>' => 'customer/quotefile/quote/<id>/file/<file>',
                    'business/quote/<id:[\d]+>/file/<file:[\d]+>/del' => 'business/delquotefile/quote/<id>/file/<file>',
                    'business/customer/enquiries' => 'business/customerenquiries',
                    'business/customer/enquiry/<id:[\d]+>' => 'business/enquiryview/id/<id>',
                    'business/quote/<id:[\d]+>/enquiry/<enquiry:[\d]+>' => 'business/quote/id/<id>/enquiry/<enquiry>',

                    'customer/logout' => 'site/logout',
                    'customer/profile' => 'user/account',

                    /* Admin Urls */
                    'admin/account' => 'user/account',
                    'admin/supplier/<id:[\d]+>' => 'admin/supplier/id/<id>',
                    'admin/supplier/directory/<id:[\d]+>' => 'admin/directory/id/<id>',
                    'admin/supplier/view/<id:[\d]+>' => 'admin/supplierview/id/<id>',
                    'admin/supplier/add' => 'admin/supplier/id/0',

                    'admin/customer/<id:[\d]+>' => 'admin/customer/id/<id>',
                    'admin/customer/add' => 'admin/customer/id/0',

                    'admin/enquiry/view/<id:[\d]+>' => 'admin/enquiryview/id/<id>',
                    'admin/enquiry/view/<id:[\d]+>/confirm/<quote:[\d]+>' => 'admin/confirmquote/enquiry/<id>/quote/<quote>',
                    'admin/enquiry/<id:[\d]+>' => 'admin/enquiry/id/<id>',
                    'admin/enquiry/add' => 'admin/enquiry/id/0',

                    'admin/quote/enquiry/<enquiry:[\d]+>' => 'admin/quote/id/0/enquiry/<enquiry>',
                    'admin/quote/<id:[\d]+>/enquiry/<enquiry:[\d]+>' => 'admin/quote/id/<id>/enquiry/<enquiry>',

                    'admin/logout' => 'site/logout',

                    'contact-us' => 'site/contact',
                    'how-it-works' => 'site/page/view/howitworks',
                    'how-it-works-for-service-providers' => 'site/page/view/howitworksprovider',
                    'promote-your-services' => 'site/page/view/promote',
                    'about-us' => 'site/page/view/about',
                    'pricing' => 'site/page/view/pricing',
                    'terms-and-conditions' => 'site/page/view/terms',
                    'why-you-should-trust-us' => 'site/page/view/whyyoushouldtrustus',
                    'signup-types' => 'site/signuptypes',
                    'signup' => 'user/signup',
                    'login' => 'site/login',
                    'sitemap' => 'site/sitemap',
                    'sitemap.xml' => 'site/sitemap/type/xml',
                    'login/reset' => 'site/reset',

                    '' => 'site/index',
                ),
            ),

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=quotingsite;charset=utf8',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace, info, error, warning, vardump',
                ),
            ),
        ),
    ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'contact@contact.com',
        'infoEmail' => 'contact@contact.com',
        'pathUrl' => 'http://www.contact.com',
        'infoEmailName' => 'Quoting Site',
        'languages' => array('pt-br'=>'Portugues', 'en'=>'English', 'es'=>'Espanhol'),
	),
);