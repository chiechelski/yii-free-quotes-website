<?php
/**
 * class Facebook
 * @author Igor Ivanović
 */
class Google extends CWidget
{
    public $appId;
    public $userType = "";
    public $status = true;
    public $cookie = true;
    public $xfbml  = true;
    public $oauth  = true;
    public $userSession;
    public $facebookButtonTitle = "Facebook Connect";
    public $fbLoginButtonId     = "google_login_button_id";
    public $logoutButtonId      = "your_logout_button_id";
    public $googleLoginUrl    = "google/login";
    public $facebookPermissions = "email,user_likes";
    public $script = "";

    /**
    * Run Widget
    */
    public function run()
    {
        $this->googleLoginUrl = Yii::app()->createAbsoluteUrl($this->googleLoginUrl);
        $this->userSession = Yii::app()->session->sessionID;
        $this->renderJavascript();
        $this->render('login');
    }

    /**
    * Render necessary facebook  javascript
    */
    private function renderJavascript()
    {

$script=<<<EOL
    <!-- BEGIN Pre-requisites -->
    <script type="text/javascript">
    (function () {
      var po = document.createElement('script');
      po.type = 'text/javascript';
      po.async = true;
      po.src = 'https://plus.google.com/js/client:plusone.js?onload=start';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(po, s);
    })();

    function getEmailCallback(obj)
    {
        $.ajax({
            type: 'get',
            url: '{$this->googleLoginUrl}',
            data: ({
                user: obj,
                session: "{$this->userSession}",
                type: '{$this->userType}'
            }),
            dataType : 'json',
            success : function( data ){
                console.log(data);
                if (data.error == 0)
                    window.location.href = data.redirect;
                else {
                    alert( data.error );
                    FB.logout();
                }
            }
        });

        console.log(obj);   // Uncomment to inspect the full object.
    }

    function signInCallback(authResult)
    {
        if (authResult['access_token'])
        {
            gapi.client.load('oauth2', 'v2', function() {
                var request = gapi.client.oauth2.userinfo.get();
                request.execute(getEmailCallback);
            });
        }
        else if (authResult['error'])
        {
          // There was an error.
          // console.log('There was an error: ' + authResult['error']);
        }
    }
  </script>
  <!-- END Pre-requisites -->
EOL;

        $this->script = $script;
    }

}
