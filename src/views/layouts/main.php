<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\web\UrlManager;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title;

switch (Yii::$app->settings->get('registerPrototypeAsset', 'app.assets')) {
    case true:
        \dmstr\modules\prototype\assets\DbAsset::register($this);
        break;
    case null:
        Yii::$app->settings->set('registerPrototypeAsset', true, 'app.assets');
        Yii::$app->settings->deactivate('registerPrototypeAsset', 'app.assets');
    case false:
        AppAsset::register($this);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="theme-color" content="#e1802b">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= \dmstr\modules\prototype\widgets\HtmlWidget::widget(['key' => 'head']) ?>
    <?php $this->head() ?>
</head>
<body class="<?php echo (\Yii::$app->controller->id == 'site' ? 'home' : \Yii::$app->controller->id); ?>">
<?php $this->beginBody() ?>
    <?php // $this->render('_navbar') ?>
    <!-- <div class="alert-wrapper"><?php // Alert::widget() ?></div> -->

<div id="go_top"></div>
    <div id="page">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo \Yii::$app->homeUrl; ?>" class="logo"><img src="/logo.svg"></a>
                    </div>
                    <div class="col-md-8">
                        <ul class="menu">
                            <li>
                                <a class="active" href="<?php echo \Yii::$app->homeUrl; ?>">Головна</a>
                            </li>
                            <li>
                                <a href="#">Блог</a>
                            </li>
                            <li>
                                <a href="#">Книги</a>
                            </li>
                            <li>
                                <a href="#">Про нас</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    <?= $content ?>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Меню</h4>
                    <ul class="menu">
                        <li>
                            <a class="active" href="#">Головна</a>
                        </li>
                        <li>
                            <a href="#">Блог</a>
                        </li>
                        <li>
                            <a href="#">Книги</a>
                        </li>
                        <li>
                            <a href="#">Про нас</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Контакти</h4>
                    <div>
                        <p>Бла-бла...</p>
                        <p>Бла-бла... і ще бла-бла</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Наше місцезнаходження</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1118.6365886391118!2d23.292128294202794!3d48.17615271263557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1482236651303" width="280" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- <footer class="footer">
    <?= \dmstr\modules\prototype\widgets\HtmlWidget::widget(['key' => 'footer']) ?>
    <div class="container">
        <p class="pull-right">
            <span class="label label-default"><?= YII_ENV ?></span>
        </p>
        <p class="pull-left">
            <?php /*echo Html::a(
                Html::img('http://t.phundament.com/p4-16-bw.png', ['alt' => 'Icon Phundament 4']),
                '#',
                ['data-toggle' => 'modal', 'data-target' => '#infoModal']
            )*/ ?>
        </p>
    </div>
</footer> -->

<!-- Info Modal -->
<!-- <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <?php // $this->render('_modal') ?>
</div> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
