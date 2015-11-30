<?php
    /* @var $this SiteController */
    $this->pageTitle = Yii::app()->name;
    if (!empty($category['Name']))
    {
        $this->breadcrumbs = array(
            $category['Name'],
        );

        $this->pageTitle .= ' - ' . $category['Name'];
    }

    if (!empty($subCategory['Name']))
    {
        $this->breadcrumbs[] = $subCategory['Name'];
        $this->pageTitle .= ' - ' .  $subCategory['Name'];
    }
?>

<div class="row">
    <div class="col-md-3 col-sm-4">
        <?php
            $this->widget('LeftCategoryMenuWidget', array('selectedCategory' => @$category['Url']));
        ?>
    </div>

    <div class="col-md-9 col-sm-8 col-xs-12">
        <h1>
            <?= (empty($category['Name'])? 'Enquiry Form': $category['Name']) ?>
            <?= (empty($subCategory['Name'])? '': ' - ' . $subCategory['Name']) ?>
        </h1>

        <? if (!empty($subCategory['MetaDescription'])): ?>
            <div class="row">
                <?= $subCategory['MetaDescription'] ?>
                <br /><br />
            </div>
        <? endif; ?>

        <div class="row row-ad">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Services -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:468px;height:60px"
                 data-ad-client="ca-pub-5832174921497980"
                 data-ad-slot="3155257950"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <div class="row row-desc">
            Get quotes from trusted and reviewed service providers in your area.
        </div>

        <?php if (empty($subCategory) && !empty($category['Id'])) : ?>
            <div class="row row-sub-categories">
                <?php foreach($subCategoryList[$category['Id']] as $subCat) : ?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <a href="/category/<?=$category['Url']?>/<?=$subCat['Url']?>">
                            <?=$subCat['Name'];?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <?php
                $this->widget('CategoryContactFormWidget',
                    array('quoteCategory' => $this->breadcrumbs,
                        'category' => $category,
                        'subCategory' => $subCategory));
            ?>
        <?php endif; ?>
    </div>
</div>

