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
                city = '',
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
                if (addressType == 'sublocality') {
                    suburb = address[i].long_name;
                }
                if (addressType == 'locality') {
                    city = address[i].long_name;
                }
                if (addressType == 'postal_code') {
                    zip = address[i].long_name;
                }
                if (addressType == 'country') {
                    country = address[i].long_name;
                }
            }

            $('#simple-quote-address1').val(streetAddress);
            $('#simple-quote-suburb').val(suburb);
            $('#simple-quote-city').val(city);
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
            $('#simple-quote-form').submit();
        });

        // Starting carousel
        // setTimeout(function(){ $('.carousel').carousel({ interval: 4000 }) }, 500);
    });

</script>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'simple-quote-form',
    'action' => 'category/enquiry',
    /*'clientOptions'=>array('validateOnSubmit'=>true),
	'enableAjaxValidation'=>true ,*/
));
?>


    <div id="carousel-example-generic" class="carousel slide hidden-xs">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active item-1">
                <img src="images/main-image/image-1.jpg">
            </div>
            <div class="item item-2">
                <img src="images/main-image/slider-3.jpg">
            </div>
            <div class="item item-3">
                <img src="images/main-image/slider-2.jpg">
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>



	<div class="row row-simple-quote">
        <div class="row row-first-text">
            <h1>Hire a quality local business.</h1>
        </div>

        <div class="row row-second-text">
            <h2>Get free quotes from trusted local services providers in New Zealand</h2>
        </div>

        <ul class="list-unstyled list-inline">
            <li>
                 <?
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'SimpleQuoteForm[service]',
                        'value' => '',
                        'source' => CController::createUrl('/category/autocomplete'),
                        'options' => array(
                        'showAnim' => 'fold',
                        'minLength' => '2',
                        'select' => 'js:function(event, ui) {
                                $("#simple-quote-category").val(ui.item.id);
                                $("#service").val(ui.item.label);
                                return true;
                            }',
                        ),
                        'htmlOptions' => array(
                        /*'onfocus' => 'js: this.value = null; $("#service").val(null);',*/
                        'class' => 'input-xxlarge search-query',
                        'placeholder' => 'What are you looking for?',
                        'style' => (!empty($user->Id)?'display: none;': '')
                        ),
                    ));
                ?>
            </li>
            <li>
                <?php
                    echo $form->textField($model, 'location',
                        array(
                            'size' => 50, 'maxlength' => 1000, 'class' => 'location',
                            'placeholder' => 'Location', 'id' => "simple-quote-location"
                        ));
                ?>
            </li>
            <li>
                <?php
                    echo CHtml::submitButton('Get Quotes Now', array('name' => 'Submit', 'id' => 'simple-quote-button', 'class' => 'btn btn-default btn-warning'));
                ?>
            </li>
        </ul>
    </div>

    <?php echo $form->hiddenField($model, 'category', array('type' => "hidden", 'id' => "simple-quote-category")); ?>
    <?php echo $form->hiddenField($model, 'address1', array('type' => "hidden", 'id' => "simple-quote-address1")); ?>
    <?php echo $form->hiddenField($model, 'suburb', array('type' => "hidden", 'id' => "simple-quote-suburb")); ?>
    <?php echo $form->hiddenField($model, 'city', array('type' => "hidden", 'id' => "simple-quote-city")); ?>
    <?php echo $form->hiddenField($model, 'postcode', array('type' => "hidden", 'id' => "simple-quote-postcode")); ?>
    <?php echo $form->hiddenField($model, 'country', array('type' => "hidden", 'id' => "simple-quote-country")); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->