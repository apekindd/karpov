<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Main */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'description')->widget(\mihaildev\ckeditor\CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions([
            'elfinder',
            //'path' => 'some/sub/path'
        ],[]),
    ]);
    ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'show')->dropDownList([1=>"Да",0=>"Нет"]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
