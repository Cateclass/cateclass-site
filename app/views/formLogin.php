<?php 
    // Inicia a sessão para LER a mensagem
    session_start(); 
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">

    <title>São Benedito | Login</title>

</head>

<body>

    <?php if (isset($_SESSION['flash_message'])): ?>
        
        <div style="color: green; border: 1px solid green; padding: 10px;">
            <?php echo $_SESSION['flash_message']; ?>
        </div>
        
        <?php unset($_SESSION['flash_message']); ?>
        
    <?php endif; ?>
    
    <div class="container">
        <!-- Form Fazer Login -->
        <div id="login-form">
            <form action="/cateclass-site/app/autenticar" method="post">
                <h2>Login</h2>
                <?php if (isset($dados['erro'])): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($dados['erro']); ?></p>
                <?php endif; ?>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <button type="submit" name="login">Login</button>
                <p>Não tem uma conta? <a href="/cateclass-site/app/cadastro">Criar conta</a></p>
            </form>
        </div>
    
</body>

</html>