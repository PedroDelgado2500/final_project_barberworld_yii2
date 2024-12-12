<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estoque-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Estoque')->textInput() ?>

    <?= $form->field($model, 'Quantidade_Estoque')->textInput() ?>

    <?= $form->field($model, 'Nome_Estoque')->textInput(['maxlength' => true]) ?>
    <br>
    <div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
