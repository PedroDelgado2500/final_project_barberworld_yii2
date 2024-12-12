<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Servico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Servico')->textInput() ?>

    <?= $form->field($model, 'Nome_Servico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Duracao_Estimada')->textInput() ?>

    <?= $form->field($model, 'Barbearia_ID')->textInput() ?>
    <br>
    
    <?= $form->field($model, 'Disponibilidade')->checkbox([ 'labelOptions' => ['style' => 'transform: scale(2.0); font-size: 10px; margin-left: 40px']]) ?>


    <br>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
