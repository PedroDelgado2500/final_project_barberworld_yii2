<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */

$this->title = $model->ID_Reserva;
//$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reserva-view">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Reserva' => $model->ID_Reserva], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Reserva' => $model->ID_Reserva], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Certeza que deseja remover essa reserva?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Reserva',
            'Data_Hora_Reserva',
            'Utilizador_ID',
            'Codigo_Confirmacao',
            'Observacoes',
            'Servico_ID',
        ],
    ]) ?>

</div>
