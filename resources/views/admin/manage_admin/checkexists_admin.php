<?php 
class checkexists_admin{
    static function checkTkAdmin($username, $password = ''){
        if(empty($username)){
            return false;
        }
          // b1: tạo kết nối
        $conn = config::getConnection();
        if($conn === false){
            die("ERROT CONNECTION!!!");
            return false;
        } elseif($conn->connect_error !== null){
            die("Connection fail: ". $conn->connect_error);
            return false;
        }
        // b2: gọi sql
        $sql = "select id,fullname,username from admin where username ='".$username."'";
        if(empty($password) == false && strlen(trim($password)) > 0){
            $sql .=" and password ='".trim($password)."'"; 
        }
        $result = $conn ->query($sql);
        // b3: xử lý kết quả
        if ($result->num_rows > 0) {
            // tồn tại nếu $result > 0
            return true;
        } 
        // b4: đóng kết nối
        config::closeConnection($conn);
        // không tìm thấy
        return false;
        }
}
?>