<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Barbearia $model */

$this->title = 'Create Barbearia';
//$this->params['breadcrumbs'][] = ['label' => 'Barbearias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barbearia-create">

<h1 class="containerp" style="width: 50%; text-align: center">Adicionar Barbearias</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
