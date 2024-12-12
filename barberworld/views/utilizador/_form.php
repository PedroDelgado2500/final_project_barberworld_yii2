<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Utilizador $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="utilizador-form">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Utilizador')->textInput() ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Senha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefone')->textInput() ?>

    <?= $form->field($model, 'IsAdmin')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
