<?php  use app\modules\admin\models\Main; ?>
<div class="left-sidebar">
    <h2>Категории</h2>

    <ul class="catalog category-products">
        <?=\app\components\MenuWidget::widget(['tpl'=>'menu']);?>
    </ul>


    <?php
    $main = Main::findOne(1);
    if($main->show == 1){

        $mainImg = $main->getImage();
    ?>
    <div class="shipping text-center productinfo"><!--shipping-->
        <?php if($main->link){?>
            <a href="<?= $main->link ?>" target="_blank">
        <?php }?>
        <img src="<?= $mainImg->getUrl() ?>"/>
                <?php if($main->link){?>
            </a>
            <?php }?>

    </div><!--/shipping-->
    <?php }?>

</div>