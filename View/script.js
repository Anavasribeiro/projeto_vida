// Alterar do login pro cadastro

function showForm(FormId) {
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
    document.getElementById(FormId).classList.add("active");
}

// criamos a função para pegar o id do form, quando achado, usamos o query para selecionar todos os form-box e o foreach para remover de cada form-box o active
//    depois, pegando os elementos com o formid nos ativamos e adicionamos o active lá, apenas o form com o mesmo id será ativado 


const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");

//quando o usuario clicar nav tera a classe active e se clicar novamente se removera - metodo toggle

hamburger.addEventListener("click",() => nav.classList.toggle("active"));
// header
