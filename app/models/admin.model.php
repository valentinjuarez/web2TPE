<?php

class adminModel
{

    function getConnection()
    {
        $db = new PDO('mysql:host=localhost;dbname=crownytech;charset=utf8', 'root', '');
        return $db;
    }

    function getItemsAdmin()
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
    function deleteItem($id)
    {
        $db = $this->getConnection();
        $query = $db->prepare('DELETE FROM product_table WHERE id_product = ? ');
        $query->execute([$id]);
    }
    function updatePrice($id)
    {
        $db = $this->getConnection();
    
        // Obtén el precio actual
        $queryGetPrice = $db->prepare('SELECT price FROM product_table WHERE id_product = ?');
        $queryGetPrice->execute([$id]);
        $currentPrice = $queryGetPrice->fetch(PDO::FETCH_ASSOC)['price'];
    
        // Calcula el nuevo precio con un incremento del 5%
        $newPrice = $currentPrice * 1.05;
    
        // Actualiza el precio en la base de datos
        $queryUpdatePrice = $db->prepare('UPDATE product_table SET price = ? WHERE id_product = ?');
        $queryUpdatePrice->execute([$newPrice, $id]);
    }
    function insertProductToTable($productName, $productModel, $price, $weight, $height, $storage, $category)
{
    $db = $this->getConnection();
    $query = $db->prepare('INSERT INTO product_table (productName, model, price, weightKG, height_cm, storageGB, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $query->execute([$productName, $productModel, $price, $weight, $height, $storage, $category]);
    header('Location: ' . BASE_URL . 'listItems');
}

}
