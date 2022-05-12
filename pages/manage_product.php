<?php
if(isset($_POST["btnDel"])){   
   $id=$_POST["txtId"];
   Product::delete($id);
}


if(isset($_POST["btnSaveChange"])){
  // print_r($_POST);
    $id=$_POST["txtId"];
    $name=$_POST["txtName"];
    $category_id=$_POST["cmbCatagory"];
    $color=$_POST["txtColor"];
    $model=$_POST["txtSize"];
    $brand=$_POST["txtBrand"];
    $price=$_POST["txtPrice"];
    $file_name=$_POST["file"];

   $Product=new Product($name,$category_id,$color,$model,$brand,$price,$file_name);
   $Product->update($id);
}

//create product
if(isset($_POST["btnSave"])){
   
   $name=$_POST["txtName"];
   $catagory_id=$_POST["cmbCatagory"];
   $color=$_POST["txtColor"];
   $model=$_POST["txtSize"];
   $brand=$_POST["txtBrand"];
   $price=$_POST["txtPrice"];

   $directory="images/";
   $file_name=$_FILES["file"]["name"];
   $file_tmp_name=$_FILES["file"]["tmp_name"];

   move_uploaded_file($file_tmp_name,$directory.$file_name);


   $product=new Product($name,$catagory_id,$color,$model,$brand,$price,$file_name);
   $product->save();
   
}

?>


<!--------------content header--------------->
<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
            Manage Product 
            <button type='button' class='btn btn-info btn-sm' name='btnEdit'  data-toggle='modal' data-target='#create-product'>Create Product</i></button>

            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Product</li>
            </ol>
         </div>
      </div>
   </div>
</div>


<!---------------table View------------------>
<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="card card-info">
               <div class="card-header">
                  <h3 class="card-title">Manage Product</h3>
               </div>

                  <div class="card-body">
                     <table class="table table-striped">
                        <?php
                        echo "<thead>
                                 <tr class='thead-light'>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Color</th>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>";
                        $page=isset($_GET["p"])?$_GET["p"]:1;
                        
                        $products=ProductView::get_products($page);

                        $id=1;
                        foreach($products["data"] as $product){
                           echo "<tr>";
                           echo "<td class='id'>$product->id</td>";
                           echo "<td><img src='images/$product->img_name' style='width:50px;height:50px;' alt='not found'></td>";
                           echo "<td>$product->product_name</td>";
                           echo "<td>$product->category_id</td>";
                           echo "<td>$product->color</td>";
                           echo "<td>$product->model</td>";
                           echo "<td>$product->brand</td>";
                           echo "<td>$product->price</td>";   
                           echo "<td>";
                           echo "<div class='btn-group'>";
                           action_delete($product->id);
                           // $json=json_encode(["id"=>"$product->id","name"=>"$product->name","category_id"=>"$product->category_id","color"=>"$product->color","size"=>"$product->size","brand"=>"$product->brand","price"=>"$product->price","img_name"=>"$product->img_name"]);
                           $json=json_encode($product);
                           echo "<from action='#' method='post'><button type='button' class='btn btn-success btn-sm btn-edit'name='btnEdit' value='edit' data-toggle='modal' data-target='#info-edit' data-json='$json'><i class='far fa-edit'></i></button></form>";
                           echo "</div>";
                           echo "</td>";
                           echo "</tr>";
                        }

                        ?>
                     </table>

                     <?php
                        echo $products["pagination"];
                     ?>

                  </div> 
               </div>
            </div>
      </div>
   </div>
</div>



<!----------creat button modal---------------->
<div class="modal" id="create-product">
   <div class="modal-dialog">
      <div class="modal-content">
      <form action="#" id="edit-product-form" class="form-horizontal" method="post" enctype="multipart/form-data" >
      <div class="modal-header">
              <h4 class="modal-title">Create Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
         </div> 
      <div class="modal-body">
      <?php echo text_field("Bike-Name","txtName","name"); ?>
<?php echo text_field("Price","txtPrice","value"); ?>
<?php

      $catagory=$db->query("select id,category_name from {$ex}categorys");
      $cata_arr=array();
      while(list($id,$name)=$catagory->fetch_row()){
      $cata_arr[$id]=$name;
      }
      echo select_box("Catagory","cmbCatagory",$cata_arr);
                    
 ?>

<?php echo text_field("Color","txtColor","color"); ?>
<?php echo text_field("Model","txtSize","Model"); ?> 
<?php echo text_field("Brand","txtBrand","brand"); ?> 
<input type="file" name="file" id="file" accept="image/*" />

      </div>
      <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <input type="submit" name="btnSave" value="Save" class="btn btn-primary"/>
     </div>
     </form>

      </div>
   </div>
</div>
<!--End button modal--->


<!----------edit Modal----------------->
<div class="modal" id="info-edit">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form action="#" id="edit-form" class="form-horizontal" method="post" >
            <div class="modal-header">
                  <h4 class="modal-title">Info_Edit</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                             
                        <?php echo isset($message)?$message:"" ?>
                        <?php echo isset($error)?$error:"" ?>

                        <input type="hidden" name="txtId" id="txtId" />
                        <?php echo text_field("Bike-Name","txtName","Enter name")?>
                        <?php

                           $catagory=$db->query("select id,category_name from {$ex}categorys");
                           $cata_arr=array();
                           while(list($id,$name)=$catagory->fetch_row()){
                           $cata_arr[$id]=$name;
                           }
                           echo select_box("Catagory","cmbCatagory",$cata_arr);
                    
                        ?>

                        <?php echo text_field("Model","txtSize","model")?> 
                        <?php echo text_field("Color","txtColor","color")?>
                        <?php echo text_field("Brand","txtBrand","brand")?>
                        <?php echo text_field("Price","txtPrice","value")?>
                        <label>Image Upload</label>
                        <input type="file" name="file" id="file" accept="image/*" />
                     
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
        $("#edit-form").find("#txtId").val(record.id)
        $("#edit-form").find("#txtName").val(record.name)
        

        $("#edit-form").find("#cmbCatagory option").each(function(k,v){
           if(v.value==record.category_id){
              $(this).atrr("selected","selected")
           }
        });

        $("#edit-form").find("#txtColor").val(record.color)
        $("#edit-form").find("#txtSize").val(record.Model)
        $("#edit-form").find("#txtBrand").val(record.brand)
        $("#edit-form").find("#txtPrice").val(record.price)
        $("#edit-form").find("#file").val(record.img_name)

     });
  });
</script>


