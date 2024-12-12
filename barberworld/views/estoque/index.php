<?php

use app\models\Estoque;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\EstoqueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estoques';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-index">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Estoque', ['create'], ['class' => 'btn btn-success button4']) ?>
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

            'ID_Estoque',
            'Quantidade_Estoque',
            'Nome_Estoque',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Estoque $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Estoque' => $model->ID_Estoque]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
