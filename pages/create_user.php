<?php  
   //print_r($_POST);

   if(isset($_POST["btnSubmit"])){

       $username=$_POST["txtUsername"];
       $role_id=$_POST["cmbRole"];
       $password=$_POST["pwdPassword"];
       $re_password=$_POST["pwdRePassword"];
       

       if($password==$re_password){
        
         $user=new User($username,$password,$role_id,0);
         $user->save();
        $message="Successfully Created";

       }else{

         $error="Password did not match";

       }


   }
  
?>

<div class="content-header">

   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Create User
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
         </div>
      </div>
   </div>

</div>


<div class="content">
   
   <div class="container">
     
      <div class="row">
         <div class="col-sm-6">
            
            <form action="#" class="form-horizontal" method="post">
             <div class="card card-info">
              
               <div class="card-header">
                 <h3 class="card-title">Create User</h3>
              </div>

               <div class="card-body">              
                       <?php echo isset($message)?$message:"" ?>
                       <?php echo isset($error)?$error:"" ?>

                    <?php echo text_field("Name","txtUsername","Enter name"); ?>  
                    <?php echo password_field("Password","pwdPassword","Enter password"); ?>   
                    <?php echo password_field("Retype Password","pwdRePassword","Enter password"); ?> 
                    <?php
                    $roles=$db->query("select id,role_name from {$ex}roles");
                    $roles_arr=array();
                    while(list($id,$role_name)=$roles->fetch_row()){
                       $roles_arr[$id]=$role_name;
                    }
                    echo select_box("Role","cmbRole",$roles_arr);
                    
                    ?>
                   
                </div>
                
                <div class="card-footer">
                  <input type="submit" value="Submit" class="btn btn-info" name="btnSubmit" />
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>               
             </div>
            </form>
             
         </div>  


      </div>
   
   </div>
   

</div>