<?php
/*O header() serve para enviar instruções para o navegador
 (como redirecionar de página)
header("Location: feed.php");

// O exit() serve para parar a execução do código imediatamente após o
 redirecionamento exit();

// O session_start() serve para iniciar a sessão e permitir armazenar 
dados do usuário entre páginas
session_start();

O $_SESSION serve para guardar e acessar informações do usuário durante
 a navegação no sistema
$_SESSION["logado"] = true */

//////////////////////////////////////////////////////////////////
// inicia a sessão para armazenar dados do usuário entre páginas
session_start();

//meu loign
$email_valido = "kauanramosofc@gmail.com";
$senha_valida = "Admin123";
$erro = "";


// Verifica se enviou o formulário e o metodo
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //  recebe os dados
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // 5. Valida os dados
    if ($email == $email_valido && $senha == $senha_valida) {
        // salva na sessão que o usuário está logado
        $_SESSION["logado"] = true;
        // vai pro feed
        header("Location: feed.php");
        //exit garante q pare por aqui 
        exit();
    } else {
        // erro
        $erro = "Email ou senha inválidos!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 350px;">
    <h3 class="text-center mb-3">Login</h3>

    <form method="POST" action="">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

        <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>

        <button type="submit" class="btn btn-dark w-100">Entrar</button>
    </form>

    <?php if ($erro != ""): ?>
        <p class="text-danger mt-2"><?= $erro ?></p>
    <?php endif; ?>

    <p class="mt-3 text-center">
        Não tem conta? <a href="cadastro.php">Cadastre-se</a>
    </p>
</div>

</body>