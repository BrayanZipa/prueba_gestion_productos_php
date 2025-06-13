<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Actualización</title>
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
    <h3>Actualización de producto</h3>
    <?php
        include 'conexion.php';

        $id = $_GET['id'];
        $sqlConsulta = "SELECT * from productos WHERE id='".$id."'";
        $resultado = mysqli_query($con,$sqlConsulta);

        while($fila=mysqli_fetch_assoc($resultado)){ ?>

    <div>
        <form action="editar.php" method="POST">
            <input type="hidden" name="idProducto" value="<?php echo $fila['id']?>">

            <div class="form-group">
                <input class="form-control" type="text" name="sku" value="<?php echo $fila['sku']?>" placeholder="SKU" rautocomplete="off" requerid onkeypress="return /[0-9]/i.test(event.key)">			
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="nombre" value="<?php echo $fila['nombre']?>" placeholder="Nombre" rautocomplete="off" requerid>			
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="cantidad" value="<?php echo $fila['cantidad']?>" placeholder="Cantidad" autocomplete="off" requerid onkeypress="return /[0-9]/i.test(event.key)">			
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="precio" value="<?php echo $fila['precio']?>" placeholder="Precio" autocomplete="off" requerid onkeypress="return /[0-9]/i.test(event.key)">			
            </div>

            <div class="form-group">
                <textarea class="form-control" type="text" name="descripcion" placeholder="Descripción" requerid autocomplete="off"><?php echo $fila['descripcion']?></textarea>			
            </div>

            <div id="boton" class="form-group">
                <input class="btn btn-dark" type="submit" value="Actualizar">
                <a class="btn btn-dark" href="index.php">Regresar</a>
            </div>
        </form>      
    <?php } ?>
    </div>

    <?php 

        if(isset($_POST['idProducto'])){

            $id2 = $_POST['idProducto'];
            $sku = $_POST['sku'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];

            if(empty($sku) || empty($nombre)|| empty($cantidad) || empty($precio)){
                echo "Es necesario ingresar todos los campos requeridos";

            }else{
                $total = $cantidad * $precio;
                $actualizar = "UPDATE productos SET sku='".$sku."', nombre='".$nombre."', descripcion='".$descripcion."', cantidad='".$cantidad."', precio='".$precio."', total='".$total."' WHERE id='".$id2."'";
                $ejecutar = mysqli_query($con,$actualizar);
            
                if (!$ejecutar) {
                    echo "Error al ingresar los datos del producto ".mysqli_error($con);
                } else {
                    if($nombre=1){
                        $_SESSION['message']='Registro actualizado correctamente';
                        $_SESSION['color']='success';
                        header("location:index.php");
                    }
                }
            } 
        }       
    ?>
</body>
</html>