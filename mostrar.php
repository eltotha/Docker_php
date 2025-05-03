<?php
//incluye la clase Libro y CrudLibro
require_once "crud_libro.php";
require_once "libro.php";
$crud = new CrudLibro();
$libro = new Libro();
//obtiene todos los libros con el método mostrar de la clase crud
$listaLibros = $crud->mostrar();
?>
<html>

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Mostrar Libros</title>
</head>

<body>
    <table border=1>

        <head>
            <td>Nombre</td>
            <td>Autor</td>
            <td>Edicion</td>
            <td>Actualizar</td>
            <td>Eliminar</td>
        </head>

        <body>
            <?php foreach ($listaLibros as $libro) { ?>
                <tr>
                    <td><?php echo $libro->getNombre(); ?></td>
                    <td><?php echo $libro->getAutor(); ?></td>
                    <td><?php echo $libro->getAnio_edicion(); ?> </td>
                    <td><a href="actualizar.php?id=<?php echo $libro->getId(); ?>&accion=a">Actualizar</a> </td>
                    <td><a href="administrar_libro.php?id=<?php echo $libro->getId(); ?>&accion=e">Eliminar</a> </td>
                </tr>
            <?php } ?>
        </body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </table>
    <a href="index.php">Volver</a>
</body>

</html>