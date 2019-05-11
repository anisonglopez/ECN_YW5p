<?php   
$title = "Import ECN Data";
require '../layout/header.php';
?>
<?php
set_time_limit(0); 
// header('Content-Type: text/html; charset=utf-8');
 
//Connect DB
// require '../00_config/connect.php';
 
//File สำหรับ Import
$inputFileName=$_FILES["file"]["tmp_name"];		
 
/** PHPExcel */
require_once '../../vendor/phpexcel/Classes/PHPExcel.php';
 
/** PHPExcel_IOFactory - Reader */
include '../../vendor/phpexcel/Classes/PHPExcel/IOFactory.php';
 
 
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  
 
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
 
$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];
 
$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}
 //var_dump( $namedDataArray);

foreach ($namedDataArray as $resx) {
 //Insert
//   $query = " INSERT INTO tbl_name (field1,field2,field3,field4,field5,field6) VALUES
//       (
//        '".$resx['field1']."',
//        '".$resx['field2']."',
//        '".$resx['field3']."',
//        '".$resx['field4']."',
//        '".$resx['field5']."',
//        '".$resx['field6']."'
//       )";
//   $res_i = $mysqli->query($query);
 //
}
// $mysqli->close();
?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">ผลการนำเข้าข้อมูล สำเร็จ</h1>
  <label><u>กรุณาอย่า Reresh Page </u><label class="text-danger">***ระบบจะบันทึกข้อมูลซ้ำ</label> 
  <a href="ecn.php">กรุณากดกลับไปยังหน้า ECN ที่นี่</a></label>
          <!-- Page Content -->
          <hr>

    <div class="table-responsive">
      <table class="table table-hover table-sm table-bordered " id="dataTable">
      <thead class="bg-info text-white small">
          <tr class="text-center">
          <th rowspan="2" ><p>Create Date</p></th>
            <th rowspan="2" ><p>ECN No.</p></th>
            <th rowspan="2"><p>Buddle Code</p></th>
            <th rowspan="2"><p>MINOR</p></th>
            <th rowspan="2"><p>Part No Old.</p></th>
            <th rowspan="2"><p>Part  Name Old</p></th>
            <th rowspan="2"><p>Part No. New</p></th>
            <th rowspan="2"><p>Part Name New</p></th>
            <th rowspan="2"><p>AC</p></th>
            <th rowspan="2"><p>Model Concern</p></th>
            <th rowspan="2"><p>Reason</p></th>
            <!-- <th rowspan="2" ><p>New part/Full compatible/Non</p></th> -->
            <th rowspan="2"><p>WH Management</p></th>
            <th rowspan="1" colspan="2" class="bg-warning"><p>Production</p></th>
            <th rowspan="2"><p>Effective</p></th>
            <th rowspan="2"><p>Eff Date</p></th>
            <th rowspan="2"><p>Status ECN</p></th>
            <!-- <th rowspan="1" colspan="2"><p>Actual for risk</p></th> -->
            <!-- <th rowspan="2"><p>Management stock (Apros)</p></th> -->
            <!-- <th rowspan="1" colspan="2"><p>Warehouse</p></th> -->
            <!-- <th rowspan="2"><p>Ddate</p></th> -->
            <th rowspan="1" colspan="5"  class="bg-warning"><p>Follow Up Point</p></th>
            <th rowspan="2"><p>Buyer</p></th>      
            <th rowspan="2"><p>Supplier</p></th>     
            <th rowspan="2"><p>First PO</p></th>     
            <th rowspan="2"><p>First Deliver</p></th>      
            <th rowspan="2"><p>Remark/Action</p></th>      
          </tr>
          <tr class="text-center">
              <!-- <th><p>Prod Plan</p></th> -->
              <th><p>Serial No.Break?(Y?N)</p></th>
              <th><p>Serial No.Break</p></th>
              <!-- <th><p>Planing</p></th>
              <th><p>Wearhouse</p></th> -->
              <!-- <th><p>Supply date</p></th>
              <th><p>Serial No.</p></th> -->
              <th><p>DWG.</p></th>
              <th><p>Stock Supplier</p></th>
              <th><p>Cost Supplier</p></th>
              <th><p>QA Audit</p></th>
              <th><p>Special Request</p></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($namedDataArray as $row) : ?>
        <?php
                    $created_date = DateTime::createFromFormat("d/m/Y" , $row['created_date']);
        ?>
        <tr class="small">
                <td><?=$created_date->format('d/m/Y')?></td>
                <td><?=$row['ecn_no']?></td>
                <td><?=$row['buddle_code']?></td>
                <td><?=$row['minor']?></td>
                <td><?=$row['part_no_old']?></td>
                <td><?=$row['part_name_old']?></td>
                <td><?=$row['part_no_new']?></td>
                <td><?=$row['part_name_new']?></td>
                <td><?=$row['ac']?></td>
                <td><?=$row['model_concern']?></td>
                <td><?=$row['reason']?></td>
                <td><?=$row['wh_m']?></td>
                <td><?=$row['sn_break_condit']?></td>
                <td><?=$row['sn_break']?></td>
                <td><?=$row['eff']?></td>
                <td><?=date('d/m/Y' , strtotime($row['eff_date']))?></td>
                <td><?=$row['ecn_status']?></td>
                <td><?=$row['dwg']?></td>
                <td><?=$row['stock_sup']?></td>
                <td><?=$row['cost_sup']?></td>
                <td><?=$row['qa_audit']?></td>
                <td><?=$row['sp_req']?></td>
                <td><?=$row['buyer']?></td>
                <td><?=$row['sup']?></td>
                <td><?=$row['first_po']?></td>
                <td><?=date('d/m/Y' , strtotime($row['first_deliver']))?></td>
                <td><?=$row['remark']?></td>
            </tr>
                  <?php endforeach; ?>
        </tbody>
      </table>
</div>


<?php   require '../layout/footer.php';?>
<?php
$inputFileName = '';
?>
<script>
                $(document).ready(function() {
                var table = $('#dataTable').DataTable({
                    "pageLength": 25,
                    "order": [ 2, "desc" ]
                    });
                });
</script>