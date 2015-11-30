<?php
    /* @var $this SupplierController */
    $this->pageTitle = Yii::app()->name . ' - ' . $supplier->Title;

    $user = $supplier->UserModel;
    $address = array();
    if (!empty($user->Address1))
        $address[] = $user->Address1;
    if (!empty($user->Address2))
        $address[] = $user->Address2;
    if (!empty($user->City))
        $address[] = $user->City;
    if (!empty($user->PostCode))
        $address[] = $user->PostCode;
    if (!empty($user->Country))
        $address[] = $user->Country;

    $location = array();
    if (!empty($address))
    {
        $addressStr = urlencode(implode(',', $address));

        $url = "http://maps.google.com/maps/api/geocode/json?address=" . $addressStr . "&sensor=false&region=UK";
        $response = file_get_contents($url);
        $response = json_decode($response, true);

        $location = $response['results'][0]['geometry']['location'];
    }

    unset($this->breadcrumbs);
?>

<!--div class="row row-banner">
    View Category -
</div-->

<div class="row row-supplier">
    <? if ($supplier->Logo) : ?>
        <div class="col-md-2">
            <img src="/data/logo/<?= $supplier->User ?>/<?= $supplier->Logo ?>" style="max-height: 150px; max-width: 100%;" />
        </div>
    <? endif; ?>

    <div class="col-md-9">

        <? if ($supplier->Title) : ?>
            <h1>
                <?= $supplier->Title ?>
            </h1>
        <? endif; ?>

        <? if ($supplier->UserModel->CompanyName) : ?>
            <div>
                <h4>
                    <?= $supplier->UserModel->CompanyName ?>
                </h4>
            </div>
        <? endif; ?>

        <? if ($supplier->Url) : ?>
            <div>
                Website:
                <a href="http://<?= str_replace('http://', '', trim($supplier->Url)) ?>">
                    <?= str_replace('http://', '', trim($supplier->Url)) ?>
                </a>
            </div>
        <? endif; ?>

        <div>
            <?= $supplier->UserModel->getAddress() ?>
        </div>


        <? if ($supplier->Description) : ?>
            <div>
                <?= $supplier->Description ?>
            </div>
        <? endif; ?>

        <? if (!empty($location)) : ?>
            <div class="map-border">
                <div id="map-canvas" style="width: 100%; height: 300px;">
                </div>
            </div>

            <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
            </script>

            <script type="text/javascript">
                function initialize()
                {
                    var myLatlng = new google.maps.LatLng(<?= $location['lat'] ?>, <?= $location['lng'] ?>);
                    var mapOptions = {
                        center: myLatlng,
                        zoom: 14,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map-canvas"),
                        mapOptions);

                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        /*icon: "http://yiidonedusted.co.nz/images/logo-tick.png",*/
                        map: map,
                        title: 'Done & Dusted'
                    });
                }

                google.maps.event.addDomListener(window, 'load', initialize);
            </script>

        <? endif; ?>
    </div>
</div>

