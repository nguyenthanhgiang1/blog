<header>
        <div class="logo">
            <h1><span>Awa</span>Inspires</h1>
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Services</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
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
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
             <?php else: ?>
             <li><a href="<?php echo 'C:/xampp/htdocs/blog/register.php';?>">Sign Up</a></li>
             <li><a href="<?php echo 'C:/xampp/htdocs/blog/login.php';?>">Login</a></li>
             <?php endif; ?>

       
        </ul>
    </header>