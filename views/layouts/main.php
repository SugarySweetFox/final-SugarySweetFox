<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\Nav;
use yii\widgets\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="../../web/css/style.css">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <div class="container">
        <div class="header">
            <img src="<?= Url::to(['/img/logo.svg'])  ?>" alt="" class="logo">
            <div class="menu">
                <a href="<?= Url::to(['/site/index'])  ?>">Главная</a>
                <a href="<?= Url::to(['/site/page_models'])  ?>">Модели</a>
                <a href="<?= Url::to(['/site/page_photograf'])  ?>">Фотографы</a>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <a href="<?= Url::to(['/site/login'])  ?>">Вход</a>
                    <a href="<?= Url::to(['/site/signup'])  ?>">Регистрация</a>
                <?php }else { ?>
                    <a href="<?= Url::to(['/site/profile'])  ?>">Профиль</a>
                    <?= Html::a('Выход', ['site/logout'], ['data' => ['method' => 'post']]) ?>
                <?php } ?>
            </div>
        </div>  
    </div>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container-fluid">
        <!-- <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?> -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer>
    <div class="container">
        <div class="footer">
            <div class="menu_footer">
                <a href="" class="white">Главная</a>
                <a href="" class="white">Модели</a>
                <a href="" class="white">Фотографы</a>
                <a href="" class="white">Избранное</a>
                <a href="" class="white">Профиль</a>
                <a href="" class="white">Поддержка</a>
            </div>
            <div class="left_footer">
                <p class="white">implement.the.idea@gmail.com</p>
                <img src="<?= Url::to(['/img/vk.svg'])  ?>" alt="" class="vk">
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
