<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage();?>
    <?php //$gallery = $model->getImages();?>
    <?php
    function getGallery($model){
        $gallery = '';
        foreach($model->getImages() as $image){
            $gallery .= "<img width='200' src='{$image->getUrl()}' style='padding-right:10px'>";
        }
        return $gallery;
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
            'name',
            'content:html',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
                'value'=>"<img width='200' src='{$img->getUrl()}'>",
                'format' => 'html'
            ],
            [
                'attribute' => 'gallery',
                'value'=> getGallery($model),
                'format' => 'html'
            ],
            //'hit:boolean',
            //'new',
            //'sale',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name,
            ],
            [
                'attribute' => 'hit',
                'value' => !$model->hit ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => !$model->sale ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => !$model->new ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
