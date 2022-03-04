
<script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Forms Element</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
              <?php echo $this->session->flashdata('flsh_msg'); ?>
               <h4 class="error">
                    <?php $msg = $this->session->userdata('error_image');
                        echo $msg;
                        $this->session->unset_userdata('error_image');
                     ?>                       
                </h4>
                <div class="panel-heading">
                    Add new Merchant
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                             <?php echo form_open_multipart('save-product','');?>
                                <div class="form-group">
                                    <label>Merchant Name:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>

                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>

                                <div class="form-group">
                                    <label>Whatsapp Phone:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>

                                <h3>Bank Information</h3>

                                <div class="form-group">
                                    <label>Select Bank</label>
                                    <select class="form-control" name="pro_status">
                                        <option>Select One</option>

                                        <?php if($banks){
                                            foreach($banks as $bank){
                                            ?>
                                        <option value="<?php echo $bank ;?>"><?php echo $bank ;?></option>
                                        <?php
                                        
                                            }}?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Bank Account Name:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>

                                <div class="form-group">
                                    <label>Account Number:</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required="">
                                </div>


                                 
                                 
                                <button type="submit" class="btn btn-primary">Save</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->


