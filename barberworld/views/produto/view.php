<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */

$this->title = $model->ID_Produto;
//$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Produto' => $model->ID_Produto], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Produto' => $model->ID_Produto], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Quer mesmo remover o produto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Produto',
            'Nome_Produto',
            'Descricao:ntext',
            'Preco',
            'Compra_ID',
            'Estoque_ID',
        ],
    ]) ?>

</div>
