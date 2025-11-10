<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"> <title>São Benedito | Cadastro</title>
</head>
<body>
    <div class="form-box" id="register-form">
        <form action="/cateclass-site/app/registrar" method="post">
            <h2>Criar conta</h2>

            <?php if (isset($dados['erro'])): ?>
                <p style="color: red;"><?php echo htmlspecialchars($dados['erro']); ?></p>
            <?php endif; ?>

            <input type="text" name="nome" id="nome" placeholder="Nome" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            
            <select name="funcao" required>
                <option value="">--Selecione a função--</option>
                <option value="catequizando">Catequizando</option>
                <option value="catequista">Catequista</option>
            </select>
            
            <button type="submit" name="register">Cadastrar</button>
            <p>Já tem uma conta? <a href="/cateclass-site/app/login">Login</a></p>
        </form>
    </div>
</body>
</html>