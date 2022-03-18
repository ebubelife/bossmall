
<div id="page-wrapper">
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alaye Philips</h4>
      </div>
      <div class="modal-body">
       <p class="merch-details">Email: merchant1@gmail.com</p>
       <p class="merch-details">Phone Number: 09030432212</p>
       <h3>Bank Information</h3>
       <p class="merch-details">Account Name: Alaye Philips</p>
       <p class="merch-details">Account No: 2245667711</p>
       <p class="merch-details">Bank: Access Bank</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div class="row">
         <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
         <!-- end  page header -->
    </div>
     <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     Product Tables
                </div>
                <p class="text-success"> <?php if(isset($success_message)){
                  echo $success_message;
                 }?>
                 </p>
                 <div class="alert alert-success">
    <?php //echo $this->session->flashdata('flsh_msg'); ?>
        <h4 class="success"><?php echo $this->session->flashdata('product_delete')?></h4>
    <?php echo $this->session->flashdata('flsh_msg'); ?>
</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                   
                                    <th>Merchant Name</th>
                                    <th>Stores</th>
                                    <th>Merchant Income</th>
                                    <th>Successful Payous</th>
                                    <th>Pending Payment</th>
                                    <th>Succesful Deliveries</th>
                                    <th>Returned Goods</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                             if(isset($all_merchants)){
                                foreach ($all_merchants as $value){
                                  
                            ?>

                              <tr class="gradeC">
                                    
                              
                              <td class="full-detail-trigger" data-toggle="modal" data-target="#myModal"><?php echo $value->first_name?> <?php echo $value->last_name?></td>
                              <td>2</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>12356</td>
                              <td>
                                        <a class="btn btn-info" href="<?php echo base_url()?>edit-product/<?php ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="<?php echo base_url()?>delete-product/<?php ?>"><i class="fa fa-exclamation-triangle"></i></a>
                                    </td> 
                                    
                                </tr>
                                <?php }
                             } ?>

                </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
</div>
    <script src="<?php echo base_url()?>assets/back/plugins/dataTables/jquery.dataTables.js"></script>
   
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script> 