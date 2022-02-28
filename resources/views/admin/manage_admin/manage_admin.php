<?php
    if(isset($_SESSION['username']))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php include_once('./partials/menu.php');?>
            <!-- code database bắt đầu từ đây  -->
            <div class="container-fluid">
                <h1>Manage Admins</h1>
                <!-- button to add admin  -->
                <a href="<?php echo SITEURL;?>admin/index.php?page_layout=add_admin" class="btn btn-primary mb-3">Add admin</a>
                <?php
                    if(isset($_SESSION['add_admin'])){
                        echo "<div class='alert alert-success'>";
                            echo $_SESSION['add_admin'];
                            unset($_SESSION['add_admin']);
                        echo "</div>";
                    }
                    if(isset($_SESSION['delete_admin'])){
                        echo "<div class='alert alert-success'>";
                            echo $_SESSION['delete_admin'];
                            unset($_SESSION['delete_admin']);
                        echo "</div>";
                    }
                    if(isset($_SESSION['update_admin'])){
                        echo "<div class='alert alert-success'>";
                            echo $_SESSION['update_admin'];
                            unset($_SESSION['update_admin']);
                        echo "</div>";
                    }
                ?>
                <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark ">
                        <tr >
                            <th class="text-center" style="width:10%">STT</th>
                            <th colspan="2" class="text-center" style="width:30%">Full Name</th>
                            <th colspan="2" class="text-center" style="width:30%">Username</th>
                            <th colspan="1" class="text-center" style="width:20%" >
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_GET['page'])){
                            $page = $_GET['page']; // lấy ra số trang nếu tồn tại $_GET['page']
                        } else {
                            $page = 1; // nếu ko tồn tại $_GET['page'] thì nó mặc định = 1
                        }
                        $rowsPerPage = 10; // mặc định số hàng hiển thị ở mỗi trang
                        $perRow = $page*$rowsPerPage - $rowsPerPage; // tính toán số hàng hiển thị ở trang tiếp theo
                        $errors = [];
                        // 1. kết nối
                        $conn = config::getConnection();
                        // 2. lấy giá trị từ database
                        $sql = "select id,fullname,username from admin limit $perRow,$rowsPerPage";
                        $res = mysqli_query($conn, $sql);
                        $totalRows = mysqli_num_rows(mysqli_query($conn,"select * from admin"));
                        $totalPages = ceil($totalRows/$rowsPerPage);
                    
                        $listPage = "";
                        for($i = 1; $i <= $totalPages; $i++){
                            if($page == $i){
                                $listPage.='<li class="page-item active"><a class="page-link text-light" href="../admin/index.php?page_layout=manage_admin&page='.$i.'">'.$i.'</a></li>';
                            } else {
                                $listPage.='<li class="page-item"><a class="page-link text-secondary" href="../admin/index.php?page_layout=manage_admin&page='.$i.'">'.$i.'</a></li>';
                            }
                            
                        }
                        // 3. check xem đã lấy đc giá trị hay chưa?
                        if($res==true){
                            // đếm số hàng dữ liệu đã lấy được trong database hay chưa?
                            $count = mysqli_num_rows($res);
                            // kiểm tra số hàng
                            if($count > 0){
                                // đã lấy được dữ liệu từ database
                                // tạo vòng lặp để duyệt từng hàng
                                $stt = 0;
                                $stt = $page*10-10;
                                while($rows = mysqli_fetch_array($res)){
                                    $stt++;
                                    // gán dữ liệu vào biến
                                    $id = $rows['id'];
                                    $fullname = $rows['fullname'];
                                    $username = $rows['username'];
                                    // hiển thị dữ liệu ra bảng
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width:10%"><?php echo $stt ?></td>
                                            <td colspan="2" class="text-center" style="width:30%"><?php echo $fullname ?></td>
                                            <td colspan="2" class="text-center" style="width:30%"><?php echo $username ?></td>
                                            <td colspan="1" class="text-center" style="width:20%">
                                                <a href="<?php echo SITEURL?>admin/index.php?page_layout=update_admin&id=<?php echo $id?>" class="btn btn-success">Update</a>
                                                <a onclick="return delete_admin()" href="<?php echo SITEURL?>admin/manage_admin/delete_admin.php?id=<?php echo $rows['id'];?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            } else {
                                $errors['data_null'] = "<div>Bảng ADMIN chưa có dữ liệu</div>";
                            }
                        }                    
                    ?>
                </table>
                <?php
                    if(isset($errors['data_null'])){
                    echo "<div class='alert alert-danger'>";
                        echo $errors['data_null'];
                        unset($errors['data_null']);
                    echo "</div>";
                    }
                ?>
                <div class="d-flex justify-content-center alignt align-items-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                echo $listPage;
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- kết thúc code ở đây  -->      
        </div>

       
        <!-- yêu cầu confirm trước khi xoá admin  -->
        <script type="text/javascript">
            function delete_admin(){
                var conf = confirm("Bạn có chắc chắn muốn xoá tài khoản ADMIN này?");
                return conf;
            };                                  
        </script>
        <script type='text/javascript' src="../js/jquery-3.6.0.min.js"></script>
       
    </body>
</html>
<?php 
    } else {
        session_start();
        $_SESSION['no_login_message'] = "*Please login to access Admin Panel"; 
        header('location: http://localhost:9090/e-Project/instructor/admin/authen/admin_login.php');
    }
?>