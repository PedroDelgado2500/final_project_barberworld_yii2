<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\CompraSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Compra') ?>

    <?= $form->field($model, 'Data_Hora_Compra') ?>

    <?= $form->field($model, 'Quantidade') ?>

    <?= $form->field($model, 'Valor_Total') ?>

    <?= $form->field($model, 'Utilizador_ID') ?>

    <div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
