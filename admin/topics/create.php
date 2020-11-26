<?php include("C:/xampp/htdocs/blog/app/controllers/topics.php"); ?>
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
    <title>Admin Section - Add Topic</title>
</head>

<body>
    <?php include("../../app/includes/adminHeader.php"); ?>
    <div class="admin-wrapper">
    <?php include("../../app/includes/adminSidebar.php"); ?>
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn bnt-big">Add Topic</a>
                <a href="index.php" class="btn bnt-big">Manage Topics</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Topic</h2>
                <?php include("../../app/helpers/formErrors.php") ?>
                <form action="create.php" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" id="" value="<?php echo $name ?>" class="text-input">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description ?></textarea>
                    </div>
                    <div>
                        <input type="submit" name="add-topic" class="btn btn-big" value="Add Topic"></input>
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