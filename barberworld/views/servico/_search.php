<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\ServicoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Servico') ?>

    <?= $form->field($model, 'Nome_Servico') ?>

    <?= $form->field($model, 'Disponibilidade') ?>

    <?= $form->field($model, 'Preco') ?>

    <?= $form->field($model, 'Duracao_Estimada') ?>

    <?php // echo $form->field($model, 'Barbearia_ID') ?>

    <div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
