<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Servico $model */

$this->title = 'Atualizar Servico: ' . $model->ID_Servico;
//$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Servico, 'url' => ['view', 'ID_Servico' => $model->ID_Servico]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servico-update">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
