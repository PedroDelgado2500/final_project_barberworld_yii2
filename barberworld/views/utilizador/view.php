<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Utilizador $model */

//$this->title = $model->ID_Utilizador;
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadors', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utilizador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Utilizador' => $model->ID_Utilizador], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Utilizador' => $model->ID_Utilizador], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Tem certeza que quer eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Utilizador',
            'Nome',
            'Email:email',
            'Senha',
            'Telefone',
            'IsAdmin:boolean',
        ],
    ]) ?>

</div>
