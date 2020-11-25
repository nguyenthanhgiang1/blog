<header>
        <div class="logo">
            <h1><span>Awa</span>Inspires</h1>
        </div>
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


             <?php if(isset($_SESSION['id'])): ?>
                <li>
                <a href="#">
                <i class="glyphicon glyphicon-user" id="user"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa fa-caret-down" id="down"></i>
                </a>
                <ul>
                     <?php if($_SESSION['admin']): ?>
                    <li>
                        <a href="<?php echo 'C:/xampp/htdocs/blog/admin/dashboard.php';?>">Dashboard</a>
                    </li>
                     <?php endif; ?>
                    <li>
                        <a href="<?php echo 'logout.php';?>">Logout</a>
                    </li>
                </ul>
            </li>
             <?php else: ?>
             <li><a href="<?php echo 'register.php';?>">Sign Up</a></li>
             <li><a href="<?php echo 'login.php';?>">Login</a></li>
             <?php endif; ?>

       
        </ul>
    </header>