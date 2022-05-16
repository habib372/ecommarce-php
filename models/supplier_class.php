<?php
    class Supplier{
        private $id;
        private $supplier_name;
        private $phone;
        private $email;
        private $address;
        private $city;
        
        function __construct($supplier_name,$phone,$email,$address,$city){
            
            $this->supplier_name=$supplier_name;
            $this->phone=$phone;
            $this->email=$email;
            $this->address=$address;
            $this->city=$city;    
        } 

        public function save(){
            global $db;
            global $ex;
            
            $db->query("insert into {$ex}suppliers(supplier_name,phone,email,address,city)values('$this->supplier_name','$this->phone','$this->email','$this->address','$this->city')");
            return $db->insert_id;
        }

        public function update($id){
            global $db;
            global $ex;

            $db->query("update {$ex}suppliers set supplier_name='$this->supplier_name',phone='$this->phone',email='$this->email',address='$this->address',city='$this->city' where id='$id'");
            return $id;
        }

        public static function delete($id){
            global $db;
            global $ex;
            $db->query("delete from {$ex}suppliers where id='$id'");


        }
    }
                
    class SupplierView{
            public $id;
            public $supplier_name;
            public $phone;
            public $email;
            public $address;
            public $city;

            function __construct($id,$supplier_name,$phone,$email,$address,$city){
                $this->id=$id;
                $this->supplier_name=$supplier_name;
                $this->phone=$phone;
                $this->email=$email;
                $this->address=$address;
                $this->city=$city;
            }        

        public static function get_suppliers($page){
            global $db;
            global $ex;

            //-----pagination------------
            $total_rs=$db->query("select count(*) from {$ex}suppliers");
            list($total)=$total_rs->fetch_row();
            $per_page=4;
            $top=($page-1)*$per_page;
            $total_page=ceil($total/$per_page);
            //--end-----pagination------------

            $sql="select id,supplier_name,phone,email,address,city from {$ex}suppliers order by id limit $top,$per_page";
            $suppliers=$db->query($sql);
            $data=[];

            while($supplier=$suppliers->fetch_object()){
                $u=new SupplierView($supplier->id,$supplier->supplier_name,$supplier->phone,$supplier->email,$supplier->address,$supplier->city);
                array_push($data,$u);
            }
            $table=["data"=>$data,"pagination"=>pagination($page,$total_page)];
            return $table;
        }

    } 

?>
