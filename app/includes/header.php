<header>
        <!-- //day la phan dau -->
        <a class="logo" href="/blog/index.php">
            <h1><span>Awa</span>Inspires</h1>
        </a>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
          <!-- header chua logo va nav -->
             <?php if(isset($_SESSION['id'])): ?> 
             <li>
                <a href="#">
                   <i class="glyphicon glyphicon-user" id="user"></i>
                   <?php echo $_SESSION['username']; ?>
                   <i class="fa fa-caret-down" id="down"></i>
                   <!-- gon 2 icon va ten nguoi dung -->
                </a>
                <ul>
                    <!-- vao trang quan tri hoac dang xuat cho ca 2 loai tai khoan -->
                     <?php if($_SESSION['admin']): ?>
                    <li>
                        <a href="<?php echo '/blog/admin/dashboard.php';?>">Dashboard</a>
                    </li>
                     <?php endif; ?>
                    <li>
                        <a href="<?php echo 'logout.php';?>">Logout</a>
                    </li>
                 </ul>
              </li>
              
             <?php else: ?>
                <!-- neu khong co tai khoan nao thi se hien ra 2 li dang nhap va dang ky -->
             <li><a href="<?php echo 'register.php';?>">Sign Up</a></li>
             <li><a href="<?php echo 'login.php';?>">Login</a></li>
             <?php endif; ?>

       
        </ul>
    </header>