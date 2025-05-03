<?php class Db
{
    private static $mysqli = null;
    private function __construct()
    {

    }

    public static function conectar()
    {
        $mysqli = new mysqli("localhost", "root", "Fierce#123", "biblioteca");
        if ($mysqli->connect_errno) {
            print "Error en la conexión: " . $mysqli->connect_errno;
            die();
        }
        return $mysqli;
    }
}
?>
