<?php

    class prodModel{
        
        function getConnection(){
            $db = new PDO('mysql:host=localhost;dbname=crownytech;charset=utf8', 'root', '');
            return $db;
        }
        function getDataProduct()
    {
        $db = $this->getConnection();

        $query = $db->prepare('SELECT product_table.*, category_table.categoryName 
                                FROM product_table 
                                INNER JOIN category_table 
                                ON product_table.id_categoria = category_table.id_categoria');
        $query->execute();

        $productData = $query->fetchAll(PDO::FETCH_OBJ);

        return $productData;
    }

    function getSelectedProd($selectedProd)
    {
        $db = $this->getConnection();
        $query = $db->prepare('SELECT product_table.*, category_table.categoryName 
                                FROM product_table 
                                INNER JOIN category_table 
                                ON product_table.id_categoria = category_table.id_categoria 
                                WHERE product_table.productName = ?');
    
        $query->execute([$selectedProd]);
        $productData = $query->fetchAll(PDO::FETCH_OBJ);
        return $productData;
    }
        function getCategory(){
            $db = $this->getConnection();
            $query = $db->prepare('SELECT * FROM `category_table`');
            
            $query->execute();
        
            $categoryData = $query->fetchAll(PDO::FETCH_OBJ);
        
            return $categoryData;
        }
        function getProductRelate($idCat){
            $db = $this->getConnection();
            $query = $db->prepare('SELECT * FROM `product_table` WHERE id_categoria = ?');
            $query->execute([$idCat]);

            $prodsRel = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $prodsRel;

        }
        function getProductDetails($id){
            $db = $this->getConnection();
            $query = $db->prepare('SELECT * FROM `product_table` WHERE id_product = ?');
            $query->execute([$id]);
            
            $prodsDet = $query->fetchAll(PDO::FETCH_OBJ);

            return $prodsDet;
        }
    }