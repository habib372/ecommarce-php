<?php   
  
   if(isset($_POST["btnDel"])){
     
      $id=$_POST["txtId"];   
     // print_r($id);   
      Supplier::delete($id);

   }


   if(isset($_POST["btnSaveChange"])){      
      //print_r($_POST); 
      $id=$_POST["txtId"];
      $name=$_POST["txtName"];
      $phone=$_POST["txtPhone"];
      $email=$_POST["txtEmail"];
      $address=$_POST["txtAddress"];
      $city=$_POST["txtCity"];

      
     // echo $inactive;
      $supplier=new Supplier($name,$phone,$email,$address,$city);
      $supplier->update($id); 

   }

   //entry supplier
   if(isset($_POST["btnSave"])){
   
      $name=$_POST["txtName"];
      $phone=$_POST["txtPhone"];
      $email=$_POST["txtEmail"];
      $address=$_POST["txtAddress"];
      $city=$_POST["txtCity"];
   
      $supplier=new Supplier($name,$phone,$email,$address,$city);
      $supplier->save();
      
   }

?>


<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Manage Supplier
               <button type='button' class='btn btn-info' name='btnEdit'  data-toggle='modal' data-target='#entry-supplier'>Entry Supplier</i></button>

            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Supplier</li>
            </ol>
         </div>
      </div>
   </div>
</div>

<!--create supplier-->
<div class="modal" id="entry-supplier">
   <div class="modal-dialog">
      <div class="modal-content">
      <form action="#" id="edit-form" class="form-horizontal" method="post">
      <div class="modal-header">
              <h4 class="modal-title">Entry Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
         </div> 
      <div class="modal-body">
      <?php echo text_field("Supplier_Name","txtName","company name"); ?>
      <?php echo text_field("Phone","txtPhone","+88 xxxxxxx"); ?>
      <?php echo text_field("Email","txtEmail","abc@xxxxxx"); ?>
      <?php echo text_field("Address","txtAddress","conpany address"); ?> 
      <?php echo text_field("City","txtCity","city"); ?> 
      

      </div>
      <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <input type="submit" name="btnSave" value="Save" class="btn btn-primary"/>
     </div>
     </form>

      </div>
   </div>
</div>
<!--End create supplier-->


<!------------show tables----------------->
<div class="content">
   <div class="container">
     
      <div class="row">
         <div class="col-sm-12">
            
            
             <div class="card card-info">
              
               <div class="card-header">
                 <h3 class="card-title">Manage Supplier</h3>
              </div>

               <div class="card-body">              
                    
                 
                   <table class="table table-striped">
                    <?php
                    echo "<thead><tr>";
                    echo "<th> Id </th>";
                    echo "<th> Name </th>"; 
                    echo "<th> Phone  </th>";
                    echo "<th> Email</th>";
                    echo "<th> Address</th>";
                    echo "<th> City</th>";
                    echo "<th> Delete/Edit</th>";
                    echo "</tr></thead>";
                    $page=isset($_GET["p"])?$_GET["p"]:1;
                       
                    
                        $suppliers=SupplierView::get_suppliers($page);               

                       foreach($suppliers["data"] as $supplier){
                        echo "<tr>";
                         echo "<td>$supplier->id</td>";
                         echo "<td>$supplier->supplier_name</td>";
                         
                         echo "<td>$supplier->phone</td>";
                         echo "<td>$supplier->email</td>";
                         echo "<td>$supplier->address</td>";
                         echo "<td>$supplier->city</td>";
                         echo "<td>";
                                                     
                            echo "<div class='btn-group'>";
                             action_delete($supplier->id);
                             $json=json_encode(["id"=>"$supplier->id","name"=>"$supplier->supplier_name","phone"=>"$supplier->phone","email"=>"$supplier->email","address"=>"$supplier->address","city"=>"$supplier->city"]);
                             echo "<from action='#' method='post'> <button type='button' class='btn btn-success btn-sm btn-edit' name='btnEdit' value='edit' data-toggle='modal' data-target='#supplier-edit' data-json='$json'><i class='far fa-edit'></i></button></form>";
                            echo "</div>";
                         echo "</td>";
                        echo "</tr>";
                        }
                       
                    ?>                  
                   </table>

                   <?php
                        echo $suppliers["pagination"];
                   ?>
                   
                </div>                
             </div>
                 
         </div>  
      </div>
   </div>
</div>


<!-------------edit modal--------------------->
<div class="modal" id="supplier-edit">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
      <form action="#" id="supplier-edit-form" class="form-horizontal" method="post">
         <div class="modal-header">
               <h4 class="modal-title">Edit-Supplier</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body">
            
                      <!-- <?php echo isset($message)?$message:"" ?>
                      <?php echo isset($error)?$error:"" ?>   -->
                      
                   <input type="hidden" name="txtId" id="txtId"  />                                 
                   <?php echo text_field("Supplier_Name","txtName","Enter name"); ?>
                   <?php echo text_field("Phone","txtPhone","+88 0xxxxxxxx"); ?>   
                   <?php echo text_field("Email","txtEmail","Enter mail"); ?> 
                   <?php echo text_field("Address","txtAddress","Enter address"); ?>
                   <?php echo text_field("City","txtCity","Enter City"); ?>


      </div>
      <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" name="btnSaveChange" class="btn btn-primary">Save changes</button>
      </div>
      </form>
         
      

      </div>
   </div>
</div>
<script>
  $(function(){

     $(".btn-edit").on("click",function(){

     
        
        let record=$(this).data("json");
        $("#supplier-edit-form").find("#txtId").val(record.id)
        $("#supplier-edit-form").find("#txtName").val(record.name)
        $("#supplier-edit-form").find("#txtPhone").val(record.phone)
        $("#supplier-edit-form").find("#txtEmail").val(record.email)
        $("#supplier-edit-form").find("#txtAddress").val(record.address)
        $("#supplier-edit-form").find("#txtCity").val(record.city)

      

     });
  });
</script>