<?php
// incluye la clase Db
require_once "conexion.php";
class CrudLibro
{
    // constructor de la clase
    public function __construct() {}
    // método para insertar, recibe como parámetro un objeto de tipo libro
    public function insertar($libro)
    {
        $mysqli = Db::conectar();
        $comando = "INSERT INTO libros (nombre, autor, anio_edicion) VALUES (?, ?, ?)";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($comando);
        $stmt->bind_param(
            "sss",
            $libro->getNombre(),
            $libro->getAutor(),
            $libro->getAnio_edicion()
        );
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    // método para mostrar todos los libros
    public function mostrar()
    {
        $mysqli = Db::conectar();
        $listaLibros = [];
        $comando = "SELECT * FROM libros";
        $result = $mysqli->query($comando);
        while ($fila = $result->fetch_array()) {
            $myLibro = new Libro();
            $myLibro->setId($fila["id"]);
            $myLibro->setNombre($fila["nombre"]);
            $myLibro->setAutor($fila["autor"]);
            $myLibro->setAnio_edicion($fila["anio_edicion"]);
            $listaLibros[] = $myLibro;
        }
        $mysqli->close();
        return $listaLibros;
    }

    // método para eliminar un libro, recibe como parámetro el id del libro
    public function eliminar($id)
    {
        $mysqli = Db::conectar();
        $comando = "DELETE FROM libros WHERE id=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($comando);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    // método para buscar un libro, recibe como parámetro el id del libro
    public function obtenerLibro($id)
    {
        $mysqli = Db::conectar();
        $comando = "SELECT * FROM libros WHERE id='$id'";
        $result = $mysqli->query($comando);
        $libro = $result->fetch_array();
        $myLibro = new Libro();
        $myLibro->setId($libro["id"]);
        $myLibro->setNombre($libro["nombre"]);
        $myLibro->setAutor($libro["autor"]);
        $myLibro->setAnio_edicion($libro["anio_edicion"]);
        $mysqli->close();
        return $myLibro;
    }

    // método para actualizar un libro, recibe como parámetro el libro
    public function actualizar($libro)
    {
        $mysqli = Db::conectar();
        $comando = "UPDATE libros SET nombre=?, autor=?,anio_edicion=? WHERE id=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($comando);
        $stmt->bind_param(
            "sssi",
            $libro->getNombre(),
            $libro->getAutor(),
            $libro->getAnio_edicion(),
            $libro->getId()
        );
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }
}

?>
