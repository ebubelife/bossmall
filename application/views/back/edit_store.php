
<script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Edit Store</h1>
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
                   <h3> Edit Store <i class="fa fa-chevron-right"></i> <span style="color:#702222"><?php echo $stores->store_num ?></span></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                             <?php echo form_open_multipart('update-store-details/'.$stores->id,'');?>

                                                          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Merchant</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
                                    <label>Merchant Name Here</label>
                                    <input type="text" class="form-control" value="" name="search_merchant_name" id="search_merchant_name" required="" data-toggle="modal" data-target="#myModal">
                                </div>
      </div>

      <div id="all_names_here">

      <p class="cl"></p>

     
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Select Merchant</button>
      </div>
    </div>

  </div>
</div>

                             <div class="top-bg-change" style="background-image:url('http://localhost/bmall/assets/front/images/shop/header_backgrounds/header_8.jpg');">
                    <div>

                    <p class="text-center" style="color:#ffffff;"  data-toggle="modal" data-target="#header_bg_modal">[ Select custom header ]</p>
          </div>
          </div><br>
          <div class="form-group">
                                    <label>Merchant Name:</label>
                                    <input type="text" class="form-control" value="" name="merchant_name" id="merchant_name" required data-toggle="modal" data-target="#myModal">
                                </div>
                           
                            <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" id="category" name="category" style="width:100%">
                    <option >Select Category</option>
                    <?php foreach ($all_cat as $k): ?>
                      <option value="<?php echo $k->category_id ?>"><?php echo $k->category_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                                <div class="form-group">
                                    <label>Store Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $stores->store_name ?>" name="store_name" required="">
                                </div>

                                <div class="form-group">
                                    <label>Store Description:</label>
                                    <textarea class="form-control" name="store_description" required=""><?php echo $stores->store_description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea class="form-control"  name="store_address" required=""><?php echo $stores->store_address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>City:</label>
                                    <input type="text" class="form-control" value="<?php echo $stores->city ?>" name="city" required="">
                                </div>
                                <div class="form-group">
                                    <label>State:</label>
                                    <input type="text" class="form-control" value="<?php echo $stores->state ?>" name="state" required="">
                                </div>
                                <div class="form-group">
                                    <label>Zip code:</label>
                                    <input type="text" class="form-control" value="<?php echo $stores->zip_code ?>" name="zip" optional>
                                </div>
                                <div class="form-group">
                  <label for="country">Country</label>
                  <select class="form-control" id="country" name="country" style="width:100%">
                    <option>Select Country</option>
                    <?php for ($i = 0; $i< count($countries); $i++){ ?>
                      <option value="<?php echo $countries[$i]; ?>"><?php echo $countries[$i]; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-check">
  <input class="form-check-input" type="radio" name="sell_globally" value="1" id="flexRadioDefault1" checked>
  <label class="form-check-label" for="flexRadioDefault1">
  Sell Globally
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="sell_globally" value="0" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
  Sell Only To The Country You Selected
  </label>
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
<script>
 

   let search_user_url = window.location.origin + "/bmall/search-user";
   $("#search_merchant_name").keyup(function(){
       let search_data = $(this).val();

       if(search_data.length > 0){
    $.ajax({   
				type: 'POST',  
				url: search_user_url, 
				data:  {p_data:JSON.stringify(search_data)},
				success: function(response) {

                  //  alert(response);

                    parsedResponse = JSON.parse(response);
                    let text = "";

                
                    $(".cl").siblings().css({"color": "red", "border": "2px solid red"});
                // Display the array elements
                for(var i = 0; i < parsedResponse.length; i++){
                   let parsedJSON =  JSON.stringify(parsedResponse[i]);
                   //let Obj = JSON.parse(parsedResponse[i]);

                   const obj = JSON.parse(parsedJSON);

                   let user_id = obj.id;

                  

                   text +=  "<p class='single-item' id='"+user_id +"'  onclick='myFunction(this)'>"+ obj.first_name + " "+obj.last_name+ " " +obj.other_names+ "</p>";
                   
                   
                                                  
				}
                $("#all_names_here").html(text) ;
            }
			});
    }
});

  
  function myFunction(element){
     //alert( $(element).attr("id"));

  

     let id = $(element).attr("id");
     let cookie_user_url = window.location.origin + "/bmall/add-cookie-id";

     let input_content = $(element).text();

     $.ajax({   
				type: 'POST',  
				url: cookie_user_url, 
				data:  {p_data:JSON.stringify(id)},
				success: function(response) {

          $(".single-item").css("color","#494949");
          $(element).css("color","#C05E0D");
               //  alert(response);

                 $("#merchant_name").val(input_content);
        }
     });

  }

                                       

    </script>



