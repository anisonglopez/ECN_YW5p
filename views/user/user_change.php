<?php   
$title = "Edit User";
$TABLE_DEP = "00_department";
require '../layout/header.php';
if (isset($_GET['id'])) {
    $id =  base64_decode($_GET['id']);
    try{
        $statement = $pdo->prepare("SELECT * FROM 01_user_profile
         WHERE user_id  = '$id' ");
        $statement->execute();
        $result = $statement->fetchAll();
        //echo $result ;
        if(empty($result )){exit;}
        foreach ($result as $row) :
            $user_id = $row["user_id"];
            $user_name = $row["user_name"];
            $user_password = $row["user_password"];
            $role_id = $row["role_id"];
            $dep_id = $row["dep_id"];
            $user_email = $row["user_email"];
            $user_active = $row["user_active"];
            $user_lock = $row["user_lock"];
            $user_created_by = $row["user_created_by"];
            $user_created_date = $row["user_created_date"];
            $user_updated_by = $row["user_updated_by"];
            $user_updated_date = $row["user_updated_date"];
        endforeach;
      } 
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
}else{
    die();
}
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
          <!-- Page Content -->
          <hr>
          <form method="post" id="dep_form">
  <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 m-0 font-weight-bold text-primary">
          แก้ไขข้อมูลผู้ใช้งาน
      </div>
      <div class="col-md-6 text-right">
      <button  type="reset" class="btn btn-facebook" onclick="location.href='user_profile.php';">Back</button>
      <button type="submit" class="btn btn-success" >Update</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
                                      <!--id-->
                                      <input type="hidden" name="user_id" value="<?=$user_id?>"/>
    <div class="form-group row">
                      <label for="user_name" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" name="user_name" id="user_name" value="<?=$user_name?>" class="form-control"    required placeholder="ระบุชื่อผู้ใช้งาน" disabled>
                    </div>
                    </div>

                      <div class="form-group row">
                      <label for="user_password" class="col-sm-2 col-form-label">รหัสผ่าน : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" name="user_password" id="user_password" value="" class="form-control"    required minlength="6" maxlength="10" placeholder="ระบุรหัสผ่านอย่างน้อย 6 ตัวอักษร">
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_repassword" class="col-sm-2 col-form-label">ระบุรหัสผ่านอีกครั้ง : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" name="user_repassword" id="user_repassword" value="" class="form-control"    required  minlength="6" maxlength="10" placeholder="ระบุรหัสผ่านอีกครั้ง">
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="dep_id" class="col-sm-2 col-form-label">แผนก : </label>
                      <div class="col-sm-8">
                      <select class="form-control" name="dep_id" id="dep_id" required >
                              <option value="">Select</option>
                              <?php
                                  $stmt = $pdo->prepare("SELECT * FROM $TABLE_DEP WHERE dep_active = 1 AND dep_trash = 0");
                                  $stmt->execute();
                                  $result_dep = $stmt->fetchAll();
                              ?>
                                <?php foreach ($result_dep as $row) : ?>
                                <option value="<?= $row["dep_id"]; ?>" <?php echo ($dep_id ===$row["dep_id"] ? 'selected' : null); ?> ><?= $row["dep_name"]; ?></option>
                                <?php endforeach; ?> 
                              </select>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="role_id" class="col-sm-2 col-form-label">กลุ่มผู้ใช้งาน : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" name="role_id" id="role_id" value="<?=$role_id?>" class="form-control" required autocomplete="off">
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="user_email" class="col-sm-2 col-form-label">email : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="email" name="user_email" id="user_email" value="<?=$user_email?>" class="form-control" required autocomplete="off">
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_lock" class="col-sm-2 col-form-label">lock : </label>
                      <div class="col-sm-8">
                        <select class="form-control" name="user_lock" id="user_lock" required>
                              <option value="">Select</option>
                                        <option value="0" <?=($user_lock == 0) ? 'selected' : '' ?>>Unlock</option>
                                        <option value="1" <?=($user_lock == 1) ? 'selected' : '' ?>>Lock</option>
                              </select>
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="user_active" class="col-sm-2 col-form-label">Status : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                      <select class="form-control" name="user_active" id="user_active" required>
                              <option value="">Select</option>
                                        <option value="1" <?=($user_active == 1) ? 'selected' : '' ?>>Active</option>
                                        <option value="0" <?=($user_active == 0) ? 'selected' : '' ?>>Unactive</option>
                              </select>
                    </div>
                    </div>
                    
    </div>
  </div>
</div>
</form>
<div id="alert_box" class="alert alert-success alert-dismissible fade "   role="alert">
  <strong id="msg_head"></strong><p id="msg_txt"></p>
</div>
              <!-- end card -->
<?php   require '../layout/footer.php';?>
<script src="user_change.js"></script>
