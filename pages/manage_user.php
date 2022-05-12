<?php   
   
  
       if(isset($_POST["btnSubmit"])){

        $username=$_POST["txtUsername"];
        $role_id=$_POST["cmbRole"];
        $password=$_POST["pwdPassword"];
        $re_password=$_POST["pwdRePassword"];
 
        if($password==$re_password){
          $user=new User($username,$password,$role_id,0);
          $user->save();

          $message=" ";

        }else{ 
          $error="<p style='color:red; text-align:center'>Password doesn't match</p>";
        }
    }


   if(isset($_POST["btnDel"])){
     
      $id=$_POST["txtId"];   
     // print_r($id);   
      User::delete($id);

   }

   /*
   if(isset($_POST["btnUpdate"])){      
      //print_r($_POST); 
      $id=$_POST["txtId"];
      $username=$_POST["txtUsername"];
      $role_id=$_POST["cmbRole"];
      $password=$_POST["pwdPassword"];
      $repassword=$_POST["pwdRePassword"];
      $inactive=isset($_POST["ckhInactive"])?0:1;
      //echo $inactive;
      $user=new User($username,$password,$role_id,$inactive);
      $user->update($id); 
    }
   */


   if(isset($_POST["btnSaveChange"])){      
     //print_r($_POST); 
      $id=$_POST["txtId"];
      $username=$_POST["txtUsername"];  
      $password=$_POST["pwdPassword"];
      $repassword=$_POST["pwdRePassword"];
      $role_id=$_POST["cmbRole"];
      $inactive=isset($_POST["ckhInactive"])?0:1;
      
      //echo $inactive;

      $user=new User($username,$password,$role_id,$inactive);
      $user->update($id); 

   }


?>

<!-------------content Header------------------->
<div class="content-header">
    <div class="container">
        <div class="row mb-1">

            <div class="col ml-2 ">
                <h1 class="text-dark float-left ">
                    All USER ACCOUNTS
                </h1>
            
                <form class="form-inline float-right">
                     <div class="input-group input-group-sm">
                     <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                                <button class="btn input-group-text border-left-0 ">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                     </div>
                  </form>

            </div>
            <div >
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage User</li>
                </ol>            
            </div>
        </div>
    </div>
 </div>

<!----------------- Create  Modal user-------------->
<div class="modal" id="user-Create">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <form action="#" class="form-horizontal" method="post">
         
               <div class="modal-header">
                  <h4 class="modal-title">Create New User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div> 

               <div class="modal-body">      
                                                
                           <?php echo isset($message)?$message:"" ?>
                        <?php echo isset($error)?$error:"" ?>

                     <input type="hidden" name="txtId" id="txtId" />
                     <?php echo text_field("Name","txtUsername","Enter name"); ?>  
                    <?php echo password_field("Password","pwdPassword","Enter password"); ?>   
                    <?php echo password_field("Retype Password","pwdRePassword","Enter password"); ?> 
                     
                     <?php  
                        
                        $roles=$db->query("select id,role_name from {$ex}roles");
                        
                        $roles_arr=[];                      
                        while(list($id,$name)=$roles->fetch_row()){                         
                           $roles_arr[$id]=$name;                       
                        }
                                             
                        echo select_box("Role","cmbRole",$roles_arr);
                     ?>             
                </div>

               <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <input type="submit" value="Submit" class="btn btn-info" name="btnSubmit" />
               </div>
             
            </form>
         </div>
   </div>
</div> 

