<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ... (cabeçalho HTML permanece o mesmo) ... -->
</head>
<body>
    <div class="container">
        <h1>Resultado da Simulação</h1>
        <?php
        // Processar os dados do formulário aqui
        // Exemplo de como acessar os dados do formulário:
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $credito = $_POST['credito'];
        $renda = $_POST['renda'];

        // Verificar se a renda mínima é maior que R$ 50,00
        if ($renda < 50) {
            echo "<p style='color: red;'>Erro: A Renda Atual deve ser no mínimo R$ 50,00.</p>";
        }
        // Verificar se o valor do crédito está entre 10 e 100 vezes o valor da renda
        elseif ($credito < ($renda * 10) || $credito > ($renda * 100)) {
            echo "<p style='color: red;'>Erro: O Valor do Crédito Pretendido deve ser no mínimo 10 vezes e no máximo 100 vezes o valor da Renda Atual.</p>";
        } else {
            // Calcular o valor total do crédito com juros
            $juros = $credito * 0.02; // 2% de juros sobre o valor total do crédito
            $valorTotal = $credito + $juros;

            // Exibir os resultados
            echo "<p>Nome: $nome</p>";
            echo "<p>Telefone: $telefone</p>";
            echo "<p>CPF: $cpf</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Valor do Crédito Pretendido: R$ " . number_format($credito, 2, ',', '.') . "</p>";
            
            // Calcular e exibir os valores das parcelas para diferentes prazos
            $parcelas_12 = ($valorTotal * 1.02) / 12;
            $parcelas_18 = ($valorTotal * 1.03) / 18;
            $parcelas_24 = ($valorTotal * 1.04) / 24;
            $parcelas_30 = ($valorTotal * 1.05) / 30;
            $parcelas_36 = ($valorTotal * 1.06) / 36;

            echo "<h2>Opções de Parcelamento:</h2>";
            echo "<p>12 parcelas (2% de juros): R$ " . number_format($parcelas_12, 2, ',', '.') . " por mês</p>";
            echo "<p>18 parcelas (3% de juros): R$ " . number_format($parcelas_18, 2, ',', '.') . " por mês</p>";
            echo "<p>24 parcelas (4% de juros): R$ " . number_format($parcelas_24, 2, ',', '.') . " por mês</p>";
            echo "<p>30 parcelas (5% de juros): R$ " . number_format($parcelas_30, 2, ',', '.') . " por mês</p>";
            echo "<p>36 parcelas (6% de juros): R$ " . number_format($parcelas_36, 2, ',', '.') . " por mês</p>";
        }
        ?>
    </div>
</body>
</html>
