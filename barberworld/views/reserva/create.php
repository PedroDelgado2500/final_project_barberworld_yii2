<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */

$this->title = 'Adicionar Reserva';
//$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-create">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
