<?php   
$title = "Create ECN";
require '../layout/header.php';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Create ECN</h1>
          <!-- Page Content -->
          <hr>
<div id="alert_box" class="alert alert-success  fade " style="display: none;">
  <strong id="msg_head"></strong><p id="msg_txt"></p>
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

<form method="post">
  <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 m-0 font-weight-bold text-primary">
          <p>สร้างข้อมูล ECN</p>
          
      </div>
      <div class="col-md-6 text-right">

      <button   type="reset" class="btn btn-info" onclick="location.reload();" >Create New</button>
      <button  type="reset" class="btn btn-facebook" onclick="location.href='ecn.php';">Back</button>
        <button  id='save' type="submit" class="btn btn-success">Save</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
                  <!-- id -->
                  <input type="hidden" id="ecn_id" name='ecn_id' />
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Create Date</label>
                        <input type="text"  name="created_date" value="<?=date("d/m/Y")?>" class="form-control"  placeholder="Create Date">
                        </div>
                        <script>
                          $('input[name="created_date"]').daterangepicker({
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

                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Reason</label>
                        <textarea name="reason" class="form-control"  placeholder="Reason" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                        <label>WH Management</label>
                        <textarea name="wh_m" class="form-control"  placeholder="WH Management" rows="5"></textarea>
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>S/N Break ?</label> <span class="text-danger">*</span>
                        <select class="form-control" name="sn_break_condit"  >
                              <option value="">Select</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                              </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label>S/N Break</label>
                        <input type="text" name="sn_break" class="form-control"  placeholder="S/N Break">
                        </div>
                    </div>

                       <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Effective </label> <span class="text-danger">*</span>
                        <select class="form-control" name="eff"  >
                              <option value="">Select</option>
                                        <option value="Effective">Effective</option>
                                        <option value="No-Effective">No-Effective</option>
                              </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Effective Date</label>
                        <input type="text"  name="eff_date" value="<?=date("d/m/Y")?>" class="form-control"  placeholder="Create Date">
                        <script>
                          $('input[name="eff_date"]').daterangepicker({
                            singleDatePicker: true,
                            locale: {  format: 'DD/MM/YYYY' }  
                          });
                        </script>
                        </div>
                    </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>ECN Status</label> <span class="text-danger">*</span>
                        <select class="form-control" name="ecn_status"  >
                              <option value="">Select</option>
                                        <option value="Closed">Closed</option>
                                        <option value="Follow_up">Follow up</option>
                              </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label>DWG</label>
                        <input type="text" name="dwg" class="form-control"  placeholder="DWG">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Stock Supplier</label> <span class="text-danger">*</span>
                        <input type="text" name="stock_sup" class="form-control"  placeholder="Stock Supplier">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Cost Supplier</label>
                        <input type="text" name="cost_sup" class="form-control"  placeholder="Cost Supplier">
                        </div>
                    </div>

                       <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>QA Audit</label>
                        <input type="text" name="qa_audit" class="form-control"  placeholder="QA Audit">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Speacial Request</label>
                        <input type="text" name="sp_req" class="form-control"  placeholder="Speacial Request">
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Buyer</label>
                        <input type="text" name="buyer" class="form-control"  placeholder="Buyer">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Supplier</label>
                        <input type="text" name="sup" class="form-control"  placeholder="Speacial Request">
                        </div>
                    </div>

                       <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>First PO</label>
                        <input type="text" name="first_po" class="form-control"  placeholder="First PO">
                        </div>
                        <div class="form-group col-md-6">
                        <label>First Deliver</label>
                        <input type="text"  name="first_deliver" value="<?=date("d/m/Y")?>" class="form-control"  >
                        <script>
                          $('input[name="first_deliver"]').daterangepicker({
                            singleDatePicker: true,
                            locale: {  format: 'DD/MM/YYYY' }  
                          });
                        </script>
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Remark / Action</label>
                        <textarea name="remark" class="form-control"  placeholder="Remark / Action" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                      
                        </div>
                    </div>

    </div>
  </div>
</div>
</form>
              <!-- end card -->
<?php   require '../layout/footer.php';?>
<script src="js/ecn_create.js"></script>
