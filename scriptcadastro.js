// Função para alternar a visibilidade da senha
function alternarSenha(id, event) {
    const input = document.getElementById(id);
    const tipo = input.type === 'password' ? 'text' : 'password';
    input.type = tipo;
    const botao = event.target;
    botao.textContent = tipo === 'password' ? 'Mostrar' : 'Ocultar';
}

// Função para validar o cadastro
function validarCadastro() {
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar-senha').value;

    if (senha !== confirmarSenha) {
        alert('As senhas não coincidem!');
        return false; // Impede o envio do formulário
    }

    return true; // Permite o envio do formulário
}

