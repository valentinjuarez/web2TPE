<?php
require './app/models/admin.model.php';
include_once './app/views/admin.view.php';


class adminController
{
    private $model;
    private $view;


    function __construct()
    {
        $this->model = new adminModel();
        $this->view = new adminView();
    }
    function admin()
    {
        $this->view->showAdmin();
    }
    function getItems(){
        $items = $this->model->getItemsAdmin();
        $this->view->showItemsAdmin($items);
    }
    function deleteItems($id){
        $this->model->deleteItem($id);
        header('Location: ' . BASE_URL . 'listItems');
    }
    function updatePrices($id){
        $this->model->updatePrice($id);
        header('Location: ' . BASE_URL . 'listItems');
    }
    function insertItems(){
        $this->view->showInsertItems();
    }
    function insertProducts(){
       $productName = $_POST['nombre'];
       $productModel = $_POST['model'];
       $price = $_POST['price'];
       $weight = $_POST['weight'];
       $height = $_POST['height'];
       $storage = $_POST['storage'];
       $category = $_POST['selectCategoria'];

       $data = $this->model->insertProductToTable($productName , $productModel , $price , $weight , $height , $storage , $category);
       header('Location: ' . BASE_URL . 'listItems');

    }
}
