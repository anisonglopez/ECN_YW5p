<?php   
$title = "Create ECN";
require '../layout/header.php';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Create ECN</h1>
          <!-- Page Content -->
          <hr>
<form method="post" id="dep_form">
  <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 m-0 font-weight-bold text-primary">
          สร้างข้อมูล ECN
      </div>
      <div class="col-md-6 text-right">
      <button  type="reset" class="btn btn-facebook" onclick="location.href='ecn.php';">Back</button>
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
                
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Create Date</label>
                        <input type="text"  name="ecn_created_date" value="<?=date("d/m/Y")?>" class="form-control"  placeholder="Create Date">
                        </div>
                        <script>
                          $('input[name="ecn_created_date"]').daterangepicker({
                            singleDatePicker: true,
                            locale: {  format: 'DD/MM/YYYY' }  
                          });
                        </script>
                        <div class="form-group col-md-6">
                        <label>ECN No.</label>
                        <input type="text" name="ecn_no" class="form-control"  placeholder="ECN No.">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Buddle Code</label>
                        <input type="text" name="buddle_code" class="form-control"  placeholder="Buddle Code">
                        </div>
                        <div class="form-group col-md-6">
                        <label>MINOR</label>
                        <input type="text" name="minor" class="form-control"  placeholder="MINOR">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Part No. Old</label>
                        <input type="text" name="part_no_old" class="form-control"  placeholder="Part No. Old">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Part Name. Old</label>
                        <input type="text" name="part_name_old" class="form-control"  placeholder="Part Name. Old">
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Part No. New</label>
                        <input type="text" name="part_no_new" class="form-control"  placeholder="Part No. New">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Part Name. New</label>
                        <input type="text" name="part_name_new" class="form-control"  placeholder="Part Name. New">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>AC</label>
                        <input type="text" name="ac" class="form-control"  placeholder="AC">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Model Concern</label>
                        <input type="text" name="model_concern" class="form-control"  placeholder="Model Concern">
                        </div>
                    </div>

                       <div class="form-group row">
                      <label for="dep_name" class="col-sm-2 col-form-label">ชื่อแผนก : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" name="dep_name" id="dep_name" value="" class="form-control" required autocomplete="off">
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="dep_note" class="col-sm-2 col-form-label">Note : </label>
                      <div class="col-sm-8">
                        <textarea name="dep_note" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    </div>

                     <div class="form-group row">
                      <label for="dep_active" class="col-sm-2 col-form-label">Status : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                      <select class="form-control" name="dep_active" id="dep_active" required>
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
<script>
    $( "form" ).on( "submit", function( event ) {
    var alert_box = document.getElementById("alert_box");
    var msg_head = document.getElementById("msg_head");
    var msg_txt = document.getElementById("msg_txt");
    event.preventDefault();
    var form = $(this);
//   console.log( $( this ).serialize() );
  $.ajax({
           type: "POST",
           url: "ajax/dep_create.php",
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                if(data == 'error'){
                    alert_box.className = 'alert alert-danger alert-dismissible fade show';
                    msg_head.innerHTML= 'Error !!';
                    msg_txt.innerHTML= 'พบปัญหา ไม่สามารถบันทึกข้อมูลได้ เนื่องจากรหัสแผนกซ้ำกับข้อมูลที่มีอยู่แล้วในระบบ';
                }else{
                    alert_box.className = 'alert alert-success alert-dismissible fade show';
                    msg_head.innerHTML= 'Success !!';
                    msg_txt.innerHTML= 'บันทึกข้อมูลสำเร็จ';
                }
           }
         });

});
      </script>
