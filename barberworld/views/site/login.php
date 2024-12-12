<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="site-login" style ="align-items: center; justify-content:center; align-self: center;  text-align: center;">
    <div class="row">
        <div>
        
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>
            <h1 style="text-align: center">Login</h1>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div style ="align-items: center; justify-content:center; align-self: center; flex-direction: row; text-align: center">
                    <?= Html::submitButton('Login', ['class' => 'btn button5', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div style="text-align: center"><a href="<?= Yii::$app->urlManager->createUrl(['site/register']) ?>"><br><button class="btn btn-outline-success button2" style="width: 20%;">Registar</button></a></div><br><br>
            <!--<div style="color:black; background-color: white">
                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                To modify the username/password, please check out the code <code>app\models\User::$users</code>.
            </div>-->

        </div>
    </div>
</div>
