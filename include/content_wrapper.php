<style>
  .bgaa{
    background-color:FloralWhite;
  }
</style>

<div class="content-wrapper bgaa">
    
    <?php
       
       if(isset($_GET["page"])){

           $page=$_GET["page"];

           if($page=="product-entry"){              
              include("pages/product_entry.php");
           }elseif($page=="manage-product"){
              include("pages/manage_product.php");
           }
           elseif($page=="create-user"){
              include("pages/create_user.php");
           }elseif($page=="manage-user"){
              include("pages/manage_user.php");
           }
           elseif($page=="contact"){
              include("pages/contact.php");
           }
           elseif($page=="home"){
            include("pages/dashboard.php");
           } 
           elseif($page=="manage-category"){
            include("pages/manage_category.php");
           }
            elseif($page=="create-invoice"){
            include("pages/create_invoice.php");
           }elseif($page=="manage-invoice"){
            include("pages/manage_invoice.php");
           }
           elseif($page=="manage-supplier"){
            include("pages/manage_supplier.php");
           }
           elseif($page=="stock-product"){
            include("pages/stock_product.php");
           }
           elseif($page=="sells"){
            include("pages/sells_product.php");
           }
           elseif($page=="daily-reports"){
            include("pages/daily_reports.php");
           }elseif($page=="monthly-reports"){
            include("pages/monthly_reports.php");
           }

      }else{
            
          include("pages/dashboard.php");
             
     
      }
    
    ?>
    
</div>