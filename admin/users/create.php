
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Section - Add User</title>
</head>

<body>
    <?php include("../../app/includes/adminHeader.php"); ?>
    <div class="admin-wrapper">
    <?php include("../../app/includes/adminSidebar.php"); ?>
    <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn bnt-big">Add User</a>
                <a href="index.php" class="btn bnt-big">Manage Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add User</h2>
                <form action="create.html" method="post">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" class="text-input">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" class="text-input">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                        <label for="">Password Confirmation</label>
                        <input type="password" name="passwordConf" class="text-input">
                    </div>
                    <div>
                        <label for="">Role</label>
                        <select name="role" id="" class="text-input">
                            <option value="Author">Author</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <buttom type="submit" class="btn btn-big">Add User</buttom>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- nheiu anh truoi -->
    <!-- cheditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>