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
        <h1>Why You Should Trust Us</h1>

        <p>
			<b>Why you should trust Done & Dusted?</b>
        </p>
        <ul style="list-style-type: circle;">
            <li>Clarify your needs - Our customer service team contact you if more requirements
                and specifications are needed for businesses to give you quotes</li>
            <li>Customer reviews - Our team searches for customer reviews (online or offline) from businesses who give you quotes </li>
            <li>Job completion - We make sure your requirements have been fully addressed and that you have received quotes from services</li>
            <li>Verify supplier credentials - We verify suppliers credentials and background information. We take your safety and security seriously.</li>
        </ul>

        <p>
			<b>How do we screen our suppliers?</b>
        </p>
        <ul style="list-style-type: circle;">
            <li>
                Credentials - We check their credentials found from trusted public sources
                such as trade associations
            </li>
            <li>
                Interview - We contact the suppliers by phone and email, going through a
                basic screening and experience process
            </li>
            <li>
                Customer reviews - We check online pre-existing customer reviews from our
                suppliers, helping you have peace of mind the completion of the job will
                be fulfilled to all requirements
            </li>
        </ul>
    </div>
</div>