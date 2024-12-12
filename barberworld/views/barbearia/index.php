<?php

use app\models\Barbearia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\BarbeariaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Barbearias';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barbearia-index">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Barbearia', ['create'], ['class' => 'btn btn-success button4']) ?>
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

            'ID_Barbearia',
            'Nome_Barbearia',
            'Pais',
            'Cidade',
            'Endereco',
            //'Descricao',
            //'Horario_Funcionamento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Barbearia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Barbearia' => $model->ID_Barbearia]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>