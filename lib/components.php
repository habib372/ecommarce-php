<?php
    //-------functon (1)-------->   
    function text_field($label,$name,$placeholder="Enter value",$value=""){

          $html="<div class='form-group row'>";
          $html.="<label class='col-sm-3 col-form-label'>";
          $html.=$label;
          $html.="</label>";
          $html.="<div class='col-sm-9'>";
          $html.="<input type='text' class='form-control' name='$name' id='$name' value='$value' placeholder='$placeholder' />";
          $html.="</div>";   
          $html.="</div>"; 
          
          return $html;
    }

    //-------functon (2) /purchase invoice-------->
    function text_field1($label,$name,$placeholder="Enter value",$value=""){

      $html="<div class='form-group row mb-1'>";
      $html.="<label class='col-sm-6 col-form-label'>";
      $html.=$label;
      $html.="</label>";
      $html.="<div class='col-sm-'>";
      $html.="<input type='text' class='form-control' name='$name' id='$name' value='$value' placeholder='$placeholder' />";
      $html.="</div>";   
      $html.="</div>"; 
      
      return $html;
    }

    //-------functon (3) /purchase invoice date-------->
    // function text_date($name,$placeholder="Enter value",$value=""){

    //   $html="<div class='form-group '>";
    //   $html.="<div class='col-sm-12'>";
    //   $html.="<input type='text' class='form-control'  name='$name' id='$name' value='$value' placeholder='$placeholder' />";
    //   $html.="</div>";   
    //   $html.="</div>"; 

    //   return $html;
    // }


    function text_field_nolabel($name,$placeholder="Enter value",$value=""){
        
      $html="<div class='form-group row'>";
      $html.="<div class='col'>";
      $html.="<input type='text' class='form-control' name='$name' id='$name' value='$value' placeholder='$placeholder' />";
      $html.="</div>";   
      $html.="</div>"; 
      
      return $html;

  }

    function password_field($label,$name,$placeholder="Enter value",$value=""){
        
      $html="<div class='form-group row'>";
      $html.="<label class='col-sm-3 col-form-label'>";
      $html.=$label;
      $html.="</label>";
      $html.="<div class='col-sm-9'>";
      $html.="<input type='password' class='form-control' name='$name' id='$name' value='$value' placeholder='$placeholder' />";
      $html.="</div>";   
      $html.="</div>"; 
      
      return $html;

  }

    function select_box($label,$name,$data=array("0"=>"Select Item"),$select_id=0){
        
      $html="<div class='form-group row'>";
      $html.="<label class='col-sm-3 col-form-label'>";
      $html.=$label;
      $html.="</label>";
      $html.="<div class='col-sm-9'>";
      $html.="<select name='$name' id='$name' class='form-control'>";
      foreach($data as $key=>$value){
        if($key==$select_id){
          $html.="<option value='$key' selected>$value</option>";
        }else{
          $html.="<option value ='$key'>$value</option>";
        }
      }
      $html.="</select>";
      $html.="</div>";   
      $html.="</div>"; 
      
      return $html;

  }

  function select_box_labal_less($name,$data=array("0"=>"Select Item"),$select_id=0){
        
    $html="<div class='form-group row'>";
    $html.="<div class='col'>";
    $html.="<select name='$name' id='$name' class='form-control'>";
    foreach($data as $key=>$value){
      if($key==$select_id){
        $html.="<option value='$key' selected>$value</option>";
      }else{
        $html.="<option value ='$key'>$value</option>";
      }
    }
    $html.="</select>";
    $html.="</div>";   
    $html.="</div>"; 
    
    return $html;

  }

  function select_box_query($name,$query_rs,$select_id=0){
        
    $html="<div class='form-group row'>";
    $html.="<div class='col'>";
    $html.="<select name='$name' id='$name' class='form-control'>";

    while(list($id,$name)=$query_rs->fetch_row()){
      if($id==$select_id){
        $html.="<option value='$id' selected>$name</option>";
      }else{
        $html.="<option value ='$id'>$name</option>";
      }
    }
    $html.="</select>";
    $html.="</div>";   
    $html.="</div>"; 
    
    return $html;

  }


  function action_delete($id){
    echo "<form action='#' method='post' onSubmit='return confirm(\"Are you sure?\")'>";
    echo "<input type='hidden' name='txtId' value='$id' />";
    echo "<button type='submit' class='btn btn-danger btn-sm' name='btnDel' value='del'><i class='far fa-trash-alt'></i></button>";
    echo "</form>";
  }

  function action_edit($user){
    echo "<form action='#' method='post'>";
    foreach($user as $key=>$value){
    echo "<input type='hidden' name='$key' value='$value' />";
    }
    echo "<button type='submit' class='btn btn-success btn-sm' name='btnEdit' value='edit'><i class='far fa-edit'></i></button>";
    echo "</form>";
  }

  //----------Pagination------------------
  function pagination($page=1,$totalPages){
    
      $next=($page+1)<$totalPages?($page+1):$totalPages;
      $pre=($page-1)>0?($page-1):1;
      
        $links = "<ul class='pagination pagination-sm float-right mt-2 mb-0 rounded'>";
        $links .= "<li class='page-item'><a href='?p=1' class='page-link'>First</a></li>";
        $links .= "<li class='page-item'><a href='?p=$pre' class='page-link'>Previous</a></li>";
        
        for ($i = $page-5;$i<=$page+5;$i++) {
          
        if($i>0 && $i<=$totalPages){
          $links .= ($i != $page ) ? "<li class='page-item'><a href='?p=$i' class='page-link'> $i</a> </li>" : "<li><a  class='page-link active'> $page</a> </li>";
        }		 
          
        }

        $links.= "<li class='page-item'><a href='?p=$next' class='page-link'>Next</a></li>";
        $links.= "<li class='page-item'><a href='?p=$totalPages' class='page-link'>Last</a></li>";	
        $links.="<li class='page-item'><form  method='get'>";
        $links.= "<input type='text' size='1' name='p' />";
        $links.="<input type='submit' value='go' />";
        $links.= "</form></li>";
        $links.= "</ul>";
        return $links;
    }


?>