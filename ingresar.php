<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Formulario</title>
    <style>
        body{
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h3 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 50px;
        }

        form{
            margin-left: 28%;
            margin-right: 28%;
        }

        .form-group{
            margin-top:  30px;
        }

        #boton {
            text-align: center;
            margin-top: 30px;
        }

        input[type="submit"],a{
            width: 100px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h3>Crear producto</h3>
    <form action="ingresar.php" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="sku" placeholder="SKU" autocomplete="off" requerid onkeypress="return /[0-9]/i.test(event.key)">			
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" autocomplete="off" requerid pattern="[a-z A-Z]+">			
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="cantidad" placeholder="Cantidad" requerid onkeypress="return /[0-9]/i.test(event.key)">			
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="precio" placeholder="Precio" requerid onkeypress="return /[0-9]/i.test(event.key)">			
        </div>

        <div class="form-group">
            <textarea class="form-control" type="text" name="descripcion" placeholder="Descripción" rows="2" autocomplete="off"></textarea>			
        </div>

        <div id="boton" class="form-group">
            <input class="btn btn-dark" type="submit" name="enviar" value="Enviar">
            <a class="btn btn-dark" href="index.php">Regresar</a>
        </div>
    </form>

    <?php
    include 'conexion.php';

    if(isset($_POST['enviar'])){

        $sku = $_POST['sku'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        if(empty($sku) || empty($nombre)|| empty($cantidad) || empty($precio)){
            echo "Es necesario ingresar todos los campos requeridos";

        }else{   
            $total = $cantidad * $precio;
            $insertar = "INSERT INTO productos (sku, nombre, descripcion, cantidad, precio, total) VALUES ('$sku', '$nombre', '$descripcion', '$cantidad', '$precio', '$total')";
            $ejecutar = mysqli_query($con,$insertar);

            if (!$ejecutar) {
                echo "Error al ingresar los datos del producto ".mysqli_error($con);
            } else {
                if($nombre=1){
                    $_SESSION['message']='Registro almacenado correctamente';
                    $_SESSION['color']='success';
                    header("location:index.php");
                }
            }
        }
    }   
?>
</body>
</html>