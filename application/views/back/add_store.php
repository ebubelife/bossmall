
<script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Add New Store</h1>
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
                    Add new Store
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                             <?php echo form_open_multipart('new-store','');?>

                             <div class="form-group">
                  <label for="groups">Category</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option >Select Category</option>
                    <?php foreach ($category as $k): ?>
                      <option value="<?php echo $k['id'] ?>"><?php echo $k['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                                <div class="form-group">
                                    <label>Store Name:</label>
                                    <input type="text" class="form-control" value="" name="pro_name" required="">
                                </div>

                                <div class="form-group">
                                    <label>Store Description:</label>
                                    <textarea class="form-control" value="" name="desc" required="">Description</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea class="form-control" value="" name="address" required="">Address</textarea>
                                </div>
                                <div class="form-group">
                                    <label>City:</label>
                                    <input type="text" class="form-control" value="" name="city" required="">
                                </div>
                                <div class="form-group">
                                    <label>State:</label>
                                    <input type="text" class="form-control" value="" name="state" required="">
                                </div>
                                <div class="form-group">
                  <label for="groups">Country</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option value="">Select Country</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
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


