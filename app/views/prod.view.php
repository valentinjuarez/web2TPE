<?php


class prodView{


    function showHome(){
        require_once './templates/header.phtml';

        require_once './templates/form.phtml';

        require_once './templates/footer.phtml';
    }



    function showDataProduct($data){
        require_once './templates/header.phtml';

        require_once './templates/form.phtml';
        $producData = $data;
        require './templates/listProduct.phtml';
    }




    function showSelectedProd($prod){
        require_once './templates/header.phtml';

        require_once './templates/form.phtml';
        $producto = $prod;
        require './templates/listSelectProd.phtml';     
    }




    function showCategory($data){
        require_once './templates/header.phtml';

        require_once './templates/form.phtml';
        $category = $data;
        require './templates/listCategories.phtml';
    }
    
    function showProdsRelate($prodsRel){
       
        require './templates/listProdRelate.phtml';
        
    }
    function showProdsDetails($prodsDet){
        require './templates/listProdDetails.phtml';
    }
}
