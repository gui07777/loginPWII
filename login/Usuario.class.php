<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function conecta(){
        $dns  = "mysql:dbname=usuario;host=localhost";
        $user = "root";
        $pass = "";

        try{
            $this->pdo = new PDO($dns, $user, $pass);
            return true;
        }catch (Exception $e) {
            echo "<h1>Erro ao conectar</h1>";
            return false;
        }     
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function cadastraUsuario($nome, $email, $senha) {
#passo1 - criar uma variavel comm consulta sql
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        
        #passo2 - chamar o metodo prepare passando a variavael
        $sql = $this->pdo->prepare($sql);
        
        #passo3 - trocar os apelidos pelo conteúdo da variavel
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);

        #passo4 - executar o comando sql em si
        return $sql->execute();
    }

    public function procurarEmail($email) {
        $sql = "SELECT * FROM usuario WHERE email = :e";
        
        $sql = $this->pdo->prepare($sql);
        
        $sql->bindValue(":e", $email);

        return $sql->execute();

        return $sql->rowCount() > 0;  #inves de fazer if else, faz return que significa: se é maior que zero retorna verdadeiro
    }
}
?>