<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Servico $model */

$this->title = $model->ID_Servico;
//$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servico-view">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Servico' => $model->ID_Servico], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Servico' => $model->ID_Servico], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Certeza que deseja eliminar esse serviço?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'ID_Servico',
        'Nome_Servico',
        [
            'attribute' => 'Disponibilidade',
            'value' => $model->Disponibilidade == 1 ? 'Sim' : 'Não',
        ],
        'Preco',
        'Duracao_Estimada',
        'Barbearia_ID',
    ],
]) ?>
</div>
