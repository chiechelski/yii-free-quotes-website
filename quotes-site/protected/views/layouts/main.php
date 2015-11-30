<?php /* @var $this Controller */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <meta name="description" content="Hire a quality local business in New Zealand">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="google-site-verification" content="B82bv2_OGHPMBHpCs_V8FOzhFgEEdRH6jtTxL-SEAjQ" />

    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>

    <link href="//fonts.googleapis.com/css?family=Ubuntu:300italic,300,400italic,400,500italic,500,700italic,700" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Lora:400italic,400,700italic,700" rel="stylesheet" type="text/css">

	<!-- blueprint CSS framework -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css?v=1" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?> </title>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-43477209-1']);
        _gaq.push(['_trackPageview']);
        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script type="text/javascript">
        function openMenu()
        {
            if ($('#header .signup').css('display') == 'block')
            {
                $('#header .signup').slideUp();
            }
            else
            {
                $('#header .signup').css('display', 'none');
                $('#header .signup').css('clear', 'both');
                $('#header .signup').removeClass('hidden-xs');
                $('#header .signup').slideDown();
            }

            // hide and show menu
            if ($('.menu-left').length > 0)
            {
                $menu = $('.menu-left');
                if ($menu.css('display') == 'block')
                {
                    $menu.slideUp();
                }
                else
                {
                    $menu.css('display', 'none');
                    $menu.css('clear', 'both');
                    $menu.removeClass('hidden-xs');
                    $menu.slideDown();
                }
            }
            //alert('open menu');
        }
    </script>

</head>

<body class="page-<?=$this->getUniqueId()?> page-content-<?= (empty($this->embedContent)?'e':'ne') ?>">

<?php
    $user = Yii::app()->user->getInfo();

    $isBusinessView = (in_array($this->getUniqueId(), array('business', 'admin', 'user', 'customer')) ? true : false);

    // Exceptions
    if (($this->getUniqueId() == 'user' && Yii::app()->controller->action->id == 'businesssignup')
        || ($this->getUniqueId() == 'user' && Yii::app()->controller->action->id == 'signup'))
        $isBusinessView = false;

    /*
     * to be removed it later
     *
    $email = new Mandrillwrap();
    $email->init();
    $email->html = htmlentities("Your email body");
    $email->subject = "Subject";
    $email->fromName = "Done Dusted";
    $email->fromEmail = "info@donedusted.com";
    $email->toName = "gustavo";
    $email->toEmail = "gustavo@donedusted.co.nz";
    $email->sendEmail();
    */

    if (!empty($user))
        $accountType = $user->getAccountType();
?>

<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-8 logo">
                <a href="/">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.v3.png" id="logoBanner" />
                </a>
            </div>
            <div class="col-xs-4 visible-xs menu-phone-icon">
                <a href="#" class="btn btn-default" onclick="javascript: openMenu(); return false;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/menu.png" />
                </a>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12 signup hidden-xs">
                <?php if (Yii::app()->user->isGuest): ?>
                    <ul class="list-unstyled">
                        <li class="row-1">
                            <?php if (Yii::app()->user->isGuest) : ?>
                                <ul class="top-links list-unstyled list-inline" id="yw0">
                                    <li class="green">
                                        <a href="/how-it-works">How It Works</a>
                                    </li>
                                    <li>
                                        <a href="/login" class="btn btn-default">Login</a>
                                    </li>
                                    <li>
                                        <a href="/signup" class="btn btn-default btn-warning">Sign Up</a>
                                    </li>
                                </ul>
                            <? endif; ?>
                        </li>
                        <li class="row-2">
                            <a href="/business/new" class="orange btn"> Promote your services for free! </a>
                        </li>
                        <li class="visible-xs">
                            <a href="/contact-us" class="btn contact btn-default">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telephone-icon-grey.png" />
                            </a>
                        </li>
                    </ul>
                <?php else: ?>
                    <?php if (!$user->isAdmin()) : ?>
                        <ul class="list-unstyled list-inline list-user">
                            <li>
                                <a id="dropUser" role="button" class="user-settings dropdown-toggle" data-toggle="dropdown" href="#">
                                    Hello <?= $user->displayUser() ?>! <b class="caret"></b>
                                </a>
                                <ul id="menuUser" class="dropdown-menu dropdown-tip row" role="menu" aria-labelledby="dropUser">
                                    <?php if ($user->isBusiness()) : ?>
                                        <li role="presentation" class="col-md-12">
                                            <a role="menuitem" class="parent" tabindex="0"
                                               href="/<?= $accountType ?>/directory"> Directory Details </a>
                                        </li>
                                        <li role="presentation" class="col-md-12">
                                                <a role="menuitem" class="parent" tabindex="0"
                                                href="/<?= $accountType ?>/settings"> Account Settings </a>
                                         </li>
                                    <?php else : ?>
                                        <li role="presentation" class="col-md-12">
                                            <a role="menuitem" class="parent" tabindex="0"
                                               href="/<?= $accountType ?>/overview"> Overview </a>
                                        </li>
                                        <li role="presentation" class="col-md-12">
                                                <a role="menuitem" class="parent" tabindex="0"
                                                href="/<?= $accountType ?>/profile"> Account Settings </a>
                                         </li>
                                    <?php endif ?>
                                     <li role="presentation" class="col-md-12">
                                         <a role="menuitem" class="parent" tabindex="1"
                                            href="/<?= $accountType ?>/logout"> Log Out </a>
                                     </li>
                                </ul>
                            </li>
                            <li>
                            <a href="/<?= $accountType ?>/profile" class="btn btn-default">Manage my account</a>
                            </li>
                        </ul>
                    <?php else : ?>
                        <ul class="list-unstyled list-inline list-user">
                            <li>
                                <a id="dropUser" role="button" class="user-settings dropdown-toggle" data-toggle="dropdown" href="#">
                                    Hello <?= $user->displayUser() ?>! <b class="caret"></b>
                                </a>
                                <ul id="menuUser" class="dropdown-menu dropdown-tip row" role="menu" aria-labelledby="dropUser">
                                    <li role="presentation" class="col-md-12">
                                        <a role="menuitem" class="parent" tabindex="1"
                                           href="/admin/account"> My Account </a>
                                    </li>
                                    <li role="presentation" class="col-md-12">
                                        <a role="menuitem" class="parent" tabindex="1"
                                           href="/admin/logout"> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div><!-- header -->

