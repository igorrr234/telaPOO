<?php
include ('conexao/conexao.php');
$db = new Conexao();

class Usuario{
    private $conn;

    public function __construct ($db){
        $this->conn = $db;
    }
    public function cadastrar ($nome,$email,$senha,$confSenha)
{
    if ($senha==$confSenha){
    
    $senhaCriptografada = password_hash ($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nome,email,senha) VALUES (?,?,?)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1,$nome);
    $stmt->bindValue(2,$email);
    $stmt->bindValue(3,$senhaCriptografada);
    $result = $stmt->execute();

    return $result;


}else{
    return false;
}
    }
        }

?>