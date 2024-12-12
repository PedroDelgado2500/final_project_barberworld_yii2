<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Marcação';
?>
<div class="containerbody">
            <div class="row">
                <div class="col-md-4">
                    <p class="containerp">Inserir Nome do Cliente:</p>
                    <input type="text" id="country" name="pais" class="input2">
                </div>
                <div class="col-md-4">
                    <p class="containerp">Data da Reserva:</p>
                    <input type="text" id="country" name="pais" class="input2">
                </div>
                <div class="col-md-4">
                    <p class="containerp">Telefone:</p>
                    <input type="text" id="country" name="pais" class="input2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="containerp">Inserir Email:</p>
                    <input type="text" id="country" name="pais" class="input2">
                </div>
            </div><br>



            <button type="button" class="btn btn-primary button2" data-bs-toggle="modal"
                data-bs-target="#myModal">Enviar Código!</button>

            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            O Código foi enviado para o endereço de email!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="background-color: rgb(241, 144, 69);">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <p class="containerp">Confirmar Código:</p>
                    <input type="text" id="country" name="pais" class="input2">
                </div>
            </div><br>
            <p class="containerp" style="width: 30%;">Observações:</p>
            <textarea placeholder="Digite seu texto aqui..."></textarea><br><br>
            <div class="row divcenter">
                <!-- Botão alterado para abrir o modal de avaliação -->
                <button type="button" class="btn btn-primary button4" data-bs-toggle="modal"
                    data-bs-target="#myModal2">Realizar Marcação</button>
                    
                <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Pedido Realizado! Irá receber no seu email a confirmação do pedido!
                                <p>Avalie o serviço:</p>
                                <!-- Estrelas para Avaliação -->
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label
                                        class="full" for="star5" title="Excelente"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label
                                        class="full" for="star4" title="Muito Bom"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label
                                        class="full" for="star3" title="Bom"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label
                                        class="full" for="star2" title="Regular"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label
                                        class="full" for="star1" title="Ruim"></label>
                                </fieldset>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-primary" id="btnSubmitRating"
                                style="background-color: rgb(241, 144, 69); border: transparent;">OK</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