<div class="sub-menu sub-menu-2" style="display: none;">
    <div class="container hidden-xs">
        <div class="row">
             <div class="col-md-3 col-sm-3 logo">
                <a href="/">
                    <img src="/images/logo.v3.png" class="logoBanner">
                </a>
            </div>
            <div class="col-md-9 col-sm-9">
                <ul class="list-unstyled">
                    <li class="row-1">
                        <ul class="top-links list-unstyled list-inline" id="yw0">
                            <li>
                                <a href="/business/new" class="orange"> Promote your services for free! </a>
                            </li>
                            <li>
                                <a href="/category/enquiry" class="btn btn-warning">Get Free Quotes Now</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- menu -->
<?php if (!$isBusinessView) : ?>
    <div id="menu">
        <div class="container">
            <div class="row">
                <?php
                    $this->widget('MenuWidget',array());
                ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="top-business">
        &nbsp;
    </div>
<?php endif; ?>
<!-- menu -->

<?php if (empty($this->embedContent)) : ?>
    <div id="page">
        <?php if (isset($this->breadcrumbs)): ?>
            <div class="breadcrumb">
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'tagName' => 'div',
                    'htmlOptions' => array('class' => 'container'),
                )); ?><!-- breadcrumbs -->
            </div>
        <?php endif?>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </div><!-- page -->
<? else : ?>
    <?php echo $content; ?>
<? endif; ?>

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 company">
                <h3>The Company</h3>
                <ul class="list-unstyled" id="yw0">
                    <li>
                        <a href="/about-us">About Us</a>
                    </li>
                    <li>
                        <a href="http://blog.donedusted.co.nz">Blog</a>
                    </li>
                    <li>
                        <a href="/why-you-should-trust-us">Why You Should Trust Us</a>
                    </li>
                    <li>
                        <a href="/how-it-works">How It Works</a>
                    </li>
                    <li>
                        <a href="/terms-and-conditions">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 promote-us">
                <h3>Promote With Us</h3>
                <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items'=>array(
                            array('label' => yii::t('menu', 'Register For Free'), 'url' => array('/business/new')),
                            array('label' => yii::t('menu', 'How It Works for service providers'), 'url' => array('/how-it-works-for-service-providers')),
                            array('label' => yii::t('menu', 'Pricing'), 'url' => array('/pricing')),
                            // array('label' => yii::t('menu', 'Directory'), 'url' => array('/faq')),
                        ),
                        'htmlOptions' => array('class' => 'list-unstyled'),
                    ));
                ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 contact-us">
                <h3>Contact Us</h3>
                <ul class="list-unstyled" id="yw3">
                    <li>
                        <a href="/contact-us">Online Enquiries</a>
                    </li>
                    <li>
                        <span>
                            <a href="tel:+6493904363">+64 9 390 4DnD</a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="tel:+64220213040">+64 22 021 3040</a>
                        </span>
                    </li>
                    <li>
                        <a href="mailto:info@donedusted.co.nz">info@donedusted.co.nz</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 social">
                <h3>Follow Us</h3>
                <ul class="list-unstyled list-inline" id="yw6">
                    <!--li>
                        <a href="http://www.facebook.com/DoneDustedNZ" class="facebook" target="_blank">&nbsp;</a>
                        <a href="http://twitter.com/DoneDustedNZ" class="twitter" target="_blank">&nbsp;</a>
                        <a href="http://www.linkedin.com/company/done-&-dusted-co-ltd" class="linkedin" target="_blank">&nbsp;</a>
                    </li-->
                    <li>
                        <div class="fb-like" data-href="https://www.facebook.com/donedustedNZ" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=337522633029633";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    </li>
                    <li>
                        <a href="https://twitter.com/DoneDustedNZ" class="twitter-follow-button" data-show-count="true" data-size="small">Follow @DoneDustedNZ</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </li>
                    <li>
                        <script src="//platform.linkedin.com/in.js" type="text/javascript">
                        lang: en_US
                        </script>
                        <script type="IN/FollowCompany" data-id="3539706" data-counter="right"></script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- footer -->

