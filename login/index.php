<?php
require'Usuario.class.php';

$usuario = new Usuario();
$usuario->setNome('Fabio Claret');
$usuario->setEmail('fabio.claret@gmail.com');
$usuario->setSenha('123');

$nome  = $usuario->getNome();
$email = $usuario->getEmail();
$senha = $usuario->getSenha();

echo "<h1>Nome: $nome <br>";
echo "email: $email <br>";
echo "senha: $senha ";


