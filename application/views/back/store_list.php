
<div id="page-wrapper">
    <div class="row">
         <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">All Stores</h1>
        </div>
         <!-- end  page header -->
    </div>
     <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    
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
                                    <th>Store Name</th>
                                    <th>Product Count</th>
                                    <th>Total Orders</th>
                                    <th>Revenue</th>
                                    <th>Status</th>
                                    <th>Merchant</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if(isset($all_stores)){
                                  foreach ($all_stores as $value){
                                    $i++;

                                ?>
                                <tr class="gradeC">
                                    <td><?php echo $value->store_name;?></td>
                                    <td><?php $getAllProducts = $this->ProductModel->get_all_products_store($value->id);

                                         $getAllProducts = count($getAllProducts);

                                         echo $getAllProducts;
                                    
                                    ?></td>
                                    <td><?php $getAllOrders = $this->InvoiceModel->get_orders_store($value->id);

                                                            $getAllOrders  = count($getAllOrders);

                                                            echo $getAllOrders;

                                                            ?></td>
                                    <td><?php $getAllOrdersAmount = $this->InvoiceModel->get_orders_store($value->id);

                                                   $total_revenue = 0;

                                                   foreach($getAllOrdersAmount as $singleTotalOrder){
                                                    $total_revenue = $total_revenue + $singleTotalOrder->order_total;
                                                   }

                                                  echo $total_revenue;

                                                ?></td>
                                
                                    <td>
                                         <?php if($value->store_status==1){
                                            echo "Active";
                                       }elseif($value->store_status==0){
                                             echo "Offline";
                                       }?>
                                    </td>
                                    <td><?php $merchant_details = $this->MerchantModel->get_merchant($value->merchant_id);
                                       echo $merchant_details->first_name . "  ".$merchant_details->last_name;
                                    ?></td>
                                   <td>
                                        <a class="btn btn-info" href="<?php echo base_url()?>edit-product/">Edit</a>
                                        <a class="btn btn-danger" href="<?php echo base_url()?>delete-product/.">Delete</a>
                                    </td> 
                                    
                                </tr>
                                <?php }} ?>
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