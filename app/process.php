<?php
require_once './app/db.php';
require_once './templates/header.php';
require_once './templates/form.php';
    
/*
function validarDato($dato){
  if(isset($dato)&& !empty($dato)){
    return true;
  }
  return false;
}
*/
function showHome(){
    require_once './templates/header.php';
    
    require_once './templates/form.php';

    require_once './templates/footer.php';
  }
function procesarBtn(){
  $action = $_POST['accion'];

  if($action == 'listProd'){
    showDataProduct();
   
  }else if($action == 'listSelectedProd'){
    showSelectedProd();

  }else if($action == 'showCategory'){
    showCategory();
  }



  require_once './templates/header.php';
    
  require_once './templates/form.php';

  require_once './templates/footer.php';
  }
  
function showSelectedProd(){
    $selectedProd = $_POST['Productos'];
    
    $producto = takeSelectedProd($selectedProd);

    require_once './templates/form.php';
    echo "<h1> Todos nuestros Productos seleccionados </h1>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>Nombre</th><th>Precio</th><th>Modelo</th><th>Peso</th><th>Altura</th><th>Almacenamiento</th><th>Id categoria</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  
  foreach ($producto as $product) {
      echo "<tr>";
      echo "<td>$product->productName</td>";
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
function showCategory(){
  $category = takeCategory();

  echo "<h1>Nuestras categorias en productos</h1>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>ID</th><th>Nombre</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  
  foreach ($category as $categories) {
      echo "<tr>";
      echo "<td>$categories->id_categoria</td>";
      echo "<td>$categories->categoryName</td>";
      echo "</tr>";  
  }
    echo "</tbody>";
    echo "</table>";
}

  
  