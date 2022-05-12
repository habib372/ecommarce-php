
<div class="content-header">

   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Contact
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                 <h3 class="card-title">Contact Info</h3>
              </div>

               <div class="card-body">              
            
                    <?php echo text_field("Name","txtName","Enter name"); ?>  

                     <?php echo text_field("Email","txtEmail","Enter email"); ?>   

                     <?php echo select_box("City","txtCity",["1"=>"Dhaka","2"=>"Khulna"]); ?>
                     <?php echo text_field("Mobile","txtMobile","Enter mobile"); ?>                  
             
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>               
             </div>
            </form>
             
         </div>  


      </div>
   
   </div>
   

</div>


