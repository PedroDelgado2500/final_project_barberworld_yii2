<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */

$this->title = 'Atualizar Estoque: ' . $model->ID_Estoque;
//$this->params['breadcrumbs'][] = ['label' => 'Estoques', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Estoque, 'url' => ['view', 'ID_Estoque' => $model->ID_Estoque]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estoque-update">

<h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
