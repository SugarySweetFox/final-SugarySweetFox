<?
use yii\helpers\Url;
use yii\helpers\Html;
?>

<link rel="stylesheet" href="../../web/css/style.css">

<div class="page_models">
    <div class="line">
    </div>
    <div class="container">
        <div class="posts">
           <?php 
            foreach ($posts as $item) {
                ?>
            
            <div class="post">
                <div class="top_post">
                    <div class="photo">
                        <div class="div_okr"></div>

                        <?= Html::img($item->photo, ["class"=> "img_photo"]) ?>
                     
                        <div class="div_border"></div>
                    </div>
                    <div class="content">
                        <h2 class="left"><?=$item->user->name?></h2>
                        <div class="contrnt_text">
                            <div class="text_post">
                                <h5>Город:</h5>
                                <h4><?=$item->city->city?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Тип съемки:</h5>
                                <h4><?=$item->type->name?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Ищу:</h5>
                                <h4><?=$item->activities->name?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Кол-во человек:</h5>
                                <h4><?=$item->kol_vo?></h4>
                            </div>
                            <div class="text_post">
                                <h5>О себе:</h5>
                                <h4><?=$item->about_me?></h4>
                            </div>
                        </div>
                    </div>
                    <img src="<?= Url::to(['/img/like.svg'])  ?>" alt="" class="img_like">
                </div>
                <div class="bottom_post">
                    <button class="border_btn">Портфолио</button>
                    <button>Написать</button>
                </div>
            </div>
            <?php
        }
        ?>  
        </div> 

    </div>

</div>