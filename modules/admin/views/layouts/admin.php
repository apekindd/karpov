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
        <title>Админка <?= Html::encode($this->title) ?></title>
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
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= \yii\helpers\Url::to(['/site/index']) ?>">На сайт</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['/admin'])) ? 'class="active"' : '' ?>>Заказы</a></li>
                                <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['category/index'])) ? 'class="active"' : '' ?>>Список категорий</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['category/create']) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['category/create'])) ? 'class="active"' : '' ?>>Добавить категорию</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= \yii\helpers\Url::to(['product/index']) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['product/index'])) ? 'class="active"' : '' ?>>Список товаров</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['product/create']) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['product/create'])) ? 'class="active"' : '' ?>>Добавить товар</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Главная страница<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['main/view','id'=>1]) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['main/view','id'=>1])) ? 'class="active"' : '' ?>>Просмотр</a>
                                        </li>
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['main/update','id'=>1]) ?>" <?=(Yii::$app->request->url == \yii\helpers\Url::to(['main/update','id'=>1])) ? 'class="active"' : '' ?>>Редактирование</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a <?=(Yii::$app->request->url == \yii\helpers\Url::to(['review/index'])) ? 'class="active"' : '' ?> href="<?= \yii\helpers\Url::to(['review/index']) ?>">Отзывы</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username'] ?> (Выход)</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    <div class="container">
       <?php if(Yii::$app->session->hasFlash('success')){?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
        <?php } ?>
        <?= $content ?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>