<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */

$this->title = 'Atualizar Reserva: ' . $model->ID_Reserva;
//$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Reserva, 'url' => ['view', 'ID_Reserva' => $model->ID_Reserva]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reserva-update">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
