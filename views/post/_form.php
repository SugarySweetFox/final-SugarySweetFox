<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
use app\models\Activities;
use app\models\City;
use app\models\Type;
use app\models\Gender;
use yii\helpers\ArrayHelper;
?>

<link rel="stylesheet" href="../../web/css/style.css">

<div class="post-form">

<div class="container">

<div class="registration">

    <div class="div_input">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), "id", "city"),['class' => ''])->label('Город') ?>

    <?= $form->field($model, 'about_me')->textarea(['rows' => 6])->label('Обо мне') ?>

    <?= $form->field($model, 'activities_id')->dropDownList(ArrayHelper::map(Activities::find()->all(), "id", "name"),['class' => ''])->label('Ищу') ?>

    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(Type::find()->all(), "id", "name"),['class' => ''])->label('Где') ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false)?>

    <?= $form->field($model, 'kol_vo')->textInput()->label('Количесво') ?>

    <?= $form->field($model, 'age')->textInput()->label('Возраст') ?>

    <div class="div_btn">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    </div>
    </div>

</div>
