<?php
   //catagory add function
    if(isset($_POST["CtSubmit"])){
      $categoryname=$_POST["txtUsername"];

        $category=new Category($categoryname);
        $category->save();
        $message="Successfully Created";
    }

    //catagory update function
   if(isset($_POST["CtaSave"])){
      $id=$_POST["txtId"];
      $categoryname=$_POST["txtCategoryname"];
    
      $category=new Category($categoryname);
      $category->update($id);
      
   }
   if(isset($_POST["btnDel"])){   
      $id=$_POST["txtId"];
      Category::delete($id);
   }


?>
<!--header section --->
<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Manage Catagory
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Catagory</li>
            </ol>
         </div>
      </div>
   </div>
</div>



<div class="content">
   <div class="container">     
      <div class="row">
         <div class="col-sm-6">
            <div class="card card-info">            
                     <div class="card-header">
                        <h3 class="card-title">Manage Category</h3>
                        <button type='button' class='btn btn-primary btn-sm float-right' name='CtSubmit'  data-toggle='modal' data-target='#create-product'>Create Category</i></button>
                        <!-- <button type="submit" class="btn btn-default float-right" data-toggle="modal" data-target="#user-create">create User</button> -->
                      
                     </div>
               <table class="table">                    
               <?php
                    echo "<tr><th>ID</th><th>Catagory</th><th>Edit/Delete</th></tr>";
                    $categorys=CategoryView::get_category();

                    foreach($categorys as $category){
                    echo "<tr>";
                    echo "<td>$category->id</td>";
                    echo "<td>$category->categoryname</td>";
                    echo "<td>";
                        echo "<div class='btn-group'>";
                           Action_delete($category->id);
                        $json=json_encode(["id"=>"$category->id","categoryname"=>"$category->categoryname"]);
                        //print_r($json);  
                        echo "<form action='#' method='post'><button type='button' class='btn btn-success btn-sm btn-edit' name='btnEdit' value='edit' data-toggle='modal' data-target='#category-edit' data-json='$json'><i class='far fa-edit'></i></button></form>";
                        echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                  }
               ?>                  
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


  <!--catagory add modal-->
<div class="modal" id="create-product">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="#" id="edit-form" class="form-horizontal" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">category add</h4>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <?php echo text_field("CategoryName","txtUsername","Enter category"); ?>                                                                         
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="save" class="btn btn-info" name="CtSubmit" />
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--catagory edit modal------>
<div class="modal" id="category-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="#" id="category-edit-form" class="form-horizontal" method="post">
               <div class="modal-header">
               <h4 class="modal-title">category add</h4>
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <input type="hidden" name="txtId" id="txtId" />
                  <?php echo text_field("CategoryName","txtCategoryname","Enter category"); ?>
               </div>
               <div class="modal-footer justify-content-between">
                  <input type="submit" value="Update" class="btn btn-info" name="CtaSave" />
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
               </div>
            </form>
        </div>
    </div>
</div>

<script>
   $(function(){
      $(".btn-edit").on("click",function(){
         let record=$(this).data("json");
         $("#category-edit-form").find("#txtId").val(record.id)
         $("#category-edit-form").find("#txtCategoryname").val(record.categoryname)
      });
   });
</script>
