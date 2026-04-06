<?php

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"] ?? "";
    $usuario = $_POST["usuario"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $confirmar = $_POST["confirmar"] ?? "";
    $data = $_POST["data_nascimento"] ?? "";
    $genero = $_POST["genero"] ?? "";

    if (empty($nome) || empty($usuario) || empty($email) || empty($senha) || empty($confirmar) || empty($data) || empty($genero)) {
        $erro = "❌ Por favor preencha todos os campos!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "❌ Email inválido!";
    } elseif (strlen($senha) < 6 || !preg_match('/[A-Z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
        $erro = "❌ Senha fraca!";
    } elseif ($senha != $confirmar) {
        $erro = "❌ As duas senhas não coincidem!";
    } else {
        header("Location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 400px;">
    <h3 class="text-center mb-3">Cadastro</h3>

    <form method="POST" action="">

        <input type="text" name="nome" class="form-control mb-2" placeholder="Nome completo" required>

        <input type="text" name="usuario" class="form-control mb-2" placeholder="Usuário" required>

        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

        <input type="password" name="senha" class="form-control mb-2" placeholder="Senha" required>

        <input type="password" name="confirmar" class="form-control mb-2" placeholder="Confirmar senha" required>

        <input type="date" name="data_nascimento" class="form-control mb-2" required>

        <select name="genero" class="form-control mb-3" required>
            <option value="">Selecione o gênero</option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
            <option value="Outro">Outro</option>
        </select>

        <button type="submit" class="btn btn-dark w-100">Cadastrar</button>

    </form>

    <?php if ($erro != ""): ?>
        <p class="text-danger mt-2"><?= $erro ?></p>
    <?php endif; ?>

    <p class="mt-3 text-center">
        Já tem conta? <a href="login.php">Login</a>
    </p>
</div>

</body>

</html>