<?php
use yii\helpers\Html;
use app\assets\AppAsset;
AppAsset::register($this);

$this->title = 'Página Inicial';
?>
<!--Erro de formatação de browser corrigido se der erro outra vez tenho que pegar o index, estilo e main de commits antigos-->
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <?= Html::img('@web/images/logoindexbarber.png', ['alt' => 'Logo', 'class' => 'logo', 'style' => 'max-width: 70%; height: 110%;']) ?>
        </div>
    </div>
    <div class="containerbody">
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 100%">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?= Html::img('@web/images/barber3.png', ['alt' => 'Slide 1', 'class' => 'd-block w-100']) ?>
                        </div>
                        <div class="carousel-item">
                            <?= Html::img('@web/images/barber.png', ['alt' => 'Slide 2', 'class' => 'd-block w-100']) ?>
                        </div>
                        <div class="carousel-item">
                            <?= Html::img('@web/images/barber2.png', ['alt' => 'Slide 3', 'class' => 'd-block w-100']) ?>
                        </div>
                        <div class="carousel-item">
                            <?= Html::img('@web/images/barber4.png', ['alt' => 'Slide 4', 'class' => 'd-block w-100']) ?>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="containerp">
                    <p>Conheça o melhor website de barbearias do mundo. Aqui você pode fazer marcações de qualquer barbearia localizada no mundo, é só escolher a barbearia localizada no seu local, ver seus serviços disponíveis e realizar sua marcação.</p>
                </div>
                <div class="containerp">
                    <p>Também vai poder explorar nosso site e nossa loja online, fornecemos os melhores produtos de barbearia disponíveis!</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="videoclass embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" autoplay loop muted style="max-width: 100%;">
                        <source src="videos/videoplayback.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var carousel = new bootstrap.Carousel(document.querySelector('#myCarousel'), {
            interval: 5000, // Tempo de transição entre os slides (em milissegundos)
            wrap: true // Permite que o carousel volte ao primeiro slide após chegar ao último
        });
    });
</script>
