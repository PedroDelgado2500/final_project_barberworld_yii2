<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */

$this->title = 'Atualizar Produto: ' . $model->ID_Produto;
//$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Produto, 'url' => ['view', 'ID_Produto' => $model->ID_Produto]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-update">

    <h1 class="containerp"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
