<?php

use app\models\Reserva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\ReservaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reservas';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Reserva', ['create'], ['class' => 'btn btn-success button4']) ?>
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

            'ID_Reserva',
            'Data_Hora_Reserva',
            'Utilizador_ID',
            'Codigo_Confirmacao',
            'Observacoes',
            //'Servico_ID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reserva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Reserva' => $model->ID_Reserva]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>