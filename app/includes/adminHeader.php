<header>
        <!-- <a class="logo" href="../../index.php"> -->
        <a class="logo" href="/blog/index.php">
            <h1><span>Awa</span>Inspires</h1>
        </a>
        <ul>
        <?php if(isset($_SESSION['username'])): ?>
            <li>
                <a href="#">
                <i class="glyphicon glyphicon-user" id="user"></i>
                <?php echo $_SESSION['username']; ?>
                 <i class="fa fa-caret-down" id="down"></i>
                 </a>
                <ul>
                    <li>
                        <a href="<?php echo '/blog/logout.php' ?>">Logout</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
            
        </ul>
    </header>