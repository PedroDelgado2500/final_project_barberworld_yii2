<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;


$this->title = 'Registar Utilizador';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os dados de registo:</p>

    <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

    <?= $form->field($model, 'Nome')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Senha')->passwordInput() ?>

    <?= $form->field($model, 'Telefone')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'IsAdmin')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
