<?php
if (isset($_POST['m_id'])) {
    //echo $pdo;
    require '../../00_config/connect.php';//db connect
 $TABLE_NAME = "00_module";
  $module_id = htmlspecialchars($_POST['m_id']);
  $moduel_name = htmlspecialchars($_POST['m_name']);
  $role_id = $_POST['role_id'];
  $user_lock = $_POST['user_lock'];
  //$user_update = $_SESSION['user_name'];
  date_default_timezone_set("Asia/Bangkok");
  $date_today = date('Y-m-d H:i:s');
  $user_update = 'Admin';
    try {

      $datalist =[
        "module_id"        => $module_id,
        "moduel_name"        => $moduel_name,
        "dep_id"        => $dep_id,
        "role_id"        => $role_id,
        "user_email"        => $user_email,
        "user_active"        => $user_active,
        "user_lock"        => $user_lock,
        "user_created_by"        => $user_update,
        "user_created_date"        => $date_today,
        "user_updated_by"        => $user_update,
        "user_updated_date"        => $date_today
      ];
      $sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"$TABLE_NAME",
		implode(", ", array_keys($datalist)),
		":" . implode(", :", array_keys($datalist))
);
    $statement = $pdo->prepare($sql);
    $statement->execute($datalist);
        echo "success";

    } catch(PDOException $error) {
       echo  $alert_txt = "Error Cannot Insert" . $sql . "<br>" . $error->getMessage();
        $alert_class = "alert-danger ";
        echo "error";
      }
   }
   else{
    echo "danger";
   }
  $pdo = null;
?>