<?php
require_once '../Classes/usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastro140","localhost","root","");
$usuarioCadastrado = $usuario->listarUsuarios();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Restrita</title>
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    <table border='1'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(!empty($usuarioCadastrado))
            {
                foreach($usuarioCadastrado as $dados):
            
            ?>
            <tr>
                <td><?php echo $dados['nome']?></td>
                <td><?php echo $dados['email']?></td>
                <td><?php echo $dados['telefone']?></td>
                <td>
                    <form action="editarUsuario.php" method="post">
                        <input type="hidden" name="id_usuario" value="<?php echo $dados ['id_usuario'];?>">
                        <input type="submit" value="Editar">
                    </form>
                    <form action="excluirUsuario.php" method="post">
                        <input type="hidden" name="id_usuario" value="<?php echo $dados ['id_usuario'];?>">
                        <input type="submit" value="Excluir">
                    </form>
                   
                </td>
            </tr>
            <?php 
            endforeach;
            }
            else
            {
                echo "Nenhum registro encontrado";
            }
            ?>
        </tbody>
    </table>
</body>
</html>