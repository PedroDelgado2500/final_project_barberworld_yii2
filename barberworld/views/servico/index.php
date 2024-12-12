<?php

use app\models\Servico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\ServicoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Servicos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servico-index">

<h1 class="containerp">Adicionar Serviço</h1>

    <p>
        <?= Html::a('Adicionar Serviço', ['create'], ['class' => 'btn btn-success button4']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID_Servico',
        'Nome_Servico',
        [
            'attribute' => 'Disponibilidade',
            'value' => function ($model) {
                return $model->Disponibilidade == 1 ? 'Sim' : 'Não';
            },
        ],
        'Preco',
        'Duracao_Estimada',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Servico $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ID_Servico' => $model->ID_Servico]);
            }
        ],
    ],
]); ?>

    <?php Pjax::end(); ?>

</div>
