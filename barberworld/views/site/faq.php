<?php

/** @var yii\web\View $this */

$this->title = 'FAQ';
?>
<div class="containerbody">
            <h1 class="containerp">FAQs</h1>
            <p class="containerp">Aqui poderá tirar algumas questões frequentes:</p>
        <div>
            <button class="accordion">Como eu faço para realizar marcações?</button>
            <div class="panel">
             <p>Você precisa de acessar a página "Barbearias" e procurar sua barbearia de acordo com as ferramentas de pesquisa, em seguida selecione sua barbearia e selecione o serviço que deseja fazer e clique no botão "Realizar Marcação". E por fim, preencha o que é pedido e confirme sua marcação!</p>
            </div>
        </div><br>
        <div>
            <button class="accordion">Eu preciso estar registado para realizar marcações?</button>
            <div class="panel">
             <p>Sim é preciso estar registado para realizar marcações!</p>
            </div>
        </div><br>
        <div>
    
            <button class="accordion">Como vou saber se minha marcação foi confirmada?</button>
            <div class="panel">
             <p>Você irá receber a confirmação no endereço de email que inseriu quando faz a marcação!</p>
            </div>
        </div><br><br><br>

        <h1 class="containerp">Ainda tem alguma questão?</h1>
        <p class="containerp">Aceda aos nossos contactos e nós iremos ajudar!</p>

        <div><a href="<?= Yii::$app->urlManager->createUrl(['site/contact']) ?>"><br><button class="btn-outline-success button5" >CONTACTOS</button></a></div>
            
        </div>