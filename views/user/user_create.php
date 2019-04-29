<?php   
$title = "Create User";
require '../layout/header.php';
$TABLE_DEP = '00_department';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Create User</h1>
          <!-- Page Content -->
          <hr>
<form method="post"  onsubmit="return validateForm()" enctype="multipart/form-data">
  <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 m-0 font-weight-bold text-primary">
          สร้างข้อมูลผู้ใช้งาน
      </div>
      <div class="col-md-6 text-right">
      <button  type="reset" class="btn btn-facebook" onclick="location.href='user_profile.php';">Back</button>
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
                
                        <!-- <div class="form-group row">
                      <label for="imge" class="col-sm-2 col-form-label">Image  : </label>
                      <div class="col-sm-8">
                      
                    <img src="https://www.jquery-az.com/html/images/banana.jpg"   id="blah"  class="img-fluid img-thumbnail rounded-circle w-25"  title="user_pic" />        
                                <div class="col-md-5 mt-2">
                            <div class="custom-file">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input" onchange="readURL(this);">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                                </div>
                    </div>
                    </div> -->

                    <div class="form-group row">
                      <label for="user_name" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" name="user_name" id="user_name" value="" class="form-control"    required placeholder="ระบุชื่อผู้ใช้งาน">
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
                                        <option value="<?php echo $row["dep_id"]; ?>"><?php echo $row["dep_name"]; ?></option>
                                <?php endforeach; ?> 
                              </select>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="role_id" class="col-sm-2 col-form-label">กลุ่มผู้ใช้งาน : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" name="role_id" id="role_id" value="" class="form-control" required autocomplete="off">
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="user_email" class="col-sm-2 col-form-label">email : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="email" name="user_email" id="user_email" value="" class="form-control" required autocomplete="off">
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_lock" class="col-sm-2 col-form-label">lock : </label>
                      <div class="col-sm-8">
                        <select class="form-control" name="user_lock" id="user_lock" required>
                              <option value="">Select</option>
                                        <option value="0" selected>Unlock</option>
                                        <option value="1">Lock</option>
                              </select>
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="user_active" class="col-sm-2 col-form-label">Status : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                      <select class="form-control" name="user_active" id="user_active" required>
                              <option value="">Select</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Unactive</option>
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
<script src="user_create.js"></script>

