<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\ReservaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Reserva') ?>

    <?= $form->field($model, 'Data_Hora_Reserva') ?>

    <?= $form->field($model, 'Utilizador_ID') ?>

    <?= $form->field($model, 'Codigo_Confirmacao') ?>

    <?= $form->field($model, 'Observacoes') ?>

    <?php // echo $form->field($model, 'Servico_ID') ?>

    <div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
