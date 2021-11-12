<?php

class Conexao
{
    private $server = "localhost"; //onde esta o bd
    private $bd = "supermercado_bd"; //nome do bd
    private $user = "root";  //nome do adm do usuario
    private $password = ""; // senha do bdprivate $conn =""; //conexao

    public function __construct()
    {
        try {
            //criar conexao com o mysql usando a classe pdo
            //this = fazer referncia a classe
            $this->conn = new PDO("mysql:host={$this ->server};dbname={$this->bd};charset=utf8", $this->user, $this->password);
        } catch (PDOException $msg) { //erro
            echo "Não foi possível se conectar no servidor" . $msg->getMessage();
        }
    }

    //executar insert/delete/update

    public function login()
    {
        try {
            //preencher campos
            $this->EMAIL = $_POST["email"];
            $this->SENHA = $_POST["senha"];

            //criar uma instância da classe
            $bd = new Conexao();
            //criar uma variável para receber o comando insert
            $sql = "select * from funcionario where email = '{$this->EMAIL}' and senha = '{$this->SENHA}'";

            return $bd->executeSelect($sql);
        } catch (PDOException $msg) {
            echo "Não foi possível realizar o login com os dados" . $msg->getMessage();
        }
    }

    public function executeSelect($comando)
    {
        try {
            $sql = $this->conn->prepare($comando);
            //executar o comando no servidor
            $sql->execute();

            //var_dump($comando,$sql->rowCount()); die();
            //testar se deu certo
            if ($sql->rowCount() > 0) {
                //fetch_all retorna tudo do selcet
                //fetch_class retornar dados na classe
                //fetch_assoc retrnar dados do vetor
                return $sql->fetchAll(PDO::FETCH_CLASS); //retornar o comando para a tela
            } else { // se cair, deu erro na execucao do comando
                return '0'; //retornar o comando para a tela
            }
        } catch (PDOException $msg) {
            echo "Não foi possível executar o comando" . $msg->getMessage();
        }
    }

public function inserir()
{
    try {
        //testar se clicou em salvar
        if (isset($_POST["salvar"])) {

            //preencher os campos

            $this->nome = $_POST["nome"];
            $this->email = $_POST["email"];
            $this->senha = $_POST["senha"];

            //criar uma instancia de classe
            $bd = new Conexao();
            //criar uma variável para receber o comando insert
            $comandoInsert = "insert into funcionario(senha,email,nome) 
            values ('{$this->senha}', '{$this->email}', '{$this->nome}')";
            return $bd->executeQuery($comandoInsert);

        }
    } catch (PDOException $msg) {
        echo "Não foi possível inserir os dados dos alunos" . $msg->getMessage();
    }
}

    public function executeQuery($comando)
    {
        try {
            $sql = $this->conn->prepare($comando);
            //executar o comando no servidor
            $sql->execute();
            //testar se deu certo
            if ($sql->rowCount() > 0) {
                return '1'; //retornar o comando para a tela
            } else { // se cair, deu erro na execucao do comando
                return $sql->errorInfo(); //retornar o comando para a tela
            }
        } catch (PDOException $msg) {
            echo "Não foi possível executar o comando" . $msg->getMessage();
        }
        //executar selcet
    }
}
?>