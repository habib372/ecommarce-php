

<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Purchase Details
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Details</li>
            </ol>
         </div>
      </div>
   </div>
</div>


<div class="content"> 
  <div class="container"> 
    <div class="card "> 
      <div class="row p-2">
        <div class="col-sm-12">               
          <!--------title ---- -->
          <div class="row">
            <div class="col-12">
              <h2 class="page-header" style="text-align:center">
                <img src="img/logo2.jpg" alt="logo2" class="brand-image img-circle" style="opacity:.8; height:40px; width:40px">
                <span class="brand-text " style="color:black; padding-top:10px">BikeBD</span>
              </h2>
              <h6 class="page-body" style="text-align:center; padding-left:20px;">Most Popular Bike Portal of Bangladesh</h6>
              <!---------validatin message------------>
              <span style="text-align:center"><?php echo isset($message)?$message:"" ?></span>
            <hr style="width:300px; padding-left:60px">

              <div class="card-body p-1">
                <!-- -----View table ---------->
                <div class="col-md-12 table-responsive ">
                  <table class="table text-center">
                    <thead>     
                      <tr style="background-color:#EDEEF0">
                        <th >SN</th>
                        <th>Purchase-date</th>
                        <th>Due-date</th>
                        <th>Quantity</th>
                        <th>Total-amount</th>
                        <th>Payment</th>
                        <th>Due</th>
                        <th>Reference</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>   
                      <?php
                          
                          $purchase=NewPurchase::view_purchase();               
                      
                          foreach($purchase as $prcs){
                          echo "<tr>";
                          echo "<td class='text-center'>$prcs->id</td>";
                          echo "<td class='text-center'>$prcs->purchase_date</td>";
                          echo "<td class='text-center'>$prcs->purchase_duedate</td>";
                          echo "<td class='text-center'>$prcs->Total_amount</td>";
                          echo "<td class='text-center'>$prcs->Payment</td>";
                          echo "<td class='text-center'>$prcs->due</td>";
                          echo "<td class='text-center'>$prcs->reference</td>";
                          echo "<td>";

                            echo "<a href='details?purchase_id=$prcs->id'><button type='button' class='btn btn-primary btn-sm btn-details'>details</button></a>";

                              echo "<div class='btn-group'>";
                              //$json=json_encode(["id"=>"$vendor->id","vname"=>"$vendor->vendor_name","purchase_date"=>"$vendor->purchase_date","ref"=>"$vendor->ref_no","vid"=>"$vendor->vcid"]);                        
                              echo "<button type='button' class='btn btn-success btn-sm btn-edit' data-toggle='modal' data-target='#vendor-edit' data-id='$prcs->id'><i class='far fa-edit'></i></button>";
                                action_delete($prcs->id);
                              echo "</div>";
                            echo "</td>";
                          echo "</tr>";
                        }
                          
                      ?>                  
                    </tbody>
                  </table>
                </div>            
              </div><!---card body close---->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
