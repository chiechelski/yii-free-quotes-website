<?php
/* @var $this InitialQuoteFormWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
<script>
    /* Move it later to a widget to be reused */

    var simpleQuoteLocationSelected = false;
    var autocomplete = null;

    function initialize()
    {
        var options = {
            /*types: ['(cities)', '(suburbs)'],*/
            componentRestrictions: {
                country: 'NZ'
            }
        };

        var input = (document.getElementById('simple-quote-location'));
        autocomplete = new google.maps.places.Autocomplete(input, options);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(),
                address = place.address_components,
                streetAddress = '',
                suburb = '',
                state = '',
                zip = '',
                country = '';

            for (var i = 0; i < address.length; i++)
            {
                var addressType = address[i].types[0];

                if (addressType == 'subpremise') {
                    streetAddress += address[i].long_name + '/';
                }
                if (addressType == 'street_number') {
                    streetAddress += address[i].long_name + ' ';
                }
                if (address[i].types[0] == 'route') {
                    streetAddress += address[i].long_name;
                }
                if (addressType == 'locality') {
                    suburb = address[i].long_name;
                }
                if (addressType == 'administrative_area_level_1') {
                    state = address[i].long_name;
                }
                if (addressType == 'postal_code') {
                    zip = address[i].long_name;
                }
                if (addressType == 'country') {
                    country = address[i].long_name;
                }
            }

            $('#simple-quote-address1').val(streetAddress);
            $('#simple-quote-city').val(suburb);
            $('#simple-quote-postcode').val(zip);
            $('#simple-quote-country').val(country);

            simpleQuoteLocationSelected = true;
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function()
    {
        $('#simple-quote-form').submit(function(e)
        {
            if (!simpleQuoteLocationSelected)
            {
                e.preventDefault();
                google.maps.event.trigger(autocomplete, 'place_changed');
                return false;
            }
            else
                return true;
        });

        $('simple-quote-location').keypress(function(e)
        {
            e.preventDefault();
            if (e.which == 13)
                google.maps.event.trigger(autocomplete, 'place_changed');
        });

        $("#simple-quote-button").click(function() {
            $('#category-quote-form').submit();
        });
    });

</script>

