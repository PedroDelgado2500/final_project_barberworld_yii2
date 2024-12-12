<?php
use app\models\Reserva;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Search\BarbeariaSearch;
use app\models\Search\ServicoSearch;
use yii\jui\DatePicker;


$this->title = 'Procure sua Barbearia';
$model = new Reserva();
?>

<div class="containerbody">
    <h1 class="containerp" style="text-align: center;"><?= Html::encode($this->title) ?></h1><br>
    
    <?php
    $searchModel = new BarbeariaSearch();
    $dataProvider = null;
    $serviceDataProvider = null;

    if (Yii::$app->request->post()) {
        $searchModel->load(Yii::$app->request->post());
        $dataProvider = $searchModel->search(Yii::$app->request->post());
    }

    if (Yii::$app->request->get('barbearia_id')) {
        $servicoSearchModel = new ServicoSearch();
        $serviceDataProvider = $servicoSearchModel->search(['ServicoSearch' => ['Barbearia_ID' => Yii::$app->request->get('barbearia_id')]]);
    }
    ?>

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="row containerp">
        <div class="col-md-4">
            <?= $form->field($searchModel, 'Pais')->textInput(['maxlength' => true]) ?> <br>
            <?= $form->field($searchModel, 'Nome_Barbearia')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'Cidade')->textInput(['maxlength' => true]) ?> <br>
            <?= $form->field($searchModel, 'Endereco')->textInput(['maxlength' => true]) ?>
        </div>
    </div><br>
    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary button3']) ?>
        </div>
    </div>
    <br>
    <?php ActiveForm::end(); ?>
<br>
    <?php if ($dataProvider !== null) : ?>
        <!-- Mostrar resultados da pesquisa -->
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'Pais',
                'Nome_Barbearia',
                'Cidade',
                'Endereco',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view-services}',
                    'buttons' => [
                        'view-services' => function ($url, $model, $key) {
                            return Html::a('Ver Serviços', Url::to(['site/procbarb', 'barbearia_id' => $model->ID_Barbearia]), ['class' => 'btn btn-primary']);
                        },                        
                    ],
                ],
            ],
        ]); ?>
    <?php endif; ?>

    <?php if ($serviceDataProvider !== null) : ?>
        <h2 class="containerp" style="text-align: center">Serviços da Barbearia</h2>
        <?= GridView::widget([
            'dataProvider' => $serviceDataProvider,
            'columns' => [
                'Nome_Servico',
                'Disponibilidade:boolean',
                'Preco',
                'Duracao_Estimada',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{reserve}',
                    'buttons' => [
                        'reserve' => function ($url, $model, $key) {
                            return Html::a('Reservar', '#', [
                                'class' => 'btn btn-primary reserve-button',
                                'data-servico-id' => $model->ID_Servico,
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php endif; ?>

    <div id="reservation-form-container" style="display:none;">
        <h2 class="containerp" style="text-align: center">Marcar Reserva</h2>
        <?php $reservationForm = ActiveForm::begin([
            'id' => 'reservation-form',
            'action' => Url::to(['reserva/create']),
            'options' => ['data-pjax' => ''],
        ]); ?>

<?= $reservationForm->field($model, 'Data_Hora_Reserva')->widget(DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd HH:mm:ss',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
                'timeFormat' => 'HH:mm:ss',
            ],
        ]) ?><br>
        <?= $reservationForm->field($model, 'Utilizador_ID')->textInput() ?><br>
        <?= $reservationForm->field($model, 'Codigo_Confirmacao')->textInput(['maxlength' => true]) ?><br>
        <?= $reservationForm->field($model, 'Observacoes')->textInput(['maxlength' => true]) ?><br>
        <?= $reservationForm->field($model, 'Servico_ID')->hiddenInput()->label(false) ?>
        <br>
        <div class="form-group">
            <?= Html::submitButton('Realizar Marcação!', ['class' => 'btn btn-success button4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$script = <<< JS
$('.reserve-button').on('click', function(e) {
    e.preventDefault();
    var servicoId = $(this).data('servico-id');
    $('#reservation-form-container').show();
    $('#reservation-form input[name="Reserva[Servico_ID]"]').val(servicoId);
});

$('#reservation-form').on('beforeSubmit', function(e) {
    var form = $(this);
    $.post(form.attr('action'), form.serialize())
        .done(function(response) {
            if(response.success) {
                // Redirecionar para a página index
                window.location.href = response.redirectUrl;
                // Mostrar pop-up
                alert('Você acabou de fazer uma reserva!');
            } else {
                alert('Erro!');
            }
        })
        .fail(function() {
            console.log('Falha ao enviar o formulário.');
        });
    return false; // impedir o envio padrão do formulário
});
JS;
$this->registerJs($script);
?>

<?php
// Configurar flash messages
if (Yii::$app->session->hasFlash('success')) {
    $script = <<< JS
    alert('Reserva realizada com sucesso! Por favor, avalie o serviço com 5 estrelas!');
    JS;
    $this->registerJs($script);
}
?>