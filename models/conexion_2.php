<?

$dbserver = "localhost";
$dbuser = "rubrica";
$password = "rubrica";
$dbname = "Rubrica";


$con = new mysqli($dbserver, $dbuser, $password,$dbname);
if(!$con) {
    echo "No se pudo conectar a la base de datos";
  }

?>
