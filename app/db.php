<?php    
function getConnection(){
    $db = new PDO('mysql:host=localhost;dbname=crownytech;charset=utf8', 'root', '');
    return $db;
}
function showDataProduct(){
  require_once './templates/header.php';

    $db = getConnection();

    $query = $db->prepare('SELECT * FROM product_table');
    $query->execute();

    $productData = $query->fetchAll(PDO::FETCH_OBJ);

    require_once './templates/form.php';
  echo "<h1> Todos nuestros Productos </h1>";
  echo "<table class='table table-bordered table-striped'>";
  echo "<thead class='thead-dark'>";
  echo "<tr>";
  echo "<th>Nombre</th><th>Precio</th><th>Modelo</th><th>Peso</th><th>Altura</th><th>Almacenamiento</th><th>Id Categoria</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

foreach ($productData as $product) {
    echo "<tr>";
    echo "<td> $product->productName</td>";
    echo "<td>$ $product->price</td>";
    echo "<td> $product->model</td>";
    echo "<td>kg $product->weightKG</td>";
    echo "<td>cm $product->height_cm</td>";
    echo "<td>gb $product->storageGB</td>";
    echo "<td> $product->id_categoria</td>";
    echo "</tr>";
    
}

echo "</tbody>";
echo "</table>";


require_once './templates/footer.php';
}

function takeSelectedProd($selectedProd){
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM `product_table` WHERE productName = ?');
    
    $query->execute([$selectedProd]);
    $productData = $query->fetchAll(PDO::FETCH_OBJ);
    return $productData;  
}
function takeCategory(){
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM `category_table`');
    
    $query->execute();

    $categoryData = $query->fetchAll(PDO::FETCH_OBJ);

    return $categoryData;
}





