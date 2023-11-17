<?php

/** @var yii\web\View $this */
/** @var yii\widgets\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
 <div class="entrance">
 <?php
$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="div_input">
    <div class="row">


            <?php $form = ActiveForm::begin([
                'id' => 'login-form',              
            ]); ?>
                
            <?= $form->field($model, 'username',['options' => ['class'=>""]])->textInput(['autofocus' => true, 'class'=>""]) ?>

            <?= $form->field($model, 'password', ['options' => ['class'=>""]])->passwordInput() ?>
            </div>
           
            <div class="div_btn">
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
    </div>
</div>
