<?php

use app\models\Compra;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\CompraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Compras';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Compra', ['create'], ['class' => 'btn btn-success button4']) ?>
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

            'ID_Compra',
            'Data_Hora_Compra',
            'Quantidade',
            'Valor_Total',
            'Utilizador_ID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Compra $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Compra' => $model->ID_Compra]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
