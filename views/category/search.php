<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php include('/includes/sidebar.inc.php')?>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                    <?php if(!empty($products)){ ?>
                        <?php $i=0;
                        foreach($products as $product){ ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?php $mainImg = $product->getImage(); ?>
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>">
                                                <?= Html::img($mainImg->getUrl(),['alt'=>$product->name]) ?>
                                            </a>
                                            <h2><?= $product->price ?>грн</h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?= $product->name ?></a></p>
                                            <a href="#" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                        </div>
                                        <?php
                                        if($product->new){
                                            echo Html::img('@web/images/home/new.png',['class'=>'new']);
                                        }elseif($product->sale){
                                            echo Html::img('@web/images/home/sale.png',['class'=>'sale']);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            <?php if($i%3 == 0){ ?>
                                <div class="clearfix"></div>
                            <?php } ?>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <?php
                        // display pagination
                        echo yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    <?php }else{
                        echo "<h2>Ничего не найдено...</h2>";
                    } ?>
                    <div class="clearfix"></div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>