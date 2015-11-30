<?php
/* @var $this MenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form hidden-xs">
    <ul class="nav nav-pills list-unstyled list-inline">
        <?php foreach ($categories as $key => $cat) : ?>
            <li class="dropdown col-md-2 col-sm-2 col-xs-4">
                <a id="drop<?=$key?>" role="button" class="main-category" data-toggle="dropdown" href="#">
                    <?=$cat['Name']?>
                </a>
                <ul id="menu<?=$key?>" class="dropdown-menu dropdown-tip row" role="menu" aria-labelledby="drop<?=$key?>">
                    <li role="presentation" class="col-md-12 col-sm-12 col-xs-12">
                        <a role="menuitem" class="parent" tabindex="<?=$key?>"
                           href="/category/<?=$cat['Url']?>"><?=$cat['Name']?></a>
                    </li>
                    <li class="divider col-md-12"></li>
                    <?php
                        if (!empty($subCategories[$cat['Id']]))
                        {
                            foreach ($subCategories[$cat['Id']] as $key2 => $sub)
                            {
                    ?>
                        <li role="presentation" class="col-md-6 col-sm-6">
                            <a role="menuitem" tabindex="<?=$key2?>"
                               href="/category/<?=$cat['Url']?>/<?=$sub['Url']?>"><?=$sub['Name']?></a>
                        </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div><!-- form -->

<div class="form visible-xs">
    <ul class="nav nav-pills list-unstyled list-inline">
        <?php foreach ($categories as $key => $cat) : ?>
            <li class="dropdown col-xs-4">
                <a class="main-category" href="/category/<?=$cat['Url']?>">
                    <?=$cat['Name']?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>