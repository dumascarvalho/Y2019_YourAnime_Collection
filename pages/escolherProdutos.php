<article>
    <?php
    include("./includes/database.php");

    $mysqli = abrirConexao();

    $query = 'SELECT id_produto, classificacao, descricao, preco FROM produto';

    $stmt = $mysqli->prepare($query);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_produto, $classificacao, $descricao, $preco);

    if ($linhas = $stmt->num_rows) {
        echo "<br><table class='tabelaProdutos'>";
        echo
            "<tr><th>Código do Produto</th><th>Classificação</th><th>Descrição</th><th>Preço</th><th>Comprar?</th>";
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>";
            echo $id_produto;
            echo "</td>";
            echo "<td>";
            echo  $classificacao;
            echo "</td>";
            echo "<td>";
            echo $descricao;
            echo "</td>";
            echo "<td>";
            echo "R$ " . $preco;
            echo "</td>";
            echo "<td>";
            echo "Sim/Não <input type='checkbox' class='comprar' name='comprar[]' value='" . $preco . "' id='" . $id_produto . "'>";
            echo "</td>";
            echo "</tr>";
        }
        echo '</table>';
        fecharConexao($stmt, $mysqli);
    }
    ?>
    <script>
        jQuery(function() {
            $(document).ready(function() {
                $(".comprar").change(function() {
                    var total = $('input[class="comprar"]:checked').get().reduce(function(tot, el) {
                        return tot + Number(el.value);
                    }, 0);
                    $('#resultado').val("R$ " + total);
                });
            });
        });
    </script>
    <br><br>Valor Total: <input type="label" id="resultado" value="R$ 0" disabled style="text-align: center; width: 80px; margin-left: 15px">
</article>