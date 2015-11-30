<?php
/* @var $this LeftCategoryMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form hidden-xs">
    <ul class="list-unstyled menu-left /*top-<?= $selectedCategory ?>*/">
        <?php foreach ($categories as $key => $cat) : ?>
            <li class="<?=($cat['Url'] == $selectedCategory?'active':'')?>">
                <a href="/category/<?=$cat['Url']?>">
                    <?=$cat['Name']?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>