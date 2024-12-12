<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Criar Reserva';
?>

<div class="reserva-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="reserva-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Data_Hora_Reserva')->textInput() ?>

        <?= $form->field($model, 'Utilizador_ID')->textInput() ?>

        <?= $form->field($model, 'Codigo_Confirmacao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Observacoes')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Servico_ID')->hiddenInput()->label(false) ?>
<br>
        <div class="form-group">
            <?= Html::submitButton('Realizar Marcação', ['class' => 'btn btn-success button4']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
