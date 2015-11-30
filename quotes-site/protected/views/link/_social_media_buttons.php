<!-- Share Options -->
<div id="social-media-buttons" style="width: 480px; background-color: #EEE; padding: 20px 15px 15px 15px; text-align: center;">

    <!--    Facebook Like  -->
    <div  style="float: left;" class="fb-like" data-href="<?= $model->createNewUrl(); ?>" data-send="false" data-layout="button_count" data-width="100" data-height="30" data-show-faces="false" data-font="lucida grande"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!--    Google Plus  -->
    <div style="float: left;" class="g-plusone" data-size="medium" data-href="<?= $model->createNewUrl(); ?>"></div>
    <script type="text/javascript">
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
    </script>

    <!--    Twitter Share  -->
    <a href="<?= $model->createNewUrl(); ?>" class="twitter-share-button">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <!--    LinkedIn Share  -->
    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
    <script type="IN/Share" data-url="<?= $model->createNewUrl(); ?>" data-counter="right"></script>

</div>