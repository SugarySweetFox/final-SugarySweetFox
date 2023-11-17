<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
use app\models\Activities;
use app\models\City;
use app\models\Type;
use app\models\Gender;
use yii\helpers\ArrayHelper;
?>

<link rel="stylesheet" href="../../web/css/style.css">
<div class="user-form">

<div class="container">

<div class="registration">

    <div class="div_input">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus' => true,'class' => '']) ?>
 
    <?= $form->field($model, 'email')->textInput(['class' => '']) ?>
    <?= $form->field($model, 'birthday')->textInput(['class' => '']) ?>
    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), "id", "city"),['class' => '']) ?>
    <?= $form->field($model, 'activities_id')->dropDownList(ArrayHelper::map(Activities::find()->all(), "id", "name"),['class' => '']) ?>
    <?= $form->field($model, 'gender')->dropDownList([true => "Мальчик", false => "Девочка"],['class' => '']) ?>




    <div class="div_btn">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    

    <?php ActiveForm::end(); ?>
    </div>
    </div>
    </div>
</div>
