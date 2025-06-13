<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos</title>
    <style>
        body {
            background-color: rgba(216, 216, 216, 0.637);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 85px;
        }

        #titulo {
            position: fixed;
            top: 0;
            background-color: black;
            color: white;
            width: 100%;
            z-index: 10;
        }

        h3 {
            text-align: center;
            margin: 20px auto;
            font-size: 35px;
        }

        form {
            text-align: center;
        }

        input[type="submit"],
        a {
            width: 100%;
        }

        #boton {
            width: 85px;
        }

        @media screen and (min-width: 800px) {
            #tarjetaFija {
                position: fixed;
                width: 16%;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'conexion.php';

    $sqlConsulta = "select * from productos";
    $resultado = mysqli_query($con, $sqlConsulta);
    ?>

    <div id="titulo">
        <h3>Productos</h3>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div id="tarjetaFija" class="card card-body">
                    <form action="" method="POSt">
                        <div class="form-group">
                            <input class="form-control" type="text" name="buscador" placeholder="Buscar" autofocus>
                        </div><br>
                        <input class="btn btn-success" type="submit" name="buscar" value="Buscar">
                    </form><br>
                    <div><a class="btn btn-success" href="ingresar.php">Agregar registro</a></div>
                </div>
            </div>

            <div class="col-md-10">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();
                } ?>

                <div class="card card-body">

                    <?php
                        if (isset($_POST['buscar'])) {

                            $data = $_POST['buscador'];

                            if (!empty($data)) {
                                // Escapa el valor para evitar inyección SQL
                                $busqueda = mysqli_real_escape_string($con, $data);

                                if (is_numeric($busqueda)) {
                                    $sqlConsulta2 = "SELECT * FROM productos 
                                                    WHERE id = $busqueda 
                                                    OR sku = $busqueda 
                                                    OR cantidad = $busqueda 
                                                    OR precio = $busqueda 
                                                    OR total = $busqueda";
                                } else {
                                    $sqlConsulta2 = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
                                }

                                $resultado2 = mysqli_query($con, $sqlConsulta2);
                                mostrarUnRegistro($resultado2);
                            }
                        }
                    ?>

                    <?php function mostrarUnRegistro($resultado2){ ?>
                        <div id="contenedorOculto" class="table-responsive">
                            <table class="table table-light table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>SKU</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($filas = mysqli_fetch_assoc($resultado2)) { ?>
                                        <tr>
                                            <td><?php echo $filas['id'] ?></td>
                                            <td><?php echo $filas['sku'] ?></td>
                                            <td><?php echo $filas['nombre'] ?></td>
                                            <td><?php echo $filas['cantidad'] ?></td>
                                            <td><?php echo $filas['precio'] ?></td>
                                            <td><?php echo $filas['total'] ?></td>
                                            <td><?php echo $filas['fecha_creacion'] ?></td>
                                            <td>
                                                <a id="boton" class="btn btn-dark" href="editar.php?id=<?php echo $filas['id'] ?>">Editar</a>
                                                <a id="boton" class="btn btn-danger" href="eliminar.php?id=<?php echo $filas['id'] ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div><a id="boton" class="btn btn-danger" href="javascript:contenOcultoQuitar()">Quitar</a></div><br>
                        </div>         
                    <?php } ?>

                    <div class="table-responsive">
                        <table class="table table-light table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>SKU</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td><?php echo $filas['id'] ?></td>
                                        <td><?php echo $filas['sku'] ?></td>
                                        <td><?php echo $filas['nombre'] ?></td>
                                        <td><?php echo $filas['cantidad'] ?></td>
                                        <td><?php echo $filas['precio'] ?></td>
                                        <td><?php echo $filas['total'] ?></td>
                                        <td><?php echo $filas['fecha_creacion'] ?></td>
                                        <td>
                                            <a id="boton" class="btn btn-dark" href="editar.php?id=<?php echo $filas['id'] ?>">Editar</a>
                                            <a id="boton" class="btn btn-danger" href="eliminar.php?id=<?php echo $filas['id'] ?>">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function contenOcultoQuitar() {
            document.getElementById("contenedorOculto").style.display = "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>