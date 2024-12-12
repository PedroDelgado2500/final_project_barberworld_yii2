<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Compra')->textInput() ?>

    <?= $form->field($model, 'Data_Hora_Compra')->textInput() ?>

    <?= $form->field($model, 'Quantidade')->textInput() ?>

    <?= $form->field($model, 'Valor_Total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Utilizador_ID')->textInput() ?>
    <br>
    <div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
