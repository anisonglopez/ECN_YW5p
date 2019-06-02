<?php   
$title = "DWG Control";
require '../layout/header.php';
$tbl_dwg = '31_dwg_control';
try{
  $statement = $pdo->prepare("SELECT *  FROM $tbl_dwg
   WHERE dwg_trash = 0 ");
  $statement->execute();
  $result = $statement->fetchAll();
} //try
catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
}
?>
          <!-- Page Content -->
          <h1><?=$title ?></h1>
          <hr>
          <div id="alert_box" class="alert alert-success  fade " style="display: none;">
  <strong id="msg_head"></strong><p id="msg_txt"></p>
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
        <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-success" onclick="location.href='dwg_create.php';">Create New</button>
                    <button class="btn btn-primary">Load Excel File</button>
                    <button class="btn btn-primary">Import Data</button>
                    <button class="btn btn-primary">Export Data</button>
                </div>
        </div>
        <br>
        <div class="table-responsive">
      <table class="table table-hover table-sm small" id="dataTable">
        <thead class="bg-info text-white">
          <tr>
            <th>Drawing No.</th>
            <th>Minor</th>
            <th>Part Name</th>
            <th>Memo Part List</th>
            <th>QA Chart/Std. Perf.</th>
            <th>Part DWG</th>
            <th>Gen. DWG</th>
            <th>Mat. DWG</th>
            <th>Pages</th>
            <th>Remark</th>
            <th>PC Received Date</th>
            <th>Distribute Date</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
                  <tr id="<?php echo ($row["dwg_id"]); ?>">
                    <td><?php echo ($row["dwg_no"]); ?></td>
                    <td><?php echo ($row["minor"]); ?></td>
                    <td><?php echo ($row["part_name"]); ?></td>
                    <td><?php echo ($row["memo_part_list"]); ?></td>
                    <td><?php echo ($row["qa_chart"]); ?></td>
                    <td><?php echo ($row["part_dwg"]); ?></td>
                    <td><?php echo ($row["gen_dwg"]); ?></td>
                    <td><?php echo ($row["mat_dwg"]); ?></td>
                    <td><?php echo ($row["pages"]); ?></td>
                    <td><?php echo ($row["remark"]); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["pc_recive_date"])); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["distribute_date"])); ?></td>
                    <td class="text-center"><a href="dwg_change.php?id=<?php echo base64_encode($row["dwg_id"]); ?>" class="btn btn-outline-warning btn-sm"><span class="fas fa-edit fa-fw"></span></a> 
                    <!-- <a id="button"  href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='dep_delete.php?id=<?php echo base64_encode($row["dep_id"]);?>';}"  class="btn btn-outline-danger btn-sm"><span class="fas fa-trash fa-fw"></span></a> -->
                    <button id="<?php echo ($row["dwg_id"]); ?>"    class="btn btn-outline-danger btn-sm btndelete" ><span class="fas fa-trash fa-fw"></span></button>
                  </td>
                  </tr>
                  <?php endforeach; ?>
        </tbody>
      </table>
      </div>
<?php   require '../layout/footer.php';?>
<script>
        $(document).ready(function() {
        var table = $('#dataTable').DataTable({
        stateSave: true,
        "pageLength": 25,
        "order": [ 0, "asc" ]
        });
        $('#dataTable tbody').on( 'click', 'tr', function () {
                        if ( $(this).hasClass('selected') ) {
                            $(this).removeClass('selected');
                        }
                        else {
                            table.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                    });
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
               url: "ajax/dwg_delete.php",
               data:{_id:_id},
               success: function(data)
               {
                $('#alert_box').show();
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
    });
    $(function(){
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).hide();
        });
    });
 });
</script>