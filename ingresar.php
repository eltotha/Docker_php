<html>

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Ingresar Libro</title>
</head>

<body>
    <header>Ingresa los datos del Libro</header>
    <form action="administrar_libro.php" method="post">
        <table>
            <tr>
                <td>Nombre libro:</td>
                <td><input type="text" name="nombre" /></td>
            </tr>
            <tr>
                <td>Autor:</td>
                <td><input type="text" name="autor" /></td>
            </tr>
            <tr>
                <td>Fecha Edición:</td>
                <td><input type="text" name="edicion" /></td>
            </tr>
            <input type="hidden" name="insertar" value="insertar" />
        </table>
        <input type="submit" value="Guardar" /> <a href="index.php">Volver</a>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>