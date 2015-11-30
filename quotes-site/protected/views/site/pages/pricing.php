<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<div class="row">
    <!--div class="col-md-3 col-sm-4">
        <?php
            $this->widget('LeftMenuWidget');
        ?>
    </div-->

    <div class="col-md-12 col-sm-12">
        <h1>Pricing & Plans</h1>

        <div class="row pricing-plans">
            <div class="col-md-4 col-sm-4 block">
                <div>
                    <h2> D&D Free </h2>
                    <ul class="package-free-1 package-1">
                        <li>Our free package is a basic introduction to giving quotes online. Therefore, creating the opportunity to reach customers that otherwise would be missed
                        </li>
                        <li>
                            Free
                        </li>
                        <li>
                            $10 -$25 lead fee depending on the industry (please contact our customer service 
                            team for information on your particular industry).
                            <br /> Trade services are not charged lead fees
                        </li>
                        <li>
                            5% of commission
                        </li>
                        <li>
                            3 areas/suburbs (to where the business headquarters are located)
                        </li>
                        <li>
                            <a href="#" onclick="javascript: moreBenefits('.package-sub-1'); return false;">More benefits!</a>
                            <ul class="package-sub-1 sub-package package-free" style="display: none;">
                                <li>
                                    Business Name
                                </li>
                                <li>
                                    Address + Map
                                </li>
                                <li>
                                    One contact phone number
                                </li>
                                <li>
                                    Contact email
                                </li>
                                <li>
                                    200 character business description
                                </li>
                                <li>
                                    One category to list under
                                </li>
                                <li>
                                    One logo image (300 x 300)
                                </li>
                            </ul>
                        </li>

                        <li class="action-btn">
                            <a href="/business/new/free" class="btn btn-warning">Signup Now</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 block recommended">
                <div>
                    <h2> D&D Medium </h2>
                    <ul class="package-medium-1 package-1">
                        <li>Our standard package is perfect for providing online quotes while maintaining a budget. More information is shown about the supplier, thus assisting the consumer with their decision making process. Both the supplier and the consumer are connected immediately providing the platform for a successful transaction</li>
                        <li>
                            $420 + GST (annual fee) <br />
                            <span class="discount">
                                * Introductory Offer- Get 30 % OFF!
                            </span>
                        </li>
                        <li>
                            no lead fee
                        </li>
                        <li>
                            5% of commission
                        </li>
                        <li>
                            10 areas/ suburbs
                        </li>
                        <li>
                            <a href="#" onclick="javascript: moreBenefits('.package-2'); return false;">More benefits!</a>
                            <ul class="package-2 sub-package package-medium-2" style="display: none;">
                                <li>
                                    Business Name
                                </li>
                                <li>
                                    Address + Map
                                </li>
                                <li>
                                    Multiple contact phone numbers
                                </li>
                                <li>
                                    Contact email
                                </li>
                                <li>
                                    200 character business description
                                </li>
                                <li>
                                    3000 character full business description
                                </li>
                                <li>
                                    Three categories to list under
                                </li>
                                <li>
                                    One logo image + up to 5 additional images
                                </li>
                                <li>
                                    Logo shown in search results
                                </li>
                                <li>
                                    Ability to add a video on listing page Ability
                                </li>
                                <li>
                                    Business Name appears beside the form when the consumer 
                                    is asking for the relevant service
                                </li>
                                <li>
                                    Badge showing by the business name, this
                                    gives more credibility to the supplier as it
                                    shows that a more throrogh screening has
                                    happened on that supplier
                                </li>
                                <li>
                                    Job notification SMS
                                </li>
                            </ul>
                        </li>
                        <li class="action-btn">
                            <a href="/business/new/medium" class="btn btn-warning">Signup Now</a>
                        </li
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 block">
                <div>
                    <h2> D&D Premium </h2>
                    <ul class="package-premium-1 package-1">
                        <li>Our Premium package expands upon the visibility and ease of access for the request of information. Quotes can be received by email or SMS for quick response and are tailored to your local area. As this package provides the most information, you have the best opportunity to service client responses in a timely fashion</li>
                        <li>
                            $948 + GST (annual fee)
                        </li>
                        <li>
                            no lead fee
                        </li>
                        <li>
                            3% of commission
                        </li>
                        <li>
                            20 areas/ suburbs
                        </li>
                        <li>
                            <a href="#" onclick="javascript: moreBenefits('.package-3'); return false;">More benefits!</a>
                            <ul class="package-3 sub-package package-premium" style="display: none;">
                                <li>
                                    Business Name
                                </li>
                                <li>
                                    Address + Map
                                </li>
                                <li>
                                    Multiple contact phone numbers
                                </li>
                                <li>
                                    Contact email
                                </li>
                                <li>
                                    200 character business description
                                </li>
                                <li>
                                    4000 character full business description
                                </li>
                                <li>
                                    Five categories to list under
                                </li>
                                <li>
                                    One logo image + up to 12 additional images
                                </li>
                                <li>
                                    Logo shown in search results
                                </li>
                                <li>
                                    Ability to add a video on listing page Ability
                                </li>
                                <li>
                                    Top business Name appears beside the form when the consumer 
                                    is asking for the relevant service
                                </li>
                                <li>
                                    Badge showing by the business name, this
                                    gives more credibility to the supplier as it
                                    shows that a more throrogh screening has
                                    happened on that supplier
                                </li>
                                <li>
                                    Job notification SMS
                                </li>
                                <li>
                                    Static banner designed by our Art Studio
                                </li>
                            </ul>
                        </li>
                        <li class="action-btn">
                            <a href="/business/new/premium" class="btn btn-warning">Signup Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function moreBenefits(type)
    {
        if ($(type).css('display') == "none")
        {
            $(type).slideDown();
        }
        else
        {
            $(type).slideUp();
        }
    }
</script>