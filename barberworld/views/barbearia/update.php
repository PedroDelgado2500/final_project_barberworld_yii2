<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Barbearia $model */

$this->title = 'Editar Barbearia: ' . $model->ID_Barbearia;
//$this->params['breadcrumbs'][] = ['label' => 'Barbearias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Barbearia, 'url' => ['view', 'ID_Barbearia' => $model->ID_Barbearia]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barbearia-update">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
