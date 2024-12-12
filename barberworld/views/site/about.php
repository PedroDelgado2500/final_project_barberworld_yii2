<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Quem Somos';
?>
<div class="site-about">
    <div class="containerbody">
            <table>
                <tr>
                    <td>
                        <h1 class="containerp">Quem Somos?</h1>
                        <p class="containerp">No Barber World, estamos comprometidos em oferecer uma experiência de cuidado pessoal excepcional que vai muito além de um simples corte de cabelo. Somos mais do que uma rede de barbearias; somos um santuário para o homem moderno que valoriza não apenas a aparência, mas também o seu bem-estar e confiança.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="containerp">Porque Escolher o Barber World?</h1>
                        <p class="containerp">Variedade de Serviços Online: Oferecemos uma ampla gama de serviços online, desde dicas de estilo e tutoriais de barbear até produtos de beleza masculina, todos ao alcance de um clique.</p>
                        <p class="containerp">Dicas e Orientações Personalizadas: Estamos aqui para ajudá-lo a alcançar o visual desejado. Entre em contato conosco para obter orientações personalizadas e dicas sobre cuidados pessoais.</p>
                        <p class="containerp">Produtos: Apresentamos em nossa loja uma variedade de produtos de cuidados masculinos para você manter sua aparência impecável em casa.</p>
                    </td>
                </tr>
            </table><br>
            <table style="border: transparent;">
                <tr>
                        <h1 class="linha containerp">Nossa Equipe</h1>
                </tr>
                <tr style="border: transparent;">
                    <td class="linha containerp">
                    <?= Html::img('@web/images/anonimo.png', ['alt' => 'Equipe 1', 'class' => 'imageteam']) ?><br>
                        <h5>Pedro Delgado</h5><p>Administrador</p><p>Criador da empresa Barber World e desenvolvedor do website</p>
                    </td>
                    <td class="linha containerp">
                    <?= Html::img('@web/images/anonimo.png', ['alt' => 'Equipe 2', 'class' => 'imageteam']) ?><br>
                        <h5>João Silva</h5><p>Web Developer</p><p>Desenvolvedor Web da empresa</p>
                    </td>
                    <td class="linha containerp">
                    <?= Html::img('@web/images/anonimo.png', ['alt' => 'Equipe 3', 'class' => 'imageteam']) ?><br>
                        <h5>Jorge Dias</h5><p>Web Developer</p><p>Desenvolvedor Web da empresa</p>
                    </td>
                </tr>
            </table><br>
            <table class="table2">
                <tr>
                    <td>
                    <h1>Parcerias</h1>
                    <p>Conheça as outras marcas que patrocinamos!</p>
                    </td>
                    <td>
                        <th>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        </th>
                        <th>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        <?= Html::img('@web/images/marca.png', ['alt' => 'patrocinio', 'class' => 'marca']) ?>
                        </th>
                    </td>
                </tr>
            </table>
        </div>
</div>