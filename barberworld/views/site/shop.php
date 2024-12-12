<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Produto;
use app\models\Search\ProdutoSearch;

$this->title = 'Barber Shop';

$searchModel = new ProdutoSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

$homeUrl = Yii::$app->homeUrl; // Obtenha a URL da página inicial
?>

<div class="containerbody">
    <h1 class="containerp" style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <div class="search-bar">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'options' => ['class' => 'form-inline', 'id' => 'search-form', 'style' => 'background-color: transparent; border: none;'],
    ]); ?>
    <div class="input-group">
        <?= $form->field($searchModel, 'Nome_Produto')->textInput([
            'placeholder' => 'Pesquisar produtos...',
            'class' => 'form-control',
            'style' => 'background-color: #ffffff; width: 400px; border: none;',
        ])->label(false) ?>
        <?= Html::button('<i class="fas fa-search"></i>', [
            'class' => 'btn btn-primary button3',
            'id' => 'search-button',
            'style' => 'border: none;' 
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

    <div id="product-list">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => "Mostrando {begin} - {end} de {totalCount} itens",
            'columns' => [
                'Nome_Produto',
                'Descricao:ntext',
                [
                    'attribute' => 'Preco',
                    'value' => function ($model) {
                        return number_format($model->Preco, 2, ',', '.') . ' €';
                    },
                ],
                [
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a('Adicionar ao Carrinho', ['add-to-cart', 'id' => $model->ID_Produto], [
                            'class' => 'btn btn-primary add-to-cart button3',
                            'data-id' => $model->ID_Produto,
                            'data-preco' => $model->Preco,
                        ]);
                    },
                ],
            ],
        ]); ?>
    </div>

    <div class="selected-products">
        <h2 class="containerp" style="width: 80%;"><b>Produtos Selecionados:</b></h2>
        <ul id="selected-products-list" class="list-group"></ul>
    </div>
        <br>
    <div id="total-amount" class="total-amount" style="display: none; text-align:center;">
        <h3 style="background-color: white; border-radius:25px; text-align: center; width: 25%">Total: <span id="total-price">0,00 €</span></h3>
    </div><br>

    <div id="payment-form" style="display: none;">
        <h2 class="containerp"><b>Dados de Pagamento:</b></h2>
        <?= Html::beginForm(['compra/process-payment'], 'post', ['class' => 'form-horizontal', 'id' => 'payment-form-inner']) ?>
            <div class="form-group">
                <?= Html::label('Número do Cartão', 'card-number', ['class' => 'control-label']) ?>
                <?= Html::textInput('card-number', '', ['class' => 'form-control', 'id' => 'card-number', 'pattern' => '[0-9]{16}', 'maxlength' => '16', 'placeholder' => 'XXXX XXXX XXXX XXXX']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::label('Data de Validade', 'expiry-date', ['class' => 'control-label']) ?>
                <?= Html::textInput('expiry-date', '', ['class' => 'form-control', 'id' => 'expiry-date', 'pattern' => '(0[1-9]|1[0-2])\/[0-9]{2}', 'maxlength' => '5', 'placeholder' => 'MM/YY']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::label('CVV', 'cvv', ['class' => 'control-label']) ?>
                <?= Html::textInput('cvv', '', ['class' => 'form-control', 'id' => 'cvv', 'pattern' => '[0-9]{3,4}', 'maxlength' => '4', 'placeholder' => 'XXX']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::label('Endereço', 'address', ['class' => 'control-label']) ?>
                <?= Html::textInput('address', '', ['class' => 'form-control', 'id' => 'address']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::label('Cidade', 'city', ['class' => 'control-label']) ?>
                <?= Html::textInput('city', '', ['class' => 'form-control', 'id' => 'city']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::label('País', 'country', ['class' => 'control-label']) ?>
                <?= Html::textInput('country', '', ['class' => 'form-control', 'id' => 'country']) ?>
            </div><br>
            <div class="form-group">
                <?= Html::button('Pagar', ['class' => 'btn btn-primary button3', 'id' => 'payment-button']) ?>
            </div>
        <?= Html::endForm() ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pagamento Realizado!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="close-modal-button">Fechar</button>
                </div>
            </div>
        </div>
    </div>

<?php
$homeUrl = Yii::$app->homeUrl;
$script = <<< JS
$(document).ready(function() {
    function updateTotalPrice() {
        var totalPrice = 0;
        $('#selected-products-list li').each(function() {
            var price = parseFloat($(this).data('price').replace(',', '.'));
            var quantity = parseInt($(this).find('.product-quantity').text());
            totalPrice += price * quantity;
        });
        $('#total-price').text(totalPrice.toFixed(2).replace('.', ',') + ' €');
        $('#total-amount').show();
    }

    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        var productName = $(this).closest('tr').find('td:first').text();
        var productPrice = parseFloat($(this).data('preco')).toFixed(2).replace('.', ',');
        var listItem = $('#selected-products-list').find('[data-product-id="' + productId + '"]');
        if (listItem.length > 0) {
            var quantity = parseInt(listItem.find('.product-quantity').text()) + 1;
            listItem.find('.product-quantity').text(quantity);
        } else {
            $('#selected-products-list').append('<li data-product-id="' + productId + '" data-price="' + productPrice + '" class="list-group-item d-flex justify-content-between align-items-center">' + productName + ' (Preço: ' + productPrice + ' €): <span class="product-quantity badge badge-primary badge-pill text-black">1</span><button class="btn btn-danger btn-sm remove-from-cart button2">Eliminar</button></li>');
        }
        updateTotalPrice();
        $('#payment-form').show();
    });

    $(document).on('click', '.remove-from-cart', function() {
        $(this).closest('li').remove();
        updateTotalPrice();
        if ($('#selected-products-list li').length == 0) {
            $('#payment-form').hide();
            $('#total-amount').hide();
        }
    });

    $('#payment-button').click(function() {
        // Verificar se os campos de dados de pagamento estão preenchidos
        var cardNumber = $('#card-number').val();
        var expiryDate = $('#expiry-date').val();
        var cvv = $('#cvv').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var country = $('#country').val();
        
        // Validar formatos dos campos (opcional)
        var cardNumberValid = /^[0-9]{16}$/.test(cardNumber);
        var expiryDateValid = /^(0[1-9]|1[0-2])\/[0-9]{2}$/.test(expiryDate);
        var cvvValid = /^[0-9]{3,4}$/.test(cvv);

        if (cardNumberValid && expiryDateValid && cvvValid && address && city && country) {
            // Mostrar o modal de pagamento realizado
            $('#payment-modal').modal('show');
        } else {
            alert('Por favor, preencha todos os campos de dados de pagamento corretamente.');
        }
    });

    $('#close-modal-button').click(function() {
        // Fechar o modal ao clicar no botão "Fechar"
        $('#payment-modal').modal('hide');
    });

    $('#search-button').click(function(e) {
        e.preventDefault();
        var query = $('#produtosearch-nome_produto').val();
        $.ajax({
            url: $('#search-form').attr('action'),
            type: 'get',
            data: { 'ProdutoSearch[Nome_Produto]': query },
            success: function(data) {
                var productListHtml = $(data).find('#product-list').html();
                if (productListHtml.trim() === '') {
                    productListHtml = '<p>Nenhum resultado encontrado.</p>';
                }
                $('#product-list').html(productListHtml);
            }
        });
    });
});
JS;
$this->registerJs($script);
?>