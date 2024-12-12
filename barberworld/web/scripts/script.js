document.addEventListener("DOMContentLoaded", function () {
    const logo = document.querySelector('.logo');
    logo.classList.add('visible');
});
//script para animação do Título da página

//script para slideshow da página inicial
var counter = 1;
setInterval(function(){
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if(counter > 4){
    counter = 1;
  }
}, 5000);


//Accordion da página FAQ
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

 // Função para fazer o login
 /*function fazerLogin() {
  // Obter os valores do email e senha dos campos de entrada
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Enviar uma requisição POST para o servidor Node.js
  fetch('/login', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email: email, password: password })
  })
  .then(response => {
      if (!response.ok) {
          throw new Error('Erro ao fazer login');
      }
      return response.json();
  })
  .then(data => {
      // Se o login for bem-sucedido, armazene o token JWT e redirecione para outra página
      localStorage.setItem('token', data.token);
      window.location.href = '/outra_pagina.html'; // Substitua '/outra_pagina.html' pela página para onde você deseja redirecionar após o login
  })
  .catch(error => {
      console.error('Erro:', error);
      // Tratar o erro aqui (por exemplo, exibindo uma mensagem de erro para o usuário)
  });
}*/

// Adicionar um evento de clique ao botão de login para chamar a função fazerLogin()
//document.getElementById('login-button').addEventListener('click', fazerLogin);
