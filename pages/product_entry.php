<?php
if(isset($_POST["btnSubmit"])){
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

   $message="<p style='color:Green; text-align:center'>Successfully Created</p>";
   
}
?>

<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
            Product Entry
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Entry</li>
            </ol>
         </div>
      </div>
   </div>
</div>

<div class="content ">
   <div class="container ">
      <div class="row ml-5">
         <div class="col-sm-8 ">
            <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
               <div class="card card-info ">
                  <div class="card-header">
                     <h3 class="card-title">Product Entry</h3>
                  </div>
                  <div class="card-body">
                     <?php echo isset($message)?$message:"" ?>

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
                     <?php echo text_field("model","txtSize","model"); ?> 
                     <?php echo text_field("Brand","txtBrand","brand"); ?> 
                     <input type="file" name="file" id="file" accept="image/*" />

                  </div>
                  <div class="card-footer">
                     <input type="submit" class="btn btn-info" name="btnSubmit" value="Submit"/>
                     <button type="submit" class="btn btn-default float-right">Cancle</button>
                  </div>
               </div>

            </form>
         </div>
      </div>
   </div>

</div>