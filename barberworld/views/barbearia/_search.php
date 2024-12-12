<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\BarbeariaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="barbearia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Barbearia') ?>

    <?= $form->field($model, 'Nome_Barbearia') ?>

    <?= $form->field($model, 'Pais') ?>

    <?= $form->field($model, 'Cidade') ?>

    <?= $form->field($model, 'Endereco') ?>

    <?php // echo $form->field($model, 'Descricao') ?>

    <?php // echo $form->field($model, 'Horario_Funcionamento') ?>

    <div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
