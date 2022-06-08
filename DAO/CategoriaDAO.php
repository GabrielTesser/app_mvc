<?php

class CategoriaDAO
{
   
    private $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";

        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }


    public function insert(CategoriaModel $model) 
    {

        $sql = "INSERT INTO categoria_produto (tipo) VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->tipo);
        
        $stmt->execute();      
    }

    public function update(CategoriaModel $model)
    {
        $sql= "UPDATE categoria_produto SET tipo=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM categoria_produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        include_once 'Model/CategoriaModel.php';

        $sql = "SELECT * FROM categoria_produto WHERE  id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CategoriaModel");
    }

    public function delete(int $id)
    {
        $sql= "DELETE FROM categoria_produto WHERE id = ?";

        $stmt= $this-> conexao-> prepare($sql);
        $stmt-> bindValue(1, $id);
        $stmt-> execute();
    }
}