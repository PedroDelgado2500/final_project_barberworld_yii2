<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/barberworld.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="background-image: url('<?= Yii::$app->request->baseUrl ?>/images/background.png');; background-size: cover; background-attachment: fixed;">
<?php $this->beginBody() ?>

<!-- NavBar Padrão do Yii2
<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-white bg-white fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Página Inicial', 'url' => ['/site/index']],
            ['label' => 'Quem Somos', 'url' => ['/site/about']],
            ['label' => 'Barbearias', 'url' => ['/site/about']],
            ['label' => 'FAQ', 'url' => ['/site/faq']],
            ['label' => 'Contactos', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>-->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>

<!-- Minha NavBar-->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top justify-content-center" style="width: 80%; margin-left: auto; margin-right: auto; left: 0; right: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                &nbsp&nbsp&nbsp&nbsp<?= Html::img('@web/images/logobarber.png', ['width' => '100', 'height' => '100', 'class' => 'd-inline-block align-top', 'alt' => 'Logo']) ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav">
            

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->homeUrl ?>">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/about']) ?>">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/procbarb']) ?>">Barbearias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/shop']) ?>">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/faq']) ?>">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/contact']) ?>">Contactos</a>
                    </li>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->can('admin')): ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['user/admin/index']) ?>">Utilizadores</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['produto/index']) ?>">Produtos</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['barbearia/index']) ?>">Barbearias</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['compra/index']) ?>">Compras</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['servico/index']) ?>">Serviços</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['reserva/index']) ?>">Reservas</a></li>
            <li><a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['estoque/index']) ?>">Estoques</a></li>
        </ul>
    </li>
<?php endif; ?>
                </ul>
                <?php if (Yii::$app->user->isGuest): ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/user/login']) ?>" class="btn btn-outline-success login">Login</a>
                <?php else: ?>
                    <?= Html::beginForm(['site/logout'], 'post') ?>
                        <?= Html::submitButton('Logout', ['class' => 'btn btn-outline-danger blogout']) ?>
                    <?= Html::endForm() ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>


<main id="main" class="flex-shrink-0" role="main" style="padding: 120px 0 50px;"><!--padding-top faz com que o main não invada o espaço da navbar e nem no footer-->
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<footer>
<div style="text-align: center;">
            <div class="wrapper">
  
  <a href="#" class="icon twitter">
    <div class="tooltip">Twitter</div>
    <span><i class="fab fa-twitter"></i></span>
  </a>
  <a href="#" class="icon instagram">
    <div class="tooltip">Instagram</div>
    <span><i class="fab fa-instagram"></i></span>
  </a>
  <a href="#" class="icon tiktok">
    <div class="tooltip">TikTok</div>
    <span><i class="fab fa-tiktok"></i></span>
  </a>

</div>
            
            <hr size="3" color="Black" noshade>
            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <p style="text-align: justify;">&copy; Barber World. All Rights Reserved - <?= date('Y') ?></p>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                    <?= Html::img('@web/images/logobarber.png', ['width' => '100', 'height' => '100', 'class' => 'd-inline-block align-top', 'alt' => 'Logo']) ?>
                    
                    </div>
                    <div class="col-md-4" style="text-align: right;">
                        <p style="text-align: right;">Termos de Privacidade | Cookies</p>
                    </div>
                </div>
            </div>
          </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>