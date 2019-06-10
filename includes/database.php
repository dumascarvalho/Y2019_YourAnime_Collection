<?php

function openConnection()
{
    $DB = "youranime_store";
    $DB_HOST = "localhost:3307";
    $DB_USER = "root";
    $DB_PASS = "";

    $CONN = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB);

    if ($CONN->connect_error) {
        die("Não foi possível estabelecer conexão: " . $CONN->connect_error);
    } else {
        echo "Conexão realizada com sucesso!";
    }

    return $CONN;
}

function closeConnection($CONN)
{
    $CONN->close();
    echo "<br>Conexão encerrada com sucesso!";
}