<div class="form form-category-enquiry">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'category-quote-form',
    /*'clientOptions'=>array('validateOnSubmit'=>true),
	'enableAjaxValidation'=>true ,*/
));
?>
	<div class="row">
        <div class="col-md-12">
            <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'contact-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>

                <?php if(Yii::app()->user->hasFlash('categoryQuote')): ?>

                    <div class="alert alert-success">
                        <?php echo Yii::app()->user->getFlash('categoryQuote'); ?>
                    </div>

                <?php endif; ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'firstName'); ?>
                        <?php echo $form->textField($model,'firstName'); ?>
                        <?php echo $form->error($model,'firstName'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'lastName'); ?>
                        <?php echo $form->textField($model,'lastName'); ?>
                        <?php echo $form->error($model,'lastName'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'email'); ?>
                        <?php echo $form->textField($model,'email'); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'phoneNumber'); ?>
                        <?php echo $form->textField($model,'phoneNumber'); ?>
                        <?php echo $form->error($model,'phoneNumber'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php
                            $service = '';
                            if (!empty($model->service))
                                $service = $model->service;
                            elseif (!empty($subCategory['Name']))
                                $service = $subCategory['Name'];

                            echo CHtml::activeLabel($model, 'service', array('required' => true));
                        ?>
                        <a href="#" id="edit-service" style="display: <?= (empty($service)?'none':'inline') ?>" onclick="javascript: editService(); return false;"><img class="edit" src="/images/edit.png" /> Edit</a>
                        <?
                            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'name' => 'CategoryForm[service]',
                                'value' => $service,
                                'source' => CController::createUrl('/category/autocomplete'),
                                'options' => array(
                                'showAnim' => 'fold',
                                'minLength' => '2',
                                'select' => 'js:function(event, ui) {
                                        $("#CategoryForm_service").val(ui.item.label);
                                        $("#simple-quote-category").val(ui.item.id);
                                        $("#edit-service").css("display", "inline");
                                        $("#CategoryForm_service").prop("disabled", true);
                                        return false;
                                    }',
                                ),
                                'htmlOptions' => array(
                                'onfocus' => 'js: this.value = null; $("#CategoryForm_service").val(null);',
                                'class' => 'input-xxlarge search-query',
                                'disabled' => (empty($service)?'':'disabled'),
                                'placeholder' => 'eg. Tiler, Cleaner, Hairdresser, etc',
                                'style' => (!empty($user->Id)?'display: none;': '')
                                ),
                            ));
                        ?>
                        <?php echo $form->error($model, 'service'); ?>
                        <?php echo $form->hiddenField($model, 'category', array('type' => "hidden", 'id' => "simple-quote-category", "value" => @$subCategory['Id'])); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'jobDescription'); ?>
                        <?php echo $form->textArea($model,'jobDescription', array('rows' => 6, 'cols' => 50,
                            'class' => 'tooltip-i fixed',
                            'placeholder' => 'Please describe your request. The more details you provide, the better the quotes.',
                            'data-content' => '<ul><li>What do you need help with?</li><li>What are the specifications of the job?</li><li>How many hours of help do you need?</li><li>Will you be supplying any of the materials yourself?</li></ul>'
                            )); ?>
                        <?php echo $form->error($model,'jobDescription'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model,'location'); ?>
                        <?php echo $form->textField($model, 'location',
                            array(
                                'size' => 50, 'maxlength' => 1000, 'class' => 'location',
                                'class' => 'tooltip-i',
                                'data-content' => 'Type the full address',
                                'placeholder' => 'Search for the location...', 'id' => "simple-quote-location"
                            )); ?>
                        <?php echo $form->error($model,'location'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'address1'); ?>
                        <?php echo $form->textField($model, 'address1'); ?>
                        <?php echo $form->error($model, 'address1'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'suburb'); ?>
                        <?php echo $form->textField($model, 'suburb'); ?>
                        <?php echo $form->error($model, 'suburb'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'city'); ?>
                        <?php echo $form->textField($model, 'city'); ?>
                        <?php echo $form->error($model, 'city'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'postcode'); ?>
                        <?php echo $form->textField($model, 'postcode'); ?>
                        <?php echo $form->error($model, 'postcode'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <?php echo $form->labelEx($model,'when'); ?>
                        <div class="row when-options">
                            <div class="col-md-12">
                                <?php echo $form->radioButtonList($model, 'when',
                                    array('flexible' => 'I\'m flexible',
                                        'within-48' => 'Within 48 hours',
                                        'specific-date' => 'Specific date'),
                                    array('class' => 'when',
                                        'separator' => ' ')
                                ); ?>
                                <label for="CategoryForm-when-flexible">  </label>
                            </div>
                        </div>
                        <?php echo $form->error($model,'when'); ?>
                    </div>
                </div>

                <?php
                    $hour = array();
                    for ($i = 6; $i <= 21; $i++)
                    {
                        $param = 'am';
                        $aux = $i;
                        if ($i > 12)
                        {
                            $param = 'pm';
                            $aux -= 12;
                        }
                        else if ($i < 10)
                        {
                            $i = '0' . $i;
                        }

                        $hour[$i . ':00'] = $aux . ':00' . $param;

                        if ($i == 21)
                            break;

                        $hour[$i . ':30'] = $aux . ':30' . $param;
                    }
                ?>

                <div class="row row-specific-date" style="display: none;">
                    <ul class="list-unstyled list-inline">
                        <li class="input-append date">
                            <?php echo $form->labelEx($model, 'specificDate'); ?>
                            <?php echo $form->textField($model, 'specificDate'); ?>
                        </li>
                        <li>
                            <label for="CategoryForm_specificDate">Between</label> <br />
                            <?php echo $form->dropDownList($model, 'specificFromHour', $hour, array('options' => array($model->specificFromHour => array('selected' => true)))); ?>
                            and
                            <?php echo $form->dropDownList($model, 'specificToHour', $hour, array('options' => array($model->specificToHour => array('selected' => true)))); ?>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <?php if (CCaptcha::checkRequirements()): ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <?php $this->widget('CCaptcha', array('captchaAction' => 'site/captcha')); ?>
                            <div class="hint" style="padding-top: 10px; float: left;position: relative;width: 380px;">
                                Please enter the letters as they are shown in the image above.
                                <br/>Letters are not case-sensitive.
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <?php echo $form->labelEx($model,'verifyCode'); ?>
                            <?php echo $form->textField($model,'verifyCode'); ?>
                            <div>
                                <?php echo $form->error($model,'verifyCode'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-warning')); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
        <script>
            function editService()
            {
                $('#simple-quote-category').val(0);
                $('#edit-service').css('display', 'none');
                $('#CategoryForm_service').prop('disabled', false).focus();
            }

            $(document).ready(function() {
                $('.when').change(function () {
                    if ($(this).val() == 'specific-date')
                        $('.row-specific-date').slideDown();
                    else
                        $('.row-specific-date').slideUp();
                });

                $('.when:checked').change();
            });

            var date = new Date();
            date.setDate(date.getDate()+1);

            $('#CategoryForm_specificDate').datepicker({
                format: "dd M yyyy",
                startDate: date
            });

            /* Move it later to a widget to be reused */

            var simpleQuoteLocationSelected = false;
            var autocomplete = null;

            function initialize()
            {
                var options = {
                    /*types: ['(cities)', '(suburbs)'],*/
                    componentRestrictions: {
                        country: 'NZ'
                    }
                };

                var input = (document.getElementById('simple-quote-location'));
                autocomplete = new google.maps.places.Autocomplete(input, options);

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace(),
                        address = place.address_components,
                        streetAddress = '',
                        suburb = '',
                        state = '',
                        zip = '',
                        city = '',
                        country = '';

                    for (var i = 0; i < address.length; i++)
                    {
                        var addressType = address[i].types[0];

                        if (addressType == 'subpremise') {
                            streetAddress += address[i].long_name + '/';
                        }
                        if (addressType == 'street_number') {
                            streetAddress += address[i].long_name + ' ';
                        }
                        if (address[i].types[0] == 'route') {
                            streetAddress += address[i].long_name;
                        }
                        if (addressType == 'sublocality') {
                            suburb = address[i].long_name;
                        }
                        if (addressType == 'locality') {
                            city = address[i].long_name;
                        }
                        if (addressType == 'administrative_area_level_1') {
                            state = address[i].long_name;
                        }
                        if (addressType == 'postal_code') {
                            zip = address[i].long_name;
                        }
                        if (addressType == 'country') {
                            country = address[i].long_name;
                        }
                    }

                    $('#CategoryForm_address1').val(streetAddress);
                    $('#CategoryForm_suburb').val(suburb);
                    $('#CategoryForm_city').val(city);
                    $('#CategoryForm_postcode').val(zip);
                    $('#CategoryForm_country').val(country);

                    simpleQuoteLocationSelected = true;
                });

            }

            google.maps.event.addDomListener(window, 'load', initialize);

            $(document).ready(function()
            {
                $('#simple-quote-form').submit(function(e)
                {
                    if (!simpleQuoteLocationSelected)
                    {
                        e.preventDefault();
                        google.maps.event.trigger(autocomplete, 'place_changed');
                        return false;
                    }
                    else
                        return true;
                });

                $('simple-quote-location').keypress(function(e)
                {
                    e.preventDefault();
                    if (e.which == 13)
                        google.maps.event.trigger(autocomplete, 'place_changed');
                });

                $("#simple-quote-button").click(function() {
                    $('#simple-quote-form').submit();
                });

                // Starting carousel
                // setTimeout(function(){ $('.carousel').carousel({ interval: 4000 }) }, 500);
            });

        </script>

    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $(function() {
        $('.tooltip-i').popover({
            html : true,
            placement: 'right',
            trigger: 'manual'
        });

        $('.tooltip-i.fixed').popover({
            trigger: 'manual'
        });

        $('.tooltip-i.fixed').popover('show');
    });
</script>