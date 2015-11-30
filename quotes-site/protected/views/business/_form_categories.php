<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <ul class="list-group">
        <?php foreach ($categories as $key => $cat) : ?>

            <li class="list-group-item list-group-cat" id="category-<?=$cat['Id']?>">
                <span class="badge"><?= count($subCategories[$cat['Id']]) ?></span>
                <span class="badge badge-selected">0</span>
                <?=$cat['Name']?>
            </li>

            <?php if (!empty($subCategories[$cat['Id']])) : ?>
                <li class="list-group-item list-group-subcat" id="subcategories-<?=$cat['Id']?>"  style="display: none;">
                    <?php foreach ($subCategories[$cat['Id']] as $key2 => $sub) : ?>
                        <button type="button" class="btn btn-default <?php if (!empty($selectedSubCategories[$sub['Id']])) echo " btn-success " ?>" id="subcat-<?=$sub['Id']?>"><?=$sub['Name']?></button>
                        <input style="display: none;" type="checkbox"
                            <?php if (!empty($selectedSubCategories[$sub['Id']])) echo " checked = 'checked' " ?>
                            name="subCategory[]" id="field-subcat-<?=$sub['Id']?>" value="<?=$sub['Id']?>" />
                    <?php endforeach; ?>
                </li>
            <?php endif; ?>

        <?php endforeach; ?>
    </ul>

    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning', 'name' => 'Categories')); ?>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(document).ready(function () {
        $('.list-group-cat').click(function () {
            var catId = parseInt($(this).attr('id').replace('category-',''));

            if ($('#subcategories-' + catId).css('display') == 'none')
            {
                $('.list-group-subcat').each(function() {
                    if ($(this).css('display') != 'none')
                        $(this).slideUp();
                });

                $('#subcategories-' + catId).slideDown();
            }
            else
            {
                $('#subcategories-' + catId).slideUp();
            }
        });

        $('.list-group-subcat button').click(function() {

            var subId = parseInt($(this).attr('id').replace('subcat-',''));
            var categoryId = parseInt($(this).parent().attr('id').replace('subcategories-',''));

            if ($(this).hasClass('btn-success'))
            {
                $('#field-subcat-' + subId).prop('checked', false);
                $(this).removeClass('btn-success');
            }
            else
            {
                $('#field-subcat-' + subId).prop('checked', true);
                $(this).addClass('btn-success');
            }

            updateCategoryTotals($(this).parent(), categoryId);
        });


        $('.list-group-subcat').each(function () {
            updateCategoryTotals(this, parseInt($(this).attr('id').replace('subcategories-','')));
        });
    });

    function updateCategoryTotals(obj, categoryId)
    {
        var totAux = 0;
        $(obj).find('button').each(function () {
            if ($(this).hasClass('btn-success'))
                totAux++;
        });
        $('#category-' + categoryId + ' .badge-selected').html(totAux);
    }
</script>