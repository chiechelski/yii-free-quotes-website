<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - How It Works';
$this->breadcrumbs=array(
	'How It Works',
);
?>

<div class="row how-it-works-page">
    <div class="col-md-3 col-sm-4">
        <?php
            $this->widget('LeftMenuWidget');
        ?>
    </div>

    <div class="col-md-9 col-sm-8">
        <h1>How It Works</h1>

        <div class="row row-how-it-works">
            <div class="col-md-3">
                <img src="images/step1.png" />
                <div class="title-text">
                    Step 1: <span class="green">Post a job</span>
                </div>
                <div class="text">
                    Tell us about your need and the service you require
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-4">
                <img src="images/step2.png" />
                <div class="title-text">
                    Step 2: <span class="green">Receive up to 5 quotes</span>
                </div>
                <div class="text">
                    We identify the professionals in your area, who can provide this service for you
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-3">
                <img src="images/step3.png" />
                <div class="title-text">
                    Step 3: <span class="green">Choose the best service provider</span>
                </div>
                <div class="text">
                    Receive up to 5 free quotes from trusted local service providers
                </div>
            </div>
        </div>

        <div class="row row-how-it-works">
            <div class="col-md-12">
                <h2>Extra Steps</h2>
            </div>
        </div>

        <div class="row row-how-it-works">
            <div class="col-md-3">
                <div class="title-text">
                    Step 4:
                </div>
                <div class="text">
                    Hire the best service provider and get the job!
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-4">
                <div class="title-text">
                    Step 5:
                </div>
                <div class="text">
                    Post feedback on service provider’s quality and assist your local community in finding the best trusted local service providers
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-3">
                <img src="images/logo-tick.png" />
                <div class="title-text text-simple">
                    <span class="green">Simple? Done & Dusted, sorted!</span>
                </div>
            </div>
        </div>
    </div>
</div>