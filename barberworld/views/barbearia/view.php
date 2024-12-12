<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Barbearia $model */

//$this->title = $model->ID_Barbearia;
//$this->params['breadcrumbs'][] = ['label' => 'Barbearias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barbearia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'ID_Barbearia' => $model->ID_Barbearia], ['class' => 'btn btn-primary button3']) ?>
        <?= Html::a('Remover', ['delete', 'ID_Barbearia' => $model->ID_Barbearia], [
            'class' => 'btn btn-danger button2',
            'data' => [
                'confirm' => 'Certeza que quer remover essa barbearia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Barbearia',
            'Nome_Barbearia',
            'Pais',
            'Cidade',
            'Endereco',
            'Descricao',
            'Horario_Funcionamento',
        ],
    ]) ?>

</div>