<div class="row copyright">
    <p class="col-md-12 col-sm-12 col-xs-12 copyright transparent5">
        ©2013 Done & Dusted Ltd. All Rights Reserved.
    </p>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php /* ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">A WEEK TO WIN!</h4>
            </div>
            <div class="modal-body">
                <div>
                    Share your need on www.donedusted.co.nz or <a style="color: #3B5998;" href="https://www.facebook.com/donedustedNZ" target="_blank">like us on facebook</a>
                    &nbsp;within a week to double your chances of winning:
                </div>
                <div>
                    <img src="/images/giftbox.jpg" style="float: right;" />
                    <ul class="list-unstyled">
                        <li> - The grand prize of a gift box (worth $110) from <a href="http://sendsationalgifts.co.nz/" class="orange" target="_blank">Sendsational Gifts</a></li>
                    </ul>
                </div>

                <div>
                    Get ready to receive an unexpected gift!<br />
                    Hurry, hurry up! This special closes on the 13th of December.<br /><br />
                    <span class="fb-like" data-href="https://www.facebook.com/donedustedNZ" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>
                </div>

                <div style="clear: both;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
     <?php */ ?>
</div><!-- /.modal -->

<!-- Live chat -->
<?php if (!$isBusinessView && false) : ?>
    <!-- begin olark code -->
    <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
    f[z]=function(){
    (a.s=a.s||[]).push(arguments)};var a=f[z]._={
    },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
    f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
    0:+new Date};a.P=function(u){
    a.p[u]=new Date-a.p[0]};function s(){
    a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
    hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
    return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
    b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
    b.contentWindow[g].open()}catch(w){
    c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
    var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
    b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
    loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.identify('2176-118-10-8155');/*]]>*/</script><noscript><a href="https://www.olark.com/site/2176-118-10-8155/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
    <!-- end olark code -->
<? endif; ?>

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0021/0556.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

</body>
</html>


<script type="text/javascript">

function getCookie(name)
{
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
 return null;
}

function setCookie(name,value,days)
{
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function openPopup(url, form)
{
    $('#myModal').modal();
}

$(function ()
{
    if (!getCookie('openPromotionDeal') && false)
    {
        setTimeout(function(){openPopup('', '');}, 1200);

        setCookie('openPromotionDeal', 1);
    }
});
</script>

<?php if (Yii::app()->user->hasFlash('track-conversion')): ?>
    <!-- Google Code for Inquiry completed Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = <?php echo Yii::app()->user->getFlash('track-conversion'); ?>;
        var google_conversion_language = "en";
        var google_conversion_format = "1";
        var google_conversion_color = "cccccc";
        var google_conversion_label = "kPC7COupjwcQper20wM";
        var google_conversion_value = 0;
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/981316901/?value=0&amp;label=kPC7COupjwcQper20wM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>
<?php endif; ?>

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=337522633029633";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript">

    function oniPad()
    {
        return (navigator.platform.indexOf('iPad') != -1);
    }

    //Make the sidebar stay in view while scrolling
    $(document).ready(function()
    {
         var msie6 = $.browser == 'msie' && $.browser.version < 7;
         if (!msie6)
         {
            var sidebarBox = $('.sub-menu-2'),
                topMark = $('.row-how-it-works'),
                top = null;

            if (topMark.length <= 0)
                topMark = $('#page .breadcrumb');

            if (topMark.length > 0)
                top = topMark.offset().top - parseFloat(sidebarBox.css('margin-top').replace(/auto/, 0));
            else
                top = -1;

            function moveSidebarFloaterBox()
            {
               // what the y position of the scroll is
               var y = $(window).scrollTop() + 0;

               // whether that's below the form
               if (y >= top && !oniPad())
               {
               //Keep the box in view while scrolling down
               if (!sidebarBox.hasClass('fixed'))
               {
                    sidebarBox.addClass('fixed');
                    sidebarBox.slideDown("fast", function() {
                    moveSidebarFloaterBox();
                    });
               }
               }
               else
               {
                //Put the box back where it was
                sidebarBox.removeClass('fixed');
                sidebarBox.css('display', 'none');
               }
            }

            //When the window is scrolled, re-position the sidebar
            if (top > 0)
            {
                $(window).scroll(function (e) {
                    moveSidebarFloaterBox();
                });

                //Make sure the sidebar is positioned correctly
                moveSidebarFloaterBox();
            }
         }
     });
</script>

<?php
/* Adding reusable popup */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id' => 'resPopup',
    'options' => array(
        'title' => 'Loading...',
        'autoOpen' => false,
        'modal' => true,
        'width' => 550,
        'height' => 470,
    ),
));?>
<div class="divForForm"></div>
<?php $this->endWidget();?>