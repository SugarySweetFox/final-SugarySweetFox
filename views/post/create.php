<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Post $model */


$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="../../web/css/style.css">
<div class="post-create">
    


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
