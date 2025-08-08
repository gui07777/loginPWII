<?php
require'Usuario.class.php';

$usuario = new Usuario();

$con = $usuario->conecta();

if ($con) {

    $email = "gui@gmail.com";
    $teste = $usuario->procurarEmail($email);

    if(!$teste) {
       $sucesso = $usuario->cadastraUsuario("Guilherme", "gui@gmail.com", "123456");

        if($sucesso) {
                echo "<script>
                alert('Usuário cadastrado com SUCESSO')
                </script>";
            } else {
                echo "<script>
                alert('Não foi possível cadastrar o usuário.')
                </script>";
            }
            }else{
        echo "<script>
                alert('Esse usuário já existe.')
                </script>";
        }
}


?>