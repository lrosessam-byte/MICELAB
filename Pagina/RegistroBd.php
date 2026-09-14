<?php





class Tabla {

  public function SetConexiondb($servername,$username,$password,$bd) {
      $conn = new mysqli($servername, $username, $password,$bd);
      return $conn;
      return $bd;
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }}

      public function SetTabla( $Ntabla, $sql, $conn,$bd){   
      $conn->query($sql);


 if ($conn->query($sql) === TRUE) {
  echo "Tabla ".$Ntabla."en la base de datos".$bd."creada correctamente";
} else {
  echo "Error " . $conn->error;


}

$conn->close();
}
}
?>