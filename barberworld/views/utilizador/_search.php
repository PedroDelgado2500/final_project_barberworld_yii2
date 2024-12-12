<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\UtilizadorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="utilizador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Utilizador') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Senha') ?>

    <?= $form->field($model, 'Telefone') ?>

    <?php // echo $form->field($model, 'IsAdmin')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
