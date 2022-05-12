<?php

class User{
   private $id;
   private $username;
   private $password;
   private $role_id; 
   private $inactive;
   
   function __construct($username,$password,$role_id,$inactive){      
      $this->username=$username;
      $this->password=$password;
      $this->role_id=$role_id;  
      $this->inactive=$inactive;
   }
   
  public function save(){
    global $db;
    global $ex;

    $md5=md5($this->password);
    $db->query("insert into {$ex}users(username,password,role_id)values('$this->username','$md5','$this->role_id')");
    return $db->insert_id; 
  }

  public function update($id){
   global $db;
   global $ex;

   $md5=md5($this->password);
   $sql="update {$ex}users set username='$this->username',password='$md5',role_id='$this->role_id',inactive='$this->inactive' where id='$id'";
   $db->query($sql);
   
   //file_put_contents("sql.txt",$sql);
   
   return $id;
  }

 public static function delete($id){
     global $db;
     global $ex;

     $db->query("delete from {$ex}users where id='$id'");
 }

 public static function get_users(){
   global $db;
   global $ex;

   $sql="select u.id,u.username,u.password,u.role_id,r.role_name role,u.inactive from {$ex}users u,{$ex}roles r where r.id=u.role_id";
   //file_put_contents("sql.txt",$sql);
   $users=$db->query($sql);
   $data=[];

   while($user=$users->fetch_object()){
    $u=new UserView($user->id,$user->username,$user->password,$user->role_id,$user->role,$user->inactive);
  
   /*
   $u=new UserView();
   $u->id=$user->id;
   $u->username=$user->username;
   $u->password=$user->password;
   $u->inactive=$user->inactive;
   $u->role_name=$user->role;
   $u->role_id=$user->role_id;
   */
   array_push($data,$u);
   }

   return $data;

} 

}

class UserView{
   public $id;
   public $username;
   public $password;
   public $role_id;
   public $role;
   public $inactive;

   
    function __construct($id,$username,$password,$role_id,$role1,$inactive){
      $this->id=$id;
      $this->username=$username;
      $this->password=$password;
      $this->role_id=$role_id;
      $this->role=$role1;
      $this->inactive=$inactive;
   }

}
