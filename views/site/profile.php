<?
use yii\helpers\Url;
use yii\helpers\Html;
?>

<link rel="stylesheet" href="../../web/css/style.css">


<div class="container">
        <div class="profile">
            <div class="profile_top">
                <div class="div_first_btn">
                    <p class="center">Профиль</p>
                </div>
                <a href="<?= Url::to(['/site/you_post'])?>"><button class="post_btn">Ваши объявления</button></a>
            </div>
            <div class="profile_div">
                <div class="top_post">
                    <div class="photo">
                        <div class="div_okr"></div>

                        <?= Html::img($user->photo, ["class"=> "img_photo"]) ?>
                     
                        <div class="div_border"></div>
                    </div>
                    <div class="content">
                        <h2 class="left"><?=$user->name?></h2>
                        <div class="contrnt_text">
                            <div class="text_post">
                                <h5>Город:</h5>
                                <h4><?=$user->city->city?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Дата рождения:</h5>
                                <h4><?=$user->birthday?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Я:</h5>
                                <h4><?=$user->activities->name?></h4>
                            </div>
                            <div class="text_post">
                                <h5>Пол:</h5>
                                <h4>
                                <?php if ($user->gender==0) { ?>
                                    <h4>Женский</h4>
                                <?php }else { ?>
                                    <h4>Мужской</h4>
                                <?php } ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom_post">
                <a href="<?= Url::to(['/user/update?id='.$user->id])?>"><button>Редактировать</button></a>
                </div>
            </div>
        </div> 
        
    </div>