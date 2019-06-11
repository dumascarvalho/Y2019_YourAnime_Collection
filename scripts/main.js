function retornarPagina() {
    history.go(-1);
}

function validarAdministrador(select) {
    if (select.selectedIndex == 1) {
        var senha = prompt("Necessário informar a senha mestre da aplicação: ");
        if (senha != "092508") {
            alert("Senha mestre inválida, favor tentar novamente.\nNão foi possível definir o nível de acesso como Administrador.")
            select.selectedIndex = 0;
        } else {
            alert("Senha mestre autenticada com sucesso!\nO nível de acesso Administrador foi habilitado.")
            select.selectedIndex = 1;
        }
    }
}