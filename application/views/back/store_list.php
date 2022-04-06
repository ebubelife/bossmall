
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
                                         <?php if($value->store_status==1){?>
                                            <a class="store_state" data-store-id="<?php  echo $value->id ?>" style="color:#06B106;cursor:pointer">Online</a>  
                                      <?php }elseif($value->store_status==0){?>

                                       <a class="store_state" data-store-id="<?php  echo $value->id ?>" style="color:#666565;cursor:pointer">Offline</a>
                                            
                                      <?php }?>
                                              <br>

                                              <?php if($value->admin_approve==1){?>
                                                <a class="admin_status"  data-store-id="<?php  echo $value->id ?>" style="color:#06B106;cursor:pointer">Active</a>  
                                      <?php }elseif($value->admin_approve==0){?>
                                        <a class="admin_status" data-store-id="<?php  echo $value->id ?>" style="color:#B12006;cursor:pointer">Processing</a>
                                            
                                     <?php  }?>-

                                     <?php if($value->queried==0 && $value->admin_approve==0){?>
                                        <a class="queried" data-store-id="<?php  echo $value->id ?>" style="color:#4F0DB8;cursor:pointer">Query </a>
                                            
                                     <?php  }?>

                                     <?php if($value->queried==1 && $value->admin_approve==0){?>
                                        <a class="queried" data-store-id="<?php  echo $value->id ?>" style="color:#4F0DB8;cursor:pointer">Queried </a>
                                            
                                     <?php  }?>

                                    </td>
                                    <td><?php $merchant_details = $this->MerchantModel->get_merchant($value->merchant_id);
                                       echo $merchant_details->first_name . "  ".$merchant_details->last_name;
                                    ?></td>
                                   <td>
                                        <a class="btn btn-info" href="<?php echo base_url()?>edit-store/<?php echo $value->id ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="<?php echo base_url()?>delete-store/12"><i class="fa fa-exclamation-triangle"></i></a>
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
            var url = document.location.origin;

            $(".store_state").click(function(){
                let store_status_s = $(this).text();
                let store_id = $(this).data("store-id");

               
                if(store_status_s === "Online"){
                    let store_details = [0,store_id];

                    $.ajax({ url: url+"/bmall/store/change_store_status",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
            
                        window.location.reload();
         
        }
                   });
                }//end if
                
                if(store_status_s === "Offline"){
                    let store_details = [1,store_id];

                    $.ajax({ url: url+"/bmall/store/change_store_status",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
            
                        window.location.reload();
         
        }
                   });
                }

            });

            /************************Set admin approve for store **********************/

            
            $(".admin_status").click(function(){
                let store_status_s = $(this).text();
                let store_id = $(this).data("store-id");

               
                if(store_status_s === "Active"){
                    let store_details = [0,store_id];

                    $.ajax({ url: url+"/bmall/store/change_admin_approve",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
                      //  alert(response);
                        window.location.reload();
         
        }
                   });
                }//end if
                
                if(store_status_s === "Processing"){
                    let store_details = [1,store_id];

                    $.ajax({ url: url+"/bmall/store/change_admin_approve",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
            
                    // alert(response);
                        window.location.reload();
         
        }
                   });
                }

            });

            /************************Set query status for store **********************/

            
            $(".admin_status").click(function(){
                let store_status_s = $(this).text();
                let store_id = $(this).data("store-id");

               
                if(store_status_s === "Queried"){
                    let store_details = [0,store_id];

                    $.ajax({ url: url+"/bmall/store/change_admin_approve",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
                      //  alert(response);
                        window.location.reload();
         
        }
                   });
                }//end if
                
                if(store_status_s === "Query"){
                    let store_details = [1,store_id];

                    $.ajax({ url: url+"/bmall/store/change_admin_approve",
                    type: "POST", 
                    data: { data: JSON.stringify(store_details) },
                    success: function(response) {
            
                    // alert(response);
                        window.location.reload();
         
        }
                   });
                }

            });
        });


    </script> 