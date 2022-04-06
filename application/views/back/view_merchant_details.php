<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <!-- Main content -->
    <section class="content" style="margin-left:400px;">
      <div class="row">
        <div class="col-md-6 col-xs-6">

          <div class="card">
		  <div class="card-header">
                <h3 class="card-title">&nbsp;</h3>

                <div class="card-tools">
                  <a href="<?php echo base_url('users/setting');?>" class="btn btn-block btn-primary">Edit Profile</a>
                </div>
              </div>
		 
            <!-- /.card-header -->
            <div class="panel-body">
                    <div class="table-responsive">
              <table class="table table-bordered table-condensed table-hovered">
               
                <tr>
                  <th>Email</th>
                  <td><?php echo $merchant_data->email; ?></td>
                </tr>
                <tr>
                  <th>First Name</th>
                  <td><?php echo $merchant_data->first_name; ?></td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td><?php echo $merchant_data->last_name; ?></td>
                </tr>
               
                <tr>
                  <th>Phone</th>
                  <td><?php echo $merchant_data->phone; ?></td>
                </tr>
              
              </table>
            </div></div></div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>


  <script type="text/javascript">
    $(document).ready(function() {
      $("#profileMainNav").addClass('active');
    });
  </script>

