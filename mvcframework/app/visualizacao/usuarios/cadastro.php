<?php
    require APPROOT . '/visualizacao/includes/head.php';
?>

<div class="navbar">

    <?php
        require APPROOT . '/visualizacao/includes/navegacao.php';
    ?>

</div>

<div class="loginConteiner">
    <div class="loginWrapper">

        <h2>Criar Conta</h2>

        <form action="<?php echo URLROOT; ?>/usuarios/cadastro" method="POST">

            <input type="text" placeholder="Usuário *" name="Usuario">
            <span class="preenchimentoInvalido">

                <?php echo $dados['usernameError']; ?>

            </span>

            <input type="email" placeholder="E-mail *" name="Email">
            <span class="emailError">

                <?php echo $dados['emailError']; ?>

            </span>

            <input type="password" placeholder="Senha *" name="Senha">
            <span class="preenchimentoInvalido">

                <?php echo $dados['senhaError']; ?>

            </span>

            <input type="password" placeholder="Confirmar Senha *" name="confirmarSenha">
            <span class="preenchimentoInvalido">

                <?php echo $dados['confirmarSenhaError']; ?>

            </span>

            <button id="entrar" type="submit" value="entrar">Entrar</button>

            <p class="opcoes">
                Deseja se juntar a nós? 
                <a href="<?php echo URLROOT; ?>/usuarios/cadastro">
                    Criar Conta
                </a>
            </p>
        </form>
    </div>
</div>