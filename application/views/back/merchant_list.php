
<div id="page-wrapper">
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
                                    <th>Serial No</th>
                                    <th>Merchant Name</th>
                                    <th>Stores</th>
                                    <th>Merchant Income</th>
                                    <th>Successful Payout</th>
                                    <th>Pending Payment</th>
                                    <th>Succesful Deliveries</th>
                                    <th>Returned Goods</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
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