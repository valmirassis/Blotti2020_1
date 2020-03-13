<?php
include ('admin/conecta.php');

$estado = $_POST['estado'];

$sql = mysqli_query($link, "SELECT * FROM cidade WHERE estado = '$estado'" ) or die ("Erro no SQL".mysqli_error());
$row = mysqli_num_rows($sql);
  while($row = mysqli_fetch_assoc($sql)){
?>
  <option value="<?php  echo $row['nome']; ?>"><?php  echo $row['nome']; ?></option>
 <?php }
?>