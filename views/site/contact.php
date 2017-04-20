<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include('/includes/sidebar.inc.php')?>
        </div>

        <div class="col-sm-9">
            <div class="site-contact">
                <h1><?= Html::encode($this->title) ?></h1>

                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Спасибо, что написали нам. Мы скоро ответим вам
                    </div>


                <?php else: ?>

                    <p>
                        Если у вас есть какие-то вопросы, пожалуйста заполните форму и мы ответим Вам. Спасибо.
                    </p>

                    <div class="row">
                        <div class="col-lg-9">

                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'subject') ?>

                            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
