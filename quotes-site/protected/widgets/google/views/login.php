<?php echo $this->script; ?>

<?php if(Yii::app()->user->isGuest): ?>
    <div id="signinButton">
      <span class="g-signin"
        data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile"
        data-clientid="738119394842-trmolvs2ojjchsafcbhir94jaoscu80d.apps.googleusercontent.com"
        data-redirecturi="postmessage"
        data-accesstype="offline"
        data-height="tall"
        data-width="wide"
        class="<?php echo $this->fbLoginButtonId; ?>"
        data-cookiepolicy="single_host_origin"
        data-callback="signInCallback">
      </span>
    </div>
    <div id="">&nbsp;</div>
<?php endif; ?>
