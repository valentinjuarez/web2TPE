<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="book bg-secondary">
        <div class="container flex_space">
            <div class="text">
                <h1> <span>Busca </span> Tu producto: </h1>
            </div>
                
            <div class="form-reservation p-3">
                <form action="procesarBtn" method="POST">
                    <label for="">Ingrese producto: </label>
                        <select class="w-20 m-2 " name="Productos"> 
                        <option value="Celular">Celular</option>
                        <option value="Notebook">Notebook</option>
                        <option value="Tablet">Tablet</option>
                        <option value="TV">TV</option>
                        <option value="Parlante">Parlante</option>
                        <option value="Microfono">Micrófono</option>
                        <option value="Auriculares">Auriculares</option>
                        <option value="Computadora">Computadora de Escritorio</option>
                        </select>

                    
                    <button class="btn btn-success" name="accion" type="submit" value="listSelectedProd">Mostrar Producto seleccionado</button>
                    <button class="btn btn-success" name="accion" type="submit" value="listProd">Mostrar todos los Productos</button>
                    <button class="btn btn-success" name="accion" type="submit" value="showCategory">Mostrar Tabla categorias</button>
                    
                </form>
            
            </div>
        </div>
    </section>
</body>
</html>