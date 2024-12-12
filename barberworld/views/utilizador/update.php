<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Utilizador $model */

//$this->title = 'Update Utilizador: ' . $model->ID_Utilizador;
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadors', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_Utilizador, 'url' => ['view', 'ID_Utilizador' => $model->ID_Utilizador]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilizador-update">

<h1 class="containerp" style="width: 50%; text-align: center">Editar Utilizador</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
