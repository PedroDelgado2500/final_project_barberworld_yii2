<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */

$this->title = $model->ID_Estoque;
//$this->params['breadcrumbs'][] = ['label' => 'Estoques', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estoque-view">

<h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Estoque' => $model->ID_Estoque], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Estoque' => $model->ID_Estoque], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Certeza que quer remover esse estoque?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Estoque',
            'Quantidade_Estoque',
            'Nome_Estoque',
        ],
    ]) ?>

</div>
