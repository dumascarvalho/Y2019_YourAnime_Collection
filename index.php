<?php

$pagina = "principal.php";
$titulo = "YourAnime Store";

if (isset($_GET["pagina"])) {
    switch ($_GET["pagina"]) {
        case "cadastrar":
            $pagina = "cadastrarUsuario.php";
            $titulo = "Tela de Cadastro";
            break;
        case "autenticar":
            $pagina = "realizarLogin.php";
            $titulo = "Tela de Login";
            break;
        case "escolher":
            $pagina = "escolherProdutos.php";
            $titulo = "Tela de Produtos";
            break;
        case "comprar":
            $pagina = "realizarCompra.php";
            $titulo = "Tela de Compra";
            break;
        default:
            $pagina = "principal.php";
            $titulo = "YourAnime Store";
    }
}

include("./includes/header.php");

echo "<section>";

session_start();

if (isset($_SESSION['usuario'])) {
    include("./includes/sidebar.php");
}

include("./pages/" . $pagina);

echo "</section>";

include("./includes/footer.php");
