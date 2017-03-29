<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38(063)77 77 777</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Моя корзина</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['admin/']) ?>"><i class="fa fa-lock"></i> Кабинет</a></li>
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username'] ?> (Выход)</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                            <a href="<?= \yii\helpers\Url::home(); ?>"><span class="sk-logo">Sk</span><?php /*echo Html::img('@web/images/home/logo.png',['alt'=>'logo']) */?></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home() ?>"><i class="fa fa-home"></i></a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/']); ?>">Товары</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['cart/view']); ?>">Корзина</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/contacts']); ?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="search_box pull-right">
                        <form method="GET" action="<?= \yii\helpers\Url::to(['category/search']) ?>">
                            <input type="text" name="q" placeholder="Поиск товара"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    </header><!--/header-->
<?= $content ?>

<footer id="footer" style=" margin-top:20px;"><!--Footer-->


</footer><!--/Footer-->

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '
        <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a href="'. \yii\helpers\Url::to(["cart/view"]).'" type="button" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
    ',
]);
\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>