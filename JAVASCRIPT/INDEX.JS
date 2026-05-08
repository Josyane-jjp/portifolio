const form= document.getElementById=('cadastroInicial');
form.addEventListener('submit', async e=>{
e.preventDefault(); // Impede o envio real

 // Acessando dados
const nome = document.getElementById('fname').value;
const tel = document.getElementById('tel').value;
const nquartos = document.getElementById('nquartos').value;
const cpf = document.getElementById('CPF').value;
const cidade =document.getElementById('cidade').value;
const bairro = document.getElementById('bairro').value;
const tempoloc = document.getElementsByName('PERIODO_LOC').value;
const r = await fetch("/cadastro", {method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({nome,cpf,tel,cidade,bairro,nquartos,tempoloc})});
 const d = await r.json();
 resLogin.innerText = d.mensagem;

});