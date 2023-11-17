
<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>


<link rel="stylesheet" href="../../web/css/style.css">


<div class="container">
    <div class="site-index">
        <div class="left_index">
            <div class="top_left_index">
                <h1>Воплотим все ваши идеи в жизнь</h1>
                <p class="grey">Что бы реализовать свои идеи в полном масштабе, вам нужно просто зарегистрироваться</p>
            </div>
            <div class="bottom_left_index">
                <a href="<?= Url::to(['/site/signup'])  ?>"><button>Регистрация</button></a>
                <a href="<?= Url::to(['/site/login'])?>"><button class="border_btn">Вход</button></a>
            </div>
        </div>
        <div class="right_index">
            <img src="<?= Url::to(['/img/pic_index.png'])  ?>" alt="">
        </div> 
    </div>

    <div class="iti">
        <h3>Implement the idea</h3>
        <h4>Цель нашего сайта помочь фотографам воплотить их идеи в жизнь. А так же моделям преобрести услуги за более низкую стоимость  </h4>
    </div>    
</div>

