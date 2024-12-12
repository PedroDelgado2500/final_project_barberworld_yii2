<?php

use app\models\Utilizador;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\UtilizadorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Utilizadores';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizador-index">

    <h1 class="containerp" style="width: 30%; text-align: center">Utilizadores</h1>

    <p>
        <?= Html::a('Adicionar Utilizador', ['create'], ['class' => 'btn btn-success button4']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_Utilizador',
            'Nome',
            'Email:email',
            'Senha',
            'Telefone',
            //'IsAdmin:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Utilizador $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_Utilizador' => $model->ID_Utilizador]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
