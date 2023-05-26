<?php 
    class User{
        public $id;
        public $email;
        public $pass;
        public $fullName;
        public $role;
        public function __construct($id,$email,$pass,$fullName,$role){
            $this->id = $id;
            $this->email = $email;
            $this->pass = $pass;
            $this->fullName = $fullName;
            $this->role = $role;
        }
        public static function insert($user){
            $conn = DB::getConnection();
    
            $sql = "insert into users (`id`,`email`,`pass`,`fullName`,`role`) values (:id,:email,:pass,:fullName,:role)";
            $stm = $conn->prepare($sql);
    
            $stm->execute(array('id'=>$user->id,'email'=>$user->email,'pass'=>$user->pass,'fullName'=>$user->fullName,'role'=>$user->role));
            
            return $stm->rowCount() == 1;
        }
        public static function delete($id){
            $conn = DB::getConnection();
            $sql = "delete from users where id = :id";
            $stm = $conn->prepare($sql);
            $stm->execute(array('id'=>$id));
    
            return $stm->rowCount() == 1;
        }

        public static function update($user) {
            $sql = "update users set id = :id, email = :email, pass = :pass, fullName = :fullName, role = :role where id= :id";
            $conn = DB::getConnection();
            $stm = $conn->prepare($sql);
            $stm->execute(array('id'=>$user->id, 'email'=> $user->email, 'pass'=> $user->pass, 'fullName'=> $user->fullName, 'role'=> $user->role, 'des'=> $user->des, 'release_date'=>$user->release_date, 'url_trailer'=>$user->url_trailer));
    
            return $stm->rowCount() == 1;
        }
        public static function getAll() {
            $sql = "select * from users";
            $conn = DB::getConnection();
    
            $stm = $conn->query($sql);
    
            $data = array();
            foreach($stm->fetchAll() as $item) {
                $data[] = new user( $item['id'], $item['email'], $item['pass'] , $item['fullName'], $item['role']);
            }
            return $data;
        }
    
        public static function get($user_id) {
            $conn = DB::getConnection();
            $sql = "select * from users where user_id = :user_id";
            $stm = $conn->prepare($sql);
            
            $stm->execute(array('user_id'=>$user_id));
          
            if($item = $stm->fetch()) {
                return new user($item['id'], $item['email'], $item['pass'] , $item['fullName'], $item['role']);
            }
            return null;
        }
        public static function getUserByEmail($email){
            $conn = DB::getConnection();
            $sql = "select * from users where email = :email";
            $stm = $conn->prepare($sql);
            
            $stm->execute(array('email'=>$email));
          
            if($item = $stm->fetch()) {
                return new user($item['id'], $item['email'], $item['pass'] , $item['fullName'], $item['role']);
            }
            return null;
        }
        
    }
?>