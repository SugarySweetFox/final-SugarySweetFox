<?php

use app\models\Activities;
use app\models\City;
use app\models\Gender;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration">
    <h3>Регистрация</h3>
    <div class="div_input">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true,'class' => '']) ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput(['class' => '']) ?>
        <?= $form->field($model, 'birthday')->textInput(['class' => '']) ?>
        <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), "id", "city"),['class' => '']) ?>
        <?= $form->field($model, 'activities_id')->dropDownList(ArrayHelper::map(Activities::find()->all(), "id", "name"),['class' => '']) ?>
        <?= $form->field($model, 'gender')->dropDownList([true => "Мальчик", false => "Девочка"],['class' => '']) ?>
        <?= $form->field($model, 'password_hash')->passwordInput(['class' => '']) ?>
        <div class="div_btn">
            <?= Html::submitButton('Зарегистрироваться', ['class' => '', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>