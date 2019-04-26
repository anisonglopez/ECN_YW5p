<?php
if (isset($_POST['dep_id'])) {
    //echo $pdo;
    require '../../00_config/connect.php';//db connect
 $TABLE_NAME = "00_department";
 $dep_id = $_POST['dep_id'];
 $dep_name = $_POST['dep_name'];
 $dep_note = $_POST['dep_note'];
 $dep_active = $_POST['dep_active'];
 try {
    $datalist =[
        "dep_id"        =>   $dep_id,
        "dep_name"        =>   $dep_name,
        "dep_note"        => $dep_note,
        "dep_active"        => $dep_active
      ];
      $sql = "UPDATE $TABLE_NAME 
              SET dep_name = :dep_name, 
              dep_note = :dep_note,
              dep_active = :dep_active
              WHERE dep_id = :dep_id";
    $statement = $pdo->prepare($sql);
    $statement->execute($datalist);
    echo 'success';
  } catch(PDOException $error) {
    echo 'error';
    //   echo  "Error Cannot Delete" . $sql . "<br>" . $error->getMessage();
    //   $alert_class = "alert-danger ";
    //   /echo "error";
  }
  $pdo = null;
}
?>