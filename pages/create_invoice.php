<?php
if(isset($_POST["btnSave"])){

 if(count($_SESSION["invoice"])>0){
  
  $supplier_id=$_POST["cmbSupplier"];
  $ref_no=$_POST["txtRef"];
  $remark="na";

  date_default_timezone_set("Asia/Dhaka");
  $purchase_at=date("Y-m-d",strtotime("3-11-2020"));

  $db->query("insert into {$ex}purchase(supplier_id,ref_no,remark,purchase_at)values('$supplier_id','$ref_no','$remark','$purchase_at')");
  
   $purchase_id=$db->insert_id;

  foreach($_SESSION["invoice"] as $k=>$v){
    $db->query("insert into {$ex}purchase_details(purchase_id,product_id,qty,cost)values('$purchase_id','$v[id]','$v[qty]','$v[price]')");
  }

   unset($_SESSION["invoice"]);

    }else{

     $message="<b style='color:orange;'>No Item Found</b>";

  }
}


if(isset($_POST["btnDel"])){
  $id=$_POST["txtId"];
  if(array_key_exists($id,$_SESSION["invoice"])){
    unset($_SESSION["invoice"][$id]);
  }
}

if(!isset($_SESSION["invoice"])){
  $_SESSION["invoice"]=[];
}

if(isset($_POST["btnAdd"])){
  $id=$_POST["cmbProduct"];
  $qty=$_POST["txtQty"];
  $price=$_POST["txtPrice"];

  $products_row=$db->query("select product_name from {$ex}products where id='$id'");
  $row=$products_row->fetch_object();

  if(array_key_exists($id,$_SESSION["invoice"])){
    $_SESSION["invoice"][$id]["qty"]+=$qty;
    $_SESSION["invoice"][$id]["total"]=$_SESSION["invoice"][$id]["qty"]*$price;
  }else{

    $_SESSION["invoice"][$id]["id"]=$id;
    $_SESSION["invoice"][$id]["product_name"]=$row->product_name;
    $_SESSION["invoice"][$id]["qty"]=$qty;
    $_SESSION["invoice"][$id]["price"]=$price;
    $_SESSION["invoice"][$id]["total"]=$qty*$price;
  }
}

?>

