<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1 class="containerp">Erro 404 - A página não foi encontrada!</h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <div class="containerp">
    <p>
        Erro ocorrido no servidor web.
    </p>
    <p>
    Por favor aceda a nossa página dos contactos para nos contactar se achar que foi erro de servidor. Obrigado.
    </p>
    </div>

</div>
