<?php
if (isset($_POST['user_id'])) {
    if($_POST['user_password'] != $_POST['user_repassword']){
        echo "password";
        exit();
    }
    //echo $pdo;
    require '../../00_config/connect.php';//db connect
 $TABLE_NAME = "01_user_profile";
 $user_id = ($_POST['user_id']);
 $hash_password= hash('sha256', $_POST['user_password']);
 $dep_id = ($_POST['dep_id']);
 $user_active = ($_POST['user_active']);
 $user_email = ($_POST['user_email']);
 $role_id = $_POST['role_id'];
 $user_lock = $_POST['user_lock'];
 //$user_update = $_SESSION['user_name'];
 $user_update = 'Admin';
 try {
    $datalist =[
        "user_id"        =>   $user_id,
        "user_password"        =>   $hash_password,
        "dep_id"        =>   $dep_id,
        "user_active"        => $user_active,
        "user_email"        => $user_email,
        "role_id"        => $role_id,
        "user_lock"        => $user_lock
      ];
      $sql = "UPDATE $TABLE_NAME 
              SET user_password = :user_password, 
              dep_id = :dep_id,
              user_active = :user_active,
              user_email = :user_email,
              role_id = :role_id,
              user_lock = :user_lock
              WHERE user_id = :user_id";
    $statement = $pdo->prepare($sql);
    $statement->execute($datalist);
    echo 'success';
  } catch(PDOException $error) {
    echo 'error';
    //echo  "Error Cannot Delete" . $sql . "<br>" . $error->getMessage();
    //   $alert_class = "alert-danger ";
    //   /echo "error";
  }
  $pdo = null;
}
?>