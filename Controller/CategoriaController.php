<?php

class CategoriaController 
{

    public static function index() 
    {

        include 'Model/CategoriaModel.php';

        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View/modules/categoria_produto/ListaCategoria.php';
    }

    public static function form()
    {
        include 'Model/CategoriaModel.php';

        $model= new CategoriaModel();

        if(isset($_GET['id'])) {
            $model = $model->getById( (int) $_get['id']);
        }

        include 'View/modules/categoria_produto/FormCategoria.php';
    }

    public static function save() 
    {

        include 'Model/CategoriaModel.php';

        $model = new CategoriaModel();

        $model->id = $_POST['id'];
        $model->tipo = $_POST['tipo'];

        $model->save();

        header("Location: /categoria"); 
    }

    public static function delete()
    {

        include 'Model/CategoriaModel.php';

        $model = new CategoriaModel();

        $model->delete ( (int) $_GET['id']);

        header ("Location: /categoria");
    }
}