<?php
  

  class Category{
    private $categoryname;
    
    function __construct($categoryname){

        $this->categoryname=$categoryname;       
    }
    public function save(){
         global $db;
         global $ex;

         
        $db->query("insert into {$ex}categorys(category_name)values('$this->categoryname')");
        return $db->insert_id;
    }

    public function update($id){
        global $db;
        global $ex;

            
            $sql="update {$ex}categorys set category_name='$this->categoryname' where id='$id'";
            $db->query($sql);
        
            //file_put_contents("sql.txt",$sql);
            
            return $id;
    }
    public static function delete($id){
      global $db;
      global $ex;
    
    $db->query("delete from {$ex}categorys where id='$id'");
    }
  }



  class CategoryView{
        public $id;
        public $categoryname;
        

        function __construct($id,$categoryname){
        $this->id=$id;
        $this->categoryname=$categoryname;
        }

      public static function get_category(){
              global $db;
              global $ex;
        
              $sql="select id,category_name from {$ex}categorys";
              
              $categorys=$db->query($sql);
              $data=[];
        
              while($category=$categorys->fetch_object()){
                $category=new CategoryView($category->id,$category->category_name);
                array_push($data,$category);
              }
              return $data;
            }
  }
?>