<?php
    if(isset($_SESSION['username']))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body id="page-top">
        <?php 
            // code hiển thị giá trị cũ trưỚc khi update
            $id = $_GET['id'];
            $conn = config::getConnection();
            $sql = "select * from admin where id=$id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
               $row = mysqli_fetch_assoc($res);
               $fullname = $row['fullname'];
               $username = $row['username'];
            }
        ?>
        <?php
            $erros = [];
            $result = [];
            // lấy value tử form và lưu vào database
            // kiểm tra nút submit đã được click?
            if(isset($_POST['submit'])){
                // 1. lấy giữ liệu từ form
                $fullname = htmlspecialchars(trim($_POST['fullname']));
                $username = htmlspecialchars(trim($_POST['username']));
                $password = htmlspecialchars(trim($_POST['password']));
                $re_password = htmlspecialchars(trim($_POST['re_password']));
                // 2. chek dữ liệu
                if(empty($fullname)){
                    $erros['fullname'] = "*Tên người dùng không được để trống";
                }
                if(empty($username)){
                    $erros['username'] = "*Tài khoản không được để trống";
                }  
                if(empty($password)){
                    $erros['password'] = "*Mật khẩu không được để trống";
                }
                if($password !== $re_password){
                    $erros['re_password'] = "*Mật khẩu nhập lại không đúng";
                }
                // 2. Gửi lên sql
                if(count($erros) == 0){
                    // 3. check dữ liệu đã tồn tại?
                    include('checkexists_admin.php');
                    $exists = checkexists_admin::checkTkAdmin($username);
                    if($exists == true){
                        $erros['exists'] = "Username: ".$username." đã tồn tại";
                    } else {
                        $conn = config::getConnection();
                        if($conn === false){
                            die("ERROT CONNECTION!!!");
                            return false;
                        } elseif($conn->connect_error !== null){
                            die("Connection fail: ". $conn->connect_error);
                            return false;
                        }
                        $sql = "update admin set 
                                    fullname='$fullname', 
                                    username='$username', 
                                    password='".md5($password)."' 
                                    where id=$id
                                ";

                        //  4. Execute the query
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                            // Data inserted
                            $_SESSION['update_admin'] = "Cập nhật tài khoản thành công";
                            echo "<script>
                                    location.href='../admin/index.php?page_layout=manage_admin';
                                </script>";
                            
                        } else {
                            $erros['resdes'] = "Cập nhật tài khoản thất bại";
                        }
                    }
                } 
            }
        ?>
        <div id="wrapper">
            <?php include_once('./partials/menu.php');?>
            <!-- code database bắt đầu từ đây  -->
            <div class="container-fluid d-flex justify-content-center">
                <form method="POST" style="width: 30%;" >
                    <?php
                        if(isset($erros['resdes'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['resdes'];
                                unset($erros['resdes']);
                            echo "</div>";
                        }
                        if(isset($erros['exists'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['exists'];
                                unset($erros['exists']);
                            echo "</div>";
                        }
                    ?>
                    <h2 class="form-title">Update admin</h2>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="fullname" style="width: 100%;" placeholder="Full Name" value="<?php echo (!empty($fullname)?$fullname:""); ?>" />
                        <?php 
                            if(isset($erros['fullname'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['fullname'];
                                unset ($erros['fullname']);
                            echo "</div>";
                            } 
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="username" style="width: 100%;"  placeholder="User Name" value="<?php echo (!empty($username)?$username:""); ?>" />
                        <?php 
                            if(isset($erros['username'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['username'];
                                unset ($erros['username']);
                            echo "</div>";
                            } 
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-sm py-4 px-3 mb-1" name="password" style="width: 100%;" placeholder="Password" value="<?php echo (!empty($password)?$password:""); ?>" />
                        <?php 
                            if(isset($erros['password'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['password'];
                                unset ($erros['password']);
                            echo "</div>";
                            } 
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-sm py-4 px-3 mb-1" name="re_password" style="width: 100%;" placeholder="Repeat your password" value="<?php echo (!empty($re_password)?$re_password:""); ?>" />
                        <?php 
                            if(isset($erros['re_password'])){
                            echo "<div class='alert alert-danger text-danger'>";
                                echo $erros['re_password'];
                                unset ($erros['re_password']);
                            echo "</div>";
                            } 
                        ?>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button  type="submit" name="submit" class="btn btn-primary mx-2">Update</button>
                        <a href="<?php echo SITEURL; ?>admin/index.php?page_layout=manage_admin" class="btn btn-secondary">Go back</a>
                        </div>
                </form>
            </div>
            <!-- kết thúc code ở đây  -->
        </div>
        <script type='text/javascript' src="../js/jquery-3.6.0.min.js"></script>
        <script type='text/javascript'>
            $('#collapseUtilities').addClass('show');
            $('.admin_active').addClass('active');
        </script>
      

    </body>
</html>
<?php 
    } else {
        session_start();
        $_SESSION['no_login_message'] = "*Please login to access Admin Panel"; 
        header('location: http://localhost:9090/e-Project/instructor/admin/authen/admin_login.php');
    }
?>