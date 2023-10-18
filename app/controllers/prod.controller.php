<?php
include_once 'app/models/prod.model.php';
include_once 'app/views/prod.view.php';

class prodController{
    private $model;
    private $view;
    

    function __construct(){
        $this->model = new prodModel();
        $this->view = new prodView();
    }


    function showHome(){
        $this->view->showHome();
    }

    function procesarBtn(){
        $action = $_POST['accion'];
        if ($action == 'listProd') {
            $data = $this->model->getDataProduct();
            $this->view->showDataProduct($data);

        } else if ($action == 'listSelectedProd') {
            $data = $_POST['Productos'];
            if(isset($data)&& !empty($data)){
                $prod = $this->model->getSelectedProd($data);
                $this->view->showSelectedProd($prod);
            }else{
               require_once './templates/error.phtml';
            } 

        } else if ($action == 'showCategory') {
            $data = $this->model->getCategory();
            $this->view->showCategory($data);
        }
    }
    function productRelate($id){
        $prodsRel = $this->model->getProductRelate($id);
        $this->view->showProdsRelate($prodsRel);

    }
    function productDetails($id){
        $prodsDet = $this->model->getProductDetails($id);
        $this->view->showProdsDetails($prodsDet);
    }

}
