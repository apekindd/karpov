<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<?php /*
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
*/?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php include('/includes/sidebar.inc.php')?>
            </div>

            
            <div class="col-sm-9 padding-right">
                <?php if(!empty($hits)){?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Все товары</h2>
                    <?php foreach($hits as $hit){ ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $mainImg = $hit->getImage(); ?>
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"> <?= Html::img($mainImg->getUrl(),['alt'=>$hit->name]) ?></a>
                                    <h2><?= $hit->price ?>грн</h2>
                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name ?></a></p>
                                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id'=>$hit->id]) ?>" data-id="<?= $hit->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                </div>
                                <?php
                                if($hit->new){
                                   echo Html::img('@web/images/home/new.png',['class'=>'new']);
                                }elseif($hit->sale){
                                   echo Html::img('@web/images/home/sale.png',['class'=>'sale']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div><!--features_items-->

                    <div class="clearfix"></div>
                    <?php
                    // display pagination
                    echo yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                <?php }else{
                    echo "<h2>В категории пока нет товаров</h2>";
                } ?>
                <div class="clearfix"></div>
        </div>
    </div>
</section>