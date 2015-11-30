<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */
?>

<script type="text/javascript">
    function plansView()
    {
        var current = $('#plan-view').val();
        $('.pricing-plans .package').css('display', 'none');
        $('.pricing-plans .package-' + current).slideDown();
    }
</script>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Pricing & Plans</h4>
        </div>
        <div class="modal-body">
            <div class="content pricing-plans">
                Plan types:
                <select id="plan-view" onchange="javascript: plansView()">
                    <option value="free"> Free </option>
                    <option value="medium"> Medium </option>
                    <option value="premium"> Premium </option>
                </select>
                <div class="package block package-free" style="">
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
                                 <br />* Trade services are not charged lead fees
                            </li>
                            <li>
                                5% of commission
                            </li>
                            <li>
                                3 areas/suburbs (to where the business headquarters are located)
                            </li>
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
                    </div>
                </div>
                <div class="package block package-medium" style="display: none">
                    <div>
                        <h2> D&D Medium </h2>
                        <ul class="package-medium-1 block package-1">
                            <li>Our standard package is perfect for providing online quotes while maintaining a budget. More information is shown about the supplier, thus assisting the consumer with their decision making process. Both the supplier and the consumer are connected immediately providing the platform for a successful transaction</li>
                            <li>
                                $420 + GST (annual fee)
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
                    </div>
                </div>
                <div class="package block package-premium" style="display: none">
                    <div>
                        <h2> D&D Premium </h2>
                        <ul class="package-premium-1 block package-1">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
