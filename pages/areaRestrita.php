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
                <th>Editar</th>
                <th>Deletar</th>
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