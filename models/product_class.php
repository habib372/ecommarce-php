<?php
    class Product{
        private $id;
        private $product_name;
        private $category_id;
        private $color;
        private $model; 
        private $brand;
        private $price;
        private $img_name;

        function __construct($product_name,$category_id,$color,$model,$brand,$price,$img_name){
            $this->product_name=$product_name;
            $this->category_id=$category_id;
            $this->color=$color;
            $this->model=$model;
            $this->brand=$brand;
            $this->price=$price;
            $this->img_name=$img_name;
                        
        }
        public function save(){
            global $db;
            global $ex;
            $db->query("insert into {$ex}products(product_name,category_id,color,model,brand,price,img_name)values('$this->product_name','$this->category_id','$this->color','$this->model','$this->brand','$this->price','$this->img_name')");
            return $db->insert_id;
        } 
        public function update($id){
            global $db;
            global $ex;
            $sql="update {$ex}products set product_name='$this->product_name',category_id='$this->category_id',color='$this->color',model='$this->model',brand='$this->brand',price='$this->price',img_name='$this->img_name' where id='$id'";
            $db->query($sql);
            return $id;
        }
        public static function delete($id){
            global $db;
            global $ex;
          
          $db->query("delete from {$ex}products where id='$id'");
          }

        

        
    }

    class ProductView{
        public $id;
        public $product_name;
        public $category_id;
        public $color;
        public $model;
        public $brand;
        public $price;
        public $img_name;
        
        function __construct($id,$product_name,$category_id,$color,$model,$brand,$price,$img_name){
            $this->id=$id;
            $this->product_name=$product_name;
            $this->category_id=$category_id;
            $this->color=$color;
            $this->model=$model;
            $this->brand=$brand;
            $this->price=$price;
            $this->img_name=$img_name;
        } 


        public static function get_products($page){
            global $db;
            global $ex;

            //-----pagination------------
            $total_rs=$db->query("select count(*) from {$ex}products");
            list($total)=$total_rs->fetch_row();
            $per_page=4;
            $top=($page-1)*$per_page;
            $total_page=ceil($total/$per_page);
            //-----End pagination------------

            $sql="select sp.id,sp.product_name bike_name,sc.category_name category,sp.color,sp.model,sp.brand,sp.price,sp.img_name from {$ex}products sp,{$ex}categorys sc where sp.category_id=sc.id limit $top,$per_page";
            $products=$db->query($sql);
            
            $data=[];
            while($pro=$products->fetch_object()){
                $g=new ProductView($pro->id,$pro->bike_name,$pro->category,$pro->color,$pro->model,$pro->brand,$pro->price,$pro->img_name);
                array_push($data,$g);
            }

            $table=["data"=>$data,"pagination"=>pagination($page,$total_page)];
            return $table;
            
        }
        
        
    }


?>
