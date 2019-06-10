<?php

$pagina = "main.php";
$titulo = "YourAnime Store";

if (isset($_GET["pagina"])) {
    switch ($_GET["pagina"]) {
        case "cadastrar":
            $pagina = "cadastrarUsuario.php";
            $titulo = "Cadastro";
            break;
        default:
            $pagina = "main.php";
            $titulo = "YourAnime Store";
    }
}

include("./includes/header.php");

echo "<section>";

// include("./includes/sidebar.php");

include("./pages/" . $pagina);

echo "</section>";

include("./includes/footer.php");
