<?php

use app\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\ProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Produto', ['create'], ['class' => 'btn btn-success button4']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summaryOptions' => ['class' => 'summary', 'style' => 'background-color: white;'],
        'summary' => Yii::t('app', 'Mostrando {begin} - {end} de {totalCount} itens'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_Produto',
            'Nome_Produto',
            'Descricao:ntext',
            [
                'attribute' => 'Preco',
                'value' => function ($model) {
                    return number_format($model->Preco, 2, ',', '.') . ' €';
                },
            ],
            'Compra_ID',
            //'Estoque_ID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Produto' => $model->ID_Produto]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>