<!-------------User view----------------------->
<div class="content" >
   <div class="container">
      
      <div class="row">
         <div class="col-sm-10 ml-3">
               
            <form action="#" class="form-horizontal" method="post">
               <div class="card card-info">
               
                  <div class="card-header">
                     <h1 class="card-title pt-1">Manage User</h1>   
                      <!----------------- Create  Modal  user Button-------------->
                        <button type="button" class=' btn btn-primary btn-sm float-right' data-toggle='modal' data-target='#user-Create'>
                        <i class="fas fa-user"></i> Create User</button>
                  </div>

                  <div class="card-body">              
                  
                     <!------------- user list view--------------------->
                     <table class="table table-secondary ">
                     
                        <tr style="font-weight:bold">
                           <td>UserID</td>
                           <td>Username</td>
                           <td>Password</td>   
                           <td>Role_name</td>
                           <td>Activity</td>
                           <td>System</td>
                        </tr>
                        
                        <?php

                           $users=User::get_users();   

                           // $id=1;
                           foreach($users as $user){
                              echo "<tr>";
                              // echo "<td>$id</td>"; $id++;
                              echo "<td>#D$user->id</td>";
                              echo "<td>$user->username</td>";
                              echo "<td>$user->password</td>";
                              echo "<td>$user->role</td>";
                              echo "<td>$user->inactive</td>";
                              
                              echo "<td>";                       
                                 echo "<div class='btn-group'>";

                                 action_delete($user->id);
                              //$json="{\"id\":\"$user->id\",\"username\":\"$user->username\"}";                           
                                 $json=json_encode(["id"=>"$user->id","username"=>"$user->username","password"=>"$user->password","role_id"=>"$user->role_id","inactive"=>"$user->inactive"]);
                                 echo "<button type='button' class='btn btn-success btn-sm btn-edit' name='btnEdit' value='edit' data-toggle='modal' data-target='#user-edit' data-id='$user->id' data-json='$json' ><i class='far fa-edit'></i> </button>";

                                 echo "</div>";
                              echo "</td>";
                              echo "</tr>";
                                 
                           }
                        ?>                  
                     </table>
                  
                  </div>                                
               </div>
            </form>         
         </div> 
      </div> 
   </div> 
</div>



<!----------------- edit Modal user-------------->
<div class="modal" id="user-edit">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
         <form action="#" id="edit-form" class="form-horizontal" method="post">
         
            <div class="modal-header">
               <h4 class="modal-title">Edit User</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div> 

            <div class="modal-body">      
                                             
                        <?php echo isset($message)?$message:"" ?>
                        <?php echo isset($error)?$error:"" ?>

                     <input type="hidden" name="txtId" id="txtId" />
                     <?php echo text_field("Name","txtUsername","txtUsername","Enter name"); ?>  
                     <?php echo password_field("Password","pwdPassword","pwdPassword","Enter password"); ?>   
                     <?php echo password_field("Retype Password","pwdRePassword","Enter password"); ?> 
                     
                     <?php  
                        
                        $roles=$db->query("select id,name from {$ex}role");
                        
                        $roles_arr=[];                      
                        while(list($id,$name)=$roles->fetch_row()){                         
                           $roles_arr[$id]=$name;                       
                        }
                                             
                        echo select_box("Role","cmbRole",$roles_arr);
                     ?>   
                 Active <input type="checkbox" name="ckhInactive" id="ckhInactive"  />
               
            </div>

            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" name="btnSaveChange" class="btn btn-primary">Save changes</button>
            </div>
            </form>
         </div>
   </div>
</div> 


<!-------------jQuery--------------------->
<script>
  $(function(){
     
     $(".btn-edit").on("click",function(){

       //let id=$(this).parent().parent().parent().find(".id").html();  
      //  $(this).parent().parent().parent().css("background-color","lightgray");      
      //  let id2=$(this).data("id");
      // let id=$(this).data("id");
      // alert(id);
       
       let record=$(this).data("json");       
       //alert(record.role_id);
       $("#edit-form").find("#txtId").val(record.id)
       $("#edit-form").find("#txtUsername").val(record.username)
       $("#edit-form").find("#pwdPassword").val(record.password)
       $("#edit-form").find("#pwdRePassword").val(record.password)

       $("#edit-form").find("#cmbRole option").each(function(k,v){

          if(v.value==record.role_id){
          $(this).attr("selected","selected")

          }
       });

       if(record.inactive==0){
          $("#edit-form").find("#ckhInactive").attr("checked","checked");
       }else{
          $("#edit-form").fine("#ckhInactive").removeAttr("checked");
       }

     });

  });
</script>
