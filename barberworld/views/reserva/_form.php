<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Remover o campo ID_Reserva do formulário -->
    <!-- <?= $form->field($model, 'ID_Reserva')->textInput() ?> -->

    <?= $form->field($model, 'Data_Hora_Reserva')->textInput() ?>

    <?= $form->field($model, 'Utilizador_ID')->textInput() ?>

    <?= $form->field($model, 'Codigo_Confirmacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observacoes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Servico_ID')->textInput() ?>
    <br>
    <div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
