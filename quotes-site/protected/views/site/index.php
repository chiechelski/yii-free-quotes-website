<?php
    /* @var $this SiteController */
    $this->pageTitle=Yii::app()->name . ' - Get free quotes from local services providers';
    unset($this->breadcrumbs);
?>

<!-- homepage carousel -->
<div class="carousel-outer">
    <div class="container">
        <?php
            $this->widget('SimpleQuoteFormWidget',array());
        ?>
    </div>
</div>
<!-- homepage carousel -->

<div class="clear: both;"> </div>

<div id="page">
    <div class="container">

        <!-- How it works -->
        <div class="row row-how-it-works">
            <div class="col-md-12 col-sm-12">
                <h2>How it Works <span class="green">?</span></h2>
            </div>

            <div class="col-md-3 col-sm-3 step">
                <img src="images/step1.png" />
                <div class="title-text">
                    Step 1: <span class="green">Post a job</span>
                </div>
                <div class="text">
                    Tell us about your need and the service you require
                </div>
            </div>
            <div class="col-md-1 col-sm-1 hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-4 col-sm-4 step">
                <img src="images/step2.png" />
                <div class="title-text">
                    Step 2: <span class="green">Receive up to 5 quotes</span>
                </div>
                <div class="text">
                    We identify the professionals in your area, who can provide this service for you
                </div>
            </div>
            <div class="col-md-1 col-sm-1 hidden-xs">
                <img src="images/arrow.png" />
            </div>
            <div class="col-md-3 col-sm-3 step">
                <img src="images/step3.png" />
                <div class="title-text">
                    Step 3: <span class="green">Choose the best service provider</span>
                </div>
                <div class="text">
                    Receive up to 5 free quotes from trusted local service providers
                </div>
            </div>
        </div>

        <!-- Why -->
        <div class="row row-why-dd">
            <div class="col-md-12 col-sm-12">
                <h2>Why Done & Dusted <span class="orange">?</span></h2>
            </div>
        </div>
        <div class="row row-why-dd">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon1.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Get Free Quotes</h4>
                    Receive free quotes from trusted local service providers at your own convenience.
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon2.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Friendly Customer Service</h4>
                    Our customer service team will get in touch with you, making sure your needs are
                    understood and appropriately met. Talk to our friendly staff if you need any
                    assistance with your inquiry or with your account.
                </div>
            </div>
        </div>

        <div class="row row-why-dd">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon3.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Support Micro & Small Businesses</h4>
                    We support micro and small businesses to grow,
                    develop and become established in their local area.
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon4.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Intervention Support</h4>
                    Intervention Support- We provide assistance in case any problem occurs between the consumer and the supplier.
                </div>
            </div>
        </div>

        <div class="row row-why-dd">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon5.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Security and Verification</h4>
                    For your security we review and check suppliers' licences and
                    qualifications for you.
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <img src="images/icon6.png" />
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4>Social Corporate Responsibility</h4>
                    We believe in supporting our local community to develop and grow.
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="row row-popular-cat">
            <div class="col-md-12 col-sm-12">
                <h2>Our Popular Categories</h2>
            </div>

            <div class="col-md-4 col-sm-4">
                <a href="/category/trade-services-and-repairs" class="top-trade-services-and-repairs">
                    <img src="images/categories/trade-services-and-repairs.jpg" class="img-responsive" />
                    <h4>Trade Services & Repairs</h4>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/category/business-and-consulting" class="top-business-and-consulting">
                    <img src="images/categories/business-and-consulting.jpg" class="img-responsive" />
                    <h4>Business & Consulting</h4>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/category/events" class="top-events">
                    <img src="images/categories/events.jpg" class="img-responsive" />
                    <h4>Events</h4>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/category/health-and-beauty" class="top-health-and-beauty">
                    <img src="images/categories/health-and-beauty.jpg"  class="img-responsive" />
                    <h4>Health & Beauty</h4>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/category/computer-and-technology" class="top-computer-and-technology">
                    <img src="images/categories/computer-and-technology.jpg" class="img-responsive" />
                    <h4>Computer & Technology</h4>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="/category/home-family-and-pets" class="top-home-family-and-pets">
                    <img src="images/categories/home-family-and-pets.jpg" class="img-responsive" />
                    <h4>Home/Family & Pets</h4>
                </a>
            </div>
        </div>

        <?
        /*
         * http://wrapbootstrap.com/preview/WB01649B4
         * http://wrapbootstrap.com/preview/WB0448XT6 */
        ?>
        <!-- Testimonials -->
        <div class="row row-testimonials">
            <div class="col-md-12 col-sm-12">
                <h2>Testimonials</h2>
            </div>
            <div class="col-md-12 col-sm-12 description">
                We have worked with hundreds of clients. Check what our awesome happy clients saying about us.
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="author">
                    <img src="images/icon-default-person.jpg"/>
                    <div class="name">D. Halton</div>
                </div>
                "The experience of dealing with Done & Dusted was good as it took the hassle out of having to find suitable trades people."
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="author">
                    <img src="images/icon-default-person.jpg"/>
                    <div class="name">S. Wasi</div>
                </div>
                "I am happy with the standard of the work completed and would be happy to use Done & Dusted again"
            </div>
        </div>
    </div>
</div>
