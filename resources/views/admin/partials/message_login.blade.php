<?php 
        $check_login = Session::get('check_login');
        if($check_login)
        {
?>
        <div class="confirm_container" >
            <div class="confirm_form">
                <strong><i class="fas fa-check-circle"></i></strong>
                <?php
                    echo "<h4 style='color: #5cb85c; font-weight: bold;margin:25px 0'>";
                        echo $check_login;
                        Session::put('check_login', null);
                    echo "</h4>";
                ?>
                <a class="cancel_btn btn btn-secondary">Cancel</a>
            
            </div>
        </div>
    <?php
        }
    ?>
