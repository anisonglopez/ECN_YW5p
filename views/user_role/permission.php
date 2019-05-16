<?php   
$title = "Permission";
require '../layout/header.php';
$tbl_role = '01_role';
try{
  $statement = $pdo->prepare("SELECT *  FROM $tbl_role
   WHERE role_trash = 0 ");
  $statement->execute();
  $result = $statement->fetchAll();
} //try
catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
}
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Permission</h1>
          <!-- Page Content -->
          <hr>
   <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 text-primary">
          จัดการข้อมูลสิทธิ์การใช้งาน
      </div>
      <div class="col-md-6 text-right">
        <button class="btn btn-success"onclick="location.href='permission_create.php';">Create new</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
<div class="table-responsive">
  <div class="card-body">
    <div class="col-md-12">
      <table class="table table-hover table-sm small" id="dataTable">
        <thead class="bg-info text-white">
          <tr>
            <th>Role Id</th>
            <th>Role Name</th>
            <th>Note</th>
            <th>Active</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
                  <tr id="<?php echo ($row["role_id"]); ?>">
                  <td><?php echo ($row["role_id"]); ?></td>
                    <td><?php echo ($row["role_name"]); ?></td>
                    <td><?php echo ($row["role_note"]); ?></td>
                    <td><?php echo  ($row["role_active"] == 1? '<span class="fas fa-check-circle fa-fw" style="color: green;"></span>' : '<span class="fas fa-minus-circle fa-fw" style="color: red;"></span>'); ?></td>
                    <td class="text-center"><a href="permission_change.php?id=<?php echo base64_encode($row["role_id"]); ?>" class="btn btn-outline-warning btn-sm"><span class="fas fa-edit fa-fw"></span></a> 
                    <button id="<?php echo ($row["role_id"]); ?>"    class="btn btn-outline-danger btn-sm btndelete" ><span class="fas fa-trash fa-fw"></span></button>
                  </td>
                  </tr>
                  <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
<!-- end card -->
<div id="alert_box" class="alert alert-success alert-dismissible fade "   role="alert">
  <strong id="msg_head"></strong><p id="msg_txt"></p>
</div>
<?php   require '../layout/footer.php';?>
<script>
      // Call the dataTables jQuery plugin
      $(document).ready(function() {
        var alert_box = document.getElementById("alert_box");
        var msg_head = document.getElementById("msg_head");
        var msg_txt = document.getElementById("msg_txt");
    
      var table = $('#dataTable').DataTable();
    $('#dataTable tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
          } );
        $('#dataTable tbody').on( 'click', '.btndelete', function () {
    
          var _id = this.id;
          var result = confirm("Want to delete?");
            if (result) {
              table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
              $.ajax({
               type: "POST",
               url: "ajax/permission_delete.php",
               data:{_id:_id},
               success: function(data)
               {
                 console.log(data);
                    if(data == 'error'){
                        alert_box.className = 'alert alert-danger alert-dismissible fade show';
                        msg_head.innerHTML= 'Error !!';
                        msg_txt.innerHTML= 'พบปัญหา ไม่สามารถลบข้อมูลได้ กรูราติดต่อเจ้าหน้าที่ ที่เกี่ยวข้อง';
                    }else{
                        alert_box.className = 'alert alert-success alert-dismissible fade show';
                        msg_head.innerHTML= 'Success !!';
                        msg_txt.innerHTML= 'ลบข้อมูลสำเร็จ';
                    }
               }
             });
            }
          
    } );
    });
</script>