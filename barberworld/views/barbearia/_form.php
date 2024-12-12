<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Barbearia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="barbearia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Barbearia')->textInput() ?>

    <?= $form->field($model, 'Nome_Barbearia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Horario_Funcionamento')->textInput(['maxlength' => true]) ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
