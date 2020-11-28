<?php include("app/controllers/posts.php");

if(isset($_GET['id'])){
    $post=selectOne('posts',['id'=>$_GET['id']]);

}
$topics =selectAll('topics');
$posts= selectAll('posts',['published'=>1]);
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
    <title><?php echo $post['title']; ?> | AwaInspires</title>
</head>

<body>
<?php include("app/includes/header.php") ?>
    <!--  -->
    <div class="page-wrapper">

        <!-- nội dung -->
        <div class="content clearfix">
            <div class="main-content single">
                <h1 class="post-title"><?php echo $post['title']; ?></h1>
                <div class="post-content">
                   <?php echo html_entity_decode($post['body']); ?>
                </div>
            </div>
            <!-- video 6 -->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular</h2>

                    <?php foreach($posts as $p): ?>
                        <div class="post clearfix">
                        <img src="<?php echo 'assets/images/'.$p['image']; ?>" alt="">
                        <a href="#" class="title">
                            <h4><?php echo $p['title'] ?></h4>
                        </a>
                    </div>
                    <?php endforeach; ?>
                    

                </div>
                <div class="section toppics">
                    <h2 class="section-title">Toppics</h2>
                    <ul>
                        <?php foreach($topics as $topic): ?>
                           <li><a href="<?php echo 'index.php?t_id='.$topic['id'].'&name='.$topic['name'] ?>"><?php echo $topic['name']; ?> </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- video6 -->
        </div>
        <!-- nội dung -->
    </div>
    <?php include("app/includes/footer.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- nheiu anh truoi -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>