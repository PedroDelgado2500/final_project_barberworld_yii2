<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Utilizador $model */


//$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizador-create">

<h1 class="containerp" style="width: 50%; text-align: center">Adicionar Utilizadores</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
