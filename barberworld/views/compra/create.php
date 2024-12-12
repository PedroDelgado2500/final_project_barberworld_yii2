<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */

//$this->title = 'Create Compra';
//$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-create">

<h1 class="containerp" style="width: 50%; text-align: center">Adicionar Compras</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
