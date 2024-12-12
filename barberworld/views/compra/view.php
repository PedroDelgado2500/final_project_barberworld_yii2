<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */

$this->title = $model->ID_Compra;
//$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compra-view">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Compra' => $model->ID_Compra], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Compra' => $model->ID_Compra], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Certeza que quer remover essa compra?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Compra',
            'Data_Hora_Compra',
            'Quantidade',
            'Valor_Total',
            'Utilizador_ID',
        ],
    ]) ?>

</div>
