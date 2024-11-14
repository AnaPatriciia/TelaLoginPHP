<?php
    require_once '../Classes/usuario.php';
    $usuario = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELA LOGIN TURMA 140</title>
</head>
<body>
    <h2>TELA LOGIN</h2>
    <form method="post">
    <label>Usuário:</label><br>
    <input type="email" name="email" placeholder="Digite o email do usuario."><br>
    <label>Senha:</label><br>
    <input type="password" name="senha" placeholder="********"><br>
    <input type="submit" value="LOGAR"><br>

    <a href="cadastro.php">Cadastre-se</a>
    </form>
    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if(!empty($email) && !empty($senha))
            {
                $usuario->conectar("cadastro140", "localhost", "root", "");
                if($usuario->msgErro == "")
                {
                    if($usuario->logar($email, $senha))
                    {
                        header("location: areaRestrita.php");
                    }
                    else
                    {
                        ?>
                            <div class="msg-erro">
                                 <p>Usuário não cadastrado ou dados incorretos.</p>
                            </div>
                    <?php 
                    }
                }
                else{
                    ?>
                    <div class="msgErro">
                        <?php echo"Erro: ".$usuario->msgErro; ?>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="msg-erro">
                        <p>Preencha todos os campos</p>
                    </div>
                <?php
            }
        }
    ?>
</body>
</html>