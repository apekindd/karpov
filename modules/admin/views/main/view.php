<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Main */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Главная страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-view">
    <?php $img = $model->getImage();?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:html',
            [
                'attribute' => 'image',
                'value'=>($img) ? "<img width='200' src='{$img->getUrl()}'>" : '',
                'format' => 'html'
            ],
            'link',
            [
                'attribute' => 'show',
                'value'=>($model->show == 1) ? "Да": "Нет",
                'format' => 'html'
            ],
        ],
    ]) ?>

</div>