<div class="content-header">
   <div class="container">
      <div class="row mb-2">
         <div class="col">
            <h1 class="m-0 text-dark">
               Purchase Invoice
            </h1>
         </div>
         <div class="col">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Invoice</li>
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
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                            <h2 class="page-header" style="text-align:center">
                              <img src="img/logo2.jpg" alt="logo2" class="brand-image img-circle" style="opacity:.8; height:40px; width:40px">
                              <span class="brand-text " style="color:black; padding-top:10px">BikeBD</span>
                            </h2>
                            <h6 class="page-body" style="text-align:center; padding-left:20px;">Most Popular Bike Portal of Bangladesh</h6>
                            <div style="text-align:center"><?php echo isset($message)?$message:"" ?></div>
                        </div>
                         <!-- /.col -->
                      </div>
                      <hr>
                    <div class="card-body">
                    <!-- info row -->
                    <form action="#" name="frmPurchase" id="frmPurchase" method="post">
                      <input type="hidden" name="btnSave" value="Save" />
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <div>
                          <?php
                            $suppliers_rs=$db->query("select id,supplier_name from {$ex}suppliers");
                            $vendors=[];
                            while(list($id,$name)=$suppliers_rs->fetch_row()){
                              $vendors[$id]=$name;
                            }
                            echo select_box_labal_less("cmbSupplier",$vendors);
                          ?>
                          </div>
                            <address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                            </address>
                        </div>

                        <!-- /.col no use -->
                          <div class="col-sm-3 invoice-col">
                          </div>
                        <!-- /.col -->
                              
                            <div class="col-sm-5 invoice-col">
                              <div style="text-align:right; color:#338AFF;padding-right:40px; padding-bottom:10px; font-size:18px">
                                <b>Invoice # 
                                <?php
                                    $rs_row=$db->query("select max(id)+1 count from {$ex}purchase");
                                    $row=$rs_row->fetch_object();
                                    echo $row->count==null?1:$row->count;
                                ?> </b><br>
                              </div>
                              <div >
                                <?php 
                                  echo text_field1("Payment amount:","txtPay","amount..."); 
                                  echo text_field1("Purchase date:","txtPd","parchase date..."); 
                                  echo text_field1("Purchase due date:","txtPdd","due date...");   
                                  echo text_field1("Reference:","txtRef","reference..."); 
                                ?>  
                              </div>
                            </div>
                                
                          <!-- /.col -->
                      </div>
                    </form>
                    <!-- /.row -->
                     
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-md-12 table-responsive ">
                        <table class="table text-center">
                          <thead>
                            
                            <tr style="background-color:#E2E7ED; ">
                              <form action="#" method="post">

                                <th >
                                </th>

                                <th>
                                  <?php
                                  $products_rs=$db->query("select id,product_name from {$ex}products");
                                  echo select_box_query("cmbProduct",$products_rs);
                                  ?>
                                </th>

                                <th><?php echo text_field_nolabel("txtQty","Enter quentity")?></th>
                                <th><?php echo text_field_nolabel("txtPrice","Enter price")?></th>
                                <th><input type="submit" name="btnAdd" value="Add" class="form-group form-control btn-info"></th>
                                <th></th>
                              </form>
                            </tr>

                            <tr style="background-color:#EDEEF0">
                              <th >SN</th>
                              <th>Product</th>
                              <th>Qty</th>
                              <th>Per_piece</th>
                              <th>Total</th>
                              <th>Action</th>
                            </tr>

                          </thead>
                          
                          <tbody style="background-color:#EDEEF0">
                              <?php
                              $i=1;
                              $subtotal=0;

                              if(is_array($_SESSION["invoice"])){
                              foreach($_SESSION["invoice"] as $k=>$v){
                                
                                echo "<tr>";
                                  echo "<td>".$i++."</td>";
                                  echo "<td>$v[product_name]</td>";
                                  echo "<td>$v[qty]</td>";
                                  echo "<td>$v[price]</td>";
                                  echo "<td>$v[total]</td>";
                                  echo "<td>
                                  <form action='#' method='post' onSubmit='return confirm(\"Are you sure?\")'>
                                  <input type='hidden' name='txtId' value='$k' />
                                  <button type='submit' class='btn btn-danger btn-sm' name='btnDel' value='del'><i class='far fa-trash-alt'></i></button>
                                  </form>
                                  </td>";
                                  
                                echo "</tr>";
                                $subtotal+=$v["total"];
                              }
                            }
                              ?>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                <!-- /.row -->


              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
               
                </div>
                <!-- /.col -->
                <div class="col-4">
                 
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $subtotal?></td>
                      </tr>
                      <tr>
                        <th>Tax (5%):</th>
                        <td>
                        <?php
                          $tax=$subtotal*(5/100);
                          echo $tax;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Shipping cost:</th>
                        <td><?php
                        $shipping_cost=80;
                        echo $shipping_cost;
                        ?></td>
                      </tr>
                      <tr>
                        <th>Total Amount:</th>
                        <td><?php
                        echo $subtotal+$tax+$shipping_cost
                        ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
                

            <!-- payment -->
              <div class="row no-print">
                  <div class="col-12">
                      <button type="button" name="btnSubmit" id="btnSubmit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                          Submit Payment
                      </button>
                </div> 
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
$(function(){
  $("#btnSubmit").on("click",function(){

     if(confirm('Are you sure?')){

         $("#frmPurchase").submit();

     }

  });
});


</script>

<script>
    $( "#txtPd" ).datepicker();
    $( "#txtPdd" ).datepicker();
    $( "#txtDate" ).datepicker();
  </script>


