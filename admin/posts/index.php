<?php include("C:/xampp/htdocs/blog/app/controllers/posts.php") ?>
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
    <title>Admin Section - Manage Posts</title>
</head>

<body>
    <?php include("../../app/includes/adminHeader.php"); ?>
    <div class="admin-wrapper">
    <?php include("../../app/includes/adminSidebar.php"); ?>
    <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn bnt-big">Add Post</a>
                <a href="index.php" class="btn bnt-big">Manage Posts</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>
                <?php include('C:/xampp/htdocs/blog/app/includes/messages.php'); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Athour</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach($posts as $key =>$post): ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $post['title'];  ?></td>
                            <td>Awa</td>
                            <td><a href="edit.php?id=<?php echo $post['id'] ?>" class="edit">edit</a></td>
                            <td><a href="edit.php?delete_id=<?php echo $post['id'] ?>" class="delete">delete</a></td>
                            <?php if($post['published']):?>
                                <td><a href="#" class="unpublish">unpublish</a></td>
                            <?php else: ?>
                            <td><a href="#" class="publish">publish</a></td>
                            <?php endif; ?>
                           
                        </tr> 
                    <?php endforeach; ?>
                        
                    </tbody>
                </table>
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