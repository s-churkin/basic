<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            /*!!!*/
                ['label' => 'Приложения', 'items' => [
                    ['label' => 'Дерево объектов', 'url' => ['/ff_content/index']],
                    ['label' => 'Банкроты', 'url' => ['/']],
                    ['label' => 'Курсы валют', 'url' => ['/']],
            ]],
            ['label' => 'Тесты', 'items' => [
                        ['label' => 'Hello!', 'url' => ['/site/say-hello', 'message' => 'Привет мир!']],
                        ['label' => 'Форма', 'url' => ['/site/entry']],
                        ['label' => 'Пролистывание стран', 'url' => ['/country1/index']],
                        ['label' => 'Страны CRUD', 'url' => ['/country/index']],
                        ['label' => 'IP адрес', 'url' => ['/site/ip']],
                ]],
                ['label' => 'Закладки', 'items' => [
                    ['label' => 'Gii', 'url' => ['/gii']], 
                    ['label' => 'GitHub', 'url' => ['/site/git']], 
                    ['label' => 'MySQL', 'url' => ['/site/redirect_mysql']],
                    ['label' => 'Полное руководство по Yii 2.0', 'url' => ['/site/docyii2']],
                    ['label' => 'Документация PHP', 'url' => ['/site/docphp']],
                    ['label' => 'Создание схемы БД', 'url' => ['/site/dbdesigner']],
                    ['label' => 'Руководство по Bootstarap', 'url' => ['/site/bootstarap']],
                    ['label' => 'Сайт о путешествиях', 'url' => ['/site/www']],
            ]],
            /**/
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
