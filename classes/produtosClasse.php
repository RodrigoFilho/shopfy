<?php

//importar a classe de conexao
require_once "Conexao.php";

class Produtos
{
    //atributos são os métodos da tabela (ideticos ao bd)
    public $cod_prod;
    public $nome;
    public $cod_barras;
    public $dt_fabr;
    public $dt_venc;
    public $lote;
    public $quantidade;
    public $preco;
    public $foto;
    public $categoria;

    //metodos -> crud(insert, delete, select, update)
    public function listarTodos()
    {
        try {
            //instacia da classe de conexao (chamando bd)
            $bd = new Conexao();
            //criar uma variavel para comando select
            $lista = $bd->executeSelect("select * from produtos");
            //retornar a lista na tela
            return $lista;
        } catch (PDOException $msg) {
            echo "Não foi possível conectar à tabela produtos" . $msg->getMessage();
        }
    }
}