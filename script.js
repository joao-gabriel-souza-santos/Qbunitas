
const form = document.getElementById("form");

form.addEventListener("submit", (event) => {
    event.preventDefault();


    if(validarNome() && validarEmail() && validaCPF() && validarSenha() && confirmar_senhas()){
        alert("cadastrado com sucesso");
        this.reset();
    }else{
        alert("Alguns campos estão invalidos")
    }
    
})



function validarNome() {
    const nome = document.getElementById('nome').value;
    
    if (nome.trim().length < 3) {
        alert("O nome deve ter pelo menos 3 caracteres."); 
        return false; 
    }
    return true;
}

    
function validarData() {
    const data_nasc = new Date(document.getElementById('data').value);
    let hoje = new Date();

    let idade = hoje.getFullYear() - data_nasc.getFullYear();
    let m= hoje.getMonth() - data_nasc.getMonth();
    if(m<0 || (m === 0 && hoje.getDate()< data_nasc.getDate())){
        idade--;
    }

    if(idade<=18){
        alert("Para se cadastrar é necessario ser maior de idade");
        return false;
    }
    return true;
}

function validarEmail() {
    const email = document.getElementById('email').value.trim();
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}$/;
    if (!regex.test(email)) {
        alert("email invalido");
        return false;
    }
    return true;
}


function validaCPF() {
   const cpf = document.getElementById('cpf').value;
   const regex = /^\d{3}.\d{3}.\d{3}-\d{2}$/;
   if(!regex.test(cpf)){
    alert("insira um cpf válido");
    return false;
   }
   return true;

  }

function validarSenha() {
    const senha = document.getElementById('senha').value;
    // Expressão regular para validar a senha
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
    if (!regex.test(senha)) {
        alert("A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial.");
        return false;
    }

    return true;
}

function confirmar_senhas() {
    const senha = document.getElementById('senha').value;
    const conf_senha = document.getElementById('confirmar_senha').value;
    // Expressão regular para validar a senha
  
    if (senha != conf_senha) {
        alert("As senhas são diferentes");
        return false;
    }
    return true;
}
