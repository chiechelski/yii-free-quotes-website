<?php
/* @var $this AddNotesFormWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form">
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-note-form',
        'action' => '',
        'htmlOptions' => array(
            'style' => 'display: none;',
        ),
        /*'clientOptions'=>array('validateOnSubmit'=>true),
        'enableAjaxValidation'=>true ,*/
    ));

    $error = $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary'));
?>

    <? if (!empty($error)) : ?>
        <?= $error; ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#add-note-link').click();
            });
        </script>
    <? endif; ?>

	<div class="row row-add-note">
        <ul class="list-unstyled">
            <li>
                <?php
                    echo $form->textArea($model, 'Note',
                        array(
                            'size' => 50, 'rows' => 3, 'maxlength' => 1000, 'class' => 'notes',
                            'placeholder' => 'Note Message', 'id' => "simple-quote-location"
                        ));
                ?>
            </li>
            <li>
                <?php
                    echo CHtml::submitButton('Add note', array('name' => 'Submit', 'id' => 'simple-quote-button', 'class' => 'btn btn-warning'));
                ?>
            </li>
        </ul>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->