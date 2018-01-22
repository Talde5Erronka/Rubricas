<?

$dbserver = "localhost";
$dbuser = "rubrica";
$password = "rubrica";
$dbname = "Rubrica";



$con = new mysqli($dbserver, $dbuser, $password,$dbname);
mysqli_set_charset($con, "utf8");
if(!$con) {
    echo "No se pudo conectar a la base de datos";
  }

?>
