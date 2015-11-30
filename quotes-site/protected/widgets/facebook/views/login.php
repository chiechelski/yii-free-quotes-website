<?php if(Yii::app()->user->isGuest): ?>
    <div id="<?php echo $this->fbLoginButtonId; ?>">&nbsp;</div>
<?php endif; ?>

<script type="text/javascript">
    <?php echo $this->script; ?>
</script>