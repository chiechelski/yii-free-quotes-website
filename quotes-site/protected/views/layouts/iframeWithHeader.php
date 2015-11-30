<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style type="text/css">
        html, body { 
            margin: 0; 
            padding: 0; 
            height: 97%; 
            overflow: hidden;
        }
        #header #logo a {
            z-index: 20;
            top: 30px;
            float: left;
            position: relative;
        }
        #header #logo img {
            
        }
        #header { 
            height:100px; 
            border-bottom: 1px solid #CCC; 
        }
        .buttons a, .buttons a:visited {
            background-color: #FFB515;           
            font-size: 13px;
            padding: 8px 14px 9px;
            width: 80px;
            display: inline-block;
            padding: 5px 10px 6px;
            color: white;
            text-decoration: none;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
            position: relative;
            cursor: pointer;
            font-weight: bold;
            line-height: 1;
            text-align: center;
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
            margin: 2px;
        }
        .buttons .close { 
            background: #2DAEBF; color: white !important; 
        }
        .buttons .close:hover {
            background: #73cacf; 
        }
        
        .buttons .share { 
            background: #00AA00; color: white !important; 
        }
        .buttons .share:hover {
            background: #00BB00; 
        }
        #header #right {
            float: right;
            right: 20px;
            top: 20px;
            position: relative;
            z-index: 15;
        }
        #middle {
            z-index: 10;
            width: 100%;
            float: right;
            position: absolute
        }
        #block {            
            margin: 4px 35% 0;
            height: 90px;
            width: 600px;
            display: block;            
            /*border: 1px solid #CCC;
            background: #CCC;*/
            text-align: center;
            overflow: hidden;
        }
        #header iframe {
            margin-top: 15px;
        }
        
        #content iframe {
            position: absolute;
            top: 90px; left: 0; width: 100%; height: 90%;
            border: none; padding-top: 20px;
            box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;
        }
    </style>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-41368566-1', 'st4.me');
        ga('send', 'pageview');
     </script>
</head>
<body >
    <div id="header">
        <div id="right" class="buttons">
            <a href="#" class="close"> x Hide Frame </a> <br />
            <a href="#" class="share"> + Share Now </a>
        </div>
        <div id="middle">
            <div id="block">
                <!-- BEGIN ExoClick.com Ad Code -->
                <script type="text/javascript" src="http://syndication.exoclick.com/ads.php?type=468x60&login=chiechelski&cat=472&search=&ad_title_color=0000cc&bgcolor=FFFFFF&border=0&border_color=000000&font=&block_keywords=&ad_text_color=000000&ad_durl_color=008000&adult=1&sub=&text_only=0&show_thumb=&idzone=596333&idsite=214567"></script>
                <noscript>Your browser does not support JavaScript. Update it for a better user experience.</noscript>
                <!-- END ExoClick.com Ad Code -->                
                <!--a href="http://www.capitalfirstinvestorsgroup.com/" target="_blank">
                    <img src="http://www.capitalfirstinvestorsgroup.com/sitebuilder/images/Banner-600x98.jpg" height="130px" />
                </a-->
            </div>
        </div>        
        <div id="logo">
            <a href="/">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainlogo_small.jpg" />
            </a>
            <?php //echo CHtml::encode(Yii::app()->name); ?>
        </div>
    </div><!-- header -->
    <div id="content">
        <?php echo $content; ?>
    </div><!-- content -->    
</body>
</html>