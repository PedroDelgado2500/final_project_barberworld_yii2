<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Produto')->textInput() ?>

    <?= $form->field($model, 'Nome_Produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Compra_ID')->textInput() ?>

    <?= $form->field($model, 'Estoque_ID')->textInput() ?>
    <br>
    <div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success button4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
