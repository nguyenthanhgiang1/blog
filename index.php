<?php
// include("C:/xampp/htdocs/blog/app/database/db.php");
include("C:/xampp/htdocs/blog/app/controllers/topics.php"); 
$post=array();
$postsTitle='Recent Posts';

// dd($posts);
if(isset($_POST['search-term'])){
    $postsTitle="You searched for '".$_POST['search-term']."'";
   $posts= searchPosts($_POST['search-term']);
}else{
    $posts=getPulishedPosts();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include("app/includes/header.php");?>
    <?php include("app/includes/messages.php");?>
    <!-- <div class="hu">a</div> -->
    <!--  -->
    <div class="page-wrapper">
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="glyphicon glyphicon-chevron-left prev"></i>
            <i class="glyphicon glyphicon-chevron-right next"></i>
            <div class="post-wrapper">
            <?php foreach($posts as $key =>$post): ?>
                <div class="post">
                    <img src="<?php echo 'assets/images/'.$post['image']; ?>" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="#"><?php echo $post['title']; ?></a></h4>
                        <i class="fa fa-user-o" aria-hidden="true"><?php echo $post['username']; ?></i>&nbsp;
                        <i class="glyphicon glyphicon-calendar"><?php echo date('F j, Y',strtotime($post['created_at'])); ?></i>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <!-- nội dung -->
        <div class="content clearfix">
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>
                <?php foreach($posts as $key =>$post): ?>
                <div class="post clearfix">
                    <img src="<?php echo 'assets/images/'.$post['image']; ?>" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="#"><?php echo $post['title']; ?></a></h2>
                        <i class="fa fa-user-o"><?php echo $post['username']; ?></i> &nbsp;
                        <i class="glyphicon glyphicon-calendar"><?php echo date('F j, Y',strtotime($post['created_at'])); ?></i>
                        <p class="preview">
                           <?php echo html_entity_decode(substr($post['body'],0,150).'...') ;?>
                        </p>
                        <a href="single.html" class="btn read-more">Read More</a>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
            <!-- video 6 -->
            <div class="sidebar">
                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" method="POST">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...">
                    </form>
                </div>
                <div class="section toppics">
                    <h2 class="section-title">Toppics</h2>
                    <ul>

                    <?php foreach($topics as $key =>$topic): ?>
                        <li><a href="#"><?php echo $topic['name']; ?></a></li>
                       <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- video6 -->
        </div>
        <!-- nội dung -->
    </div>
    <!--  -->
    <?php include("app/includes/footer.php") ?>
    <!-- video7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- nheiu anh truoi -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>