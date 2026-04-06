<?php
session_start();

// verifica se está logado
if (!isset($_SESSION["logado"])) {
    header("Location:login.php");
    exit();
}

$post = $_POST["post"] ?? "";

if (isset($_POST["postar"])) {
    if (empty($_POST["post"])) {
        echo "<p style='color:red;'>❌ O post não pode estar vazio!</p>";
    } else {
        $post = $_POST["post"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymConnect</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header_container">
            <div class="logo_area">
                <img src="IMG/icon_logo.png" alt="GymConnect Logo" class="logo">
            </div>
            <div class="menu">
                <nav class="nav">
                    <a href="#" class="nav_link">Feed</a>
                    <a href="#" class="nav_link">Explorar</a>
                    <a href="#" class="nav_link">Perfil</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">

        <!-- POST DO USUÁRIO -->
        <div class="post_user">
            <div class="info_User">
                <div class="img_User">
                    <img src="IMG/icon_user.svg" alt="foto user">
                </div>
                <div class="user_info_text">
                    <strong>KAUAN RAMOS</strong>
                    <span class="username">@kauanramos</span>
                </div>
            </div>
            <form method="POST" action="" class="form_post">
                <textarea name="post" placeholder="Conte como foi o treino de hoje!"></textarea>
                <div class="icons_btn">
                    <div class="icons">
                        <button type="button" class="btn_form">
                            <img src="IMG/iconimage.svg">
                        </button>
                        <button type="button" class="btn_form">
                            <img src="IMG/iconcamera-video.svg">
                        </button>
                    </div>
                    <button type="submit" name="postar" class="btn_submit_form">Publicar</button>
                </div>
            </form>
        </div>

        <!-- POST DO USUÁRIO -->
        <?php if (!empty($post)): ?>
        <div class="novo_post">
            <div class="info_User">
                <div class="img_User">
                    <img src="IMG/icon_user.svg">
                </div>
                <div class="user_info_text">
                    <strong>KAUAN RAMOS</strong>
                    <span class="username">@kauanramos</span>
                </div>
            </div>

            <p><?php echo $post; ?></p>

            <div class="post_actions">
                <button class="btn_like">
                    Curtir (<span class="like_count">0</span>)
                </button>
                <button class="btn_comentario">
                    Comentar (<span class="comment_count">0</span>)
                </button>
            </div>

            <div class="comentarios_posts" style="display:none;">
                <input type="text" class="comment_input" placeholder="Escreva um comentário...">
                <button class="btn_add_comentario">Publicar Comentário</button>
                <ul class="comment_list"></ul>
            </div>
        </div>
        <?php endif; ?>

        <!-- POSTS ALEATÓRIOS -->
        <div class="novo_post">
            <p>Treino de pernas finalizado! 💪</p>

            <div class="post_actions">
                <button class="btn_like">
                    Curtir (<span class="like_count">0</span>)
                </button>
                <button class="btn_comentario">
                    Comentar (<span class="comment_count">0</span>)
                </button>
            </div>

            <div class="comentarios_posts" style="display:none;">
                <input type="text" class="comment_input">
                <button class="btn_add_comentario">Comentar</button>
                <ul class="comment_list"></ul>
            </div>
        </div>

    </main>

    <script src="JS/script.js"></script>
</body>
</html>