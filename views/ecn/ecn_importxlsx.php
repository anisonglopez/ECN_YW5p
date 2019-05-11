<?ob_start();?>
<?php   
$title = "Import ECN Data";
require '../layout/header.php';
?>
<?php
try{


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

// foreach ($namedDataArray as $resx) {
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
// }
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
            <?php 
         $i = 2;
        foreach ($namedDataArray as $row) : 
                    try{
                        $created_date = $row['created_date'];
                        $created_date = str_replace('/', '-', $created_date);
   
                    if (($timestamp = strtotime($created_date)) === false) {
                        echo '<p class="small text-danger">Row ที่ '.$i.' Column Created Date มีค่าข้อมูล ('.$created_date.') ประเภทข้อมูลไม่ถูกต้อง ..!! format = dd/mm/yyyy
                        </p>
                        ';
                        $created_date = '';
                       // header("location: ../base/404.php");
                       // exit();
                    } else {
                        //echo "$created_date == " . date('l dS \o\f F Y h:i:s A', $timestamp);
                    }

                       

                    }              
                    catch (PDOException $e) {
                        echo 'sd';
                        print $e->getMessage();
                        }
                    //insert
                    // try{
                    //     $datalist =[
                    //         "ecn_no"        => htmlspecialchars($_POST['ecn_no']),
                    //           "created_date"        => $created_date->format('Y-m-d'),
                    //           "buddle_code"        => htmlspecialchars($_POST['buddle_code']),
                    //           "minor"        => htmlspecialchars($_POST['minor']),
                    //           "part_no_old"        => htmlspecialchars($_POST['part_no_old']),
                    //           "part_name_old"        => htmlspecialchars($_POST['part_name_old']),
                    //           "part_no_new"        => htmlspecialchars($_POST['part_no_new']),
                    //           "part_name_new"        => htmlspecialchars($_POST['part_name_new']),
                    //           "ac"        => htmlspecialchars($_POST['ac']),
                    //           "model_concern"        => htmlspecialchars($_POST['model_concern']),
                    //           "reason"        => htmlspecialchars($_POST['reason']),
                    //           "wh_m"        => htmlspecialchars($_POST['wh_m']),
                    //           "sn_break_condit"        => htmlspecialchars($_POST['sn_break_condit']),
                    //           "sn_break"        => htmlspecialchars($_POST['sn_break']),
                    //           "eff"        => htmlspecialchars($_POST['eff']),
                    //           "eff_date"        => $eff_date->format('Y-m-d'),
                    //           "ecn_status"        => htmlspecialchars($_POST['ecn_status']),
                    //           "dwg"        => htmlspecialchars($_POST['dwg']),
                    //           "stock_sup"        => htmlspecialchars($_POST['stock_sup']),
                    //           "cost_sup"        => htmlspecialchars($_POST['cost_sup']),
                    //           "qa_audit"        => htmlspecialchars($_POST['qa_audit']),
                    //           "sp_req"        => htmlspecialchars($_POST['sp_req']),
                    //           "buyer"        => htmlspecialchars($_POST['buyer']),
                    //           "sup"        => htmlspecialchars($_POST['sup']),
                    //           "first_po"        => htmlspecialchars($_POST['first_po']),
                    //           "first_deliver"        => $first_deliver->format('Y-m-d'),
                    //           "remark"        => htmlspecialchars($_POST['remark']),
                    //           //"ecn_created_by"        => $user_update,
                    //           //"ecn_created_date"        => $date_today,
                    //           "ecn_updated_by"        => $user_update,
                    //           "ecn_updated_date"        => $date_today
                    //       ];
                    //         $ecn_id  =  htmlspecialchars($_POST['ecn_id']);
                    //       $sql = "UPDATE $TABLE_NAME 
                    //               SET ecn_no = :ecn_no,
                    //               created_date = :created_date,
                    //               buddle_code = :buddle_code,
                    //               minor = :minor,
                    //               part_no_old = :part_no_old,
                    //               part_name_old = :part_name_old,
                    //               part_no_new = :part_no_new,
                    //               part_name_new = :part_name_new,
                    //               ac = :ac,
                    //               model_concern = :model_concern,
                    //               reason = :reason,
                    //               wh_m = :wh_m,
                    //               sn_break_condit = :sn_break_condit,
                    //               sn_break = :sn_break,
                    //               eff = :eff,
                    //               eff_date = :eff_date,
                    //               ecn_status = :ecn_status,
                    //               dwg = :dwg,
                    //               stock_sup = :stock_sup,
                    //               cost_sup = :cost_sup,
                    //               qa_audit = :qa_audit,
                    //               sp_req = :sp_req,            
                    //               buyer = :buyer,
                    //               sup = :sup,
                    //               first_po = :first_po,
                    //               first_deliver = :first_deliver,
                    //               remark = :remark,
                    //               wh_m = :wh_m,
                    //               ecn_updated_by = :ecn_updated_by,
                    //               ecn_updated_date = :ecn_updated_date
                    //               WHERE ecn_id = $ecn_id";
                    //                 $stmt = $pdo->prepare($sql);
                    //                 $stmt->execute($datalist);
                    //                 $msg_status= 'success';
                    //                 $msg_txt= 'อัปเดตข้อมูลสำเร็จ';
                    // }catch (PDOException $e) {
                    //     $msg_status= 'error';
                    //     $msg_txt=  "Error!: " . $e->getMessage();
                    // }
        ?>
        <tr class="small">
                <td><?=date('d/m/Y',strtotime($created_date))?></td>
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
                <td><?=$created_date?></td>
                <td><?=$row['ecn_status']?></td>
                <td><?=$row['dwg']?></td>
                <td><?=$row['stock_sup']?></td>
                <td><?=$row['cost_sup']?></td>
                <td><?=$row['qa_audit']?></td>
                <td><?=$row['sp_req']?></td>
                <td><?=$row['buyer']?></td>
                <td><?=$row['sup']?></td>
                <td><?=$row['first_po']?></td>
                <td><?=$created_date?></td>
                <td><?=$row['remark']?></td>
            </tr>
                  <?php $i++; endforeach; ?>
        </tbody>
      </table>
</div>
                    <?php } //end try
                    catch (PDOException $e) {
                        echo 'sd';
                        print $e->getMessage();
                         }
                    ?>

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