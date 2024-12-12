<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Search\EstoqueSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estoque-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_Estoque') ?>

    <?= $form->field($model, 'Quantidade_Estoque') ?>

    <?= $form->field($model, 'Nome_Estoque') ?>

    <div class="form-group">
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
