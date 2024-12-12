<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */

$this->title = 'Update Compra: ' . $model->ID_Compra;
//$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Compra, 'url' => ['view', 'ID_Compra' => $model->ID_Compra]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compra-update">

<h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
