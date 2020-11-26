<?php
include("C:/xampp/htdocs/blog/app/database/db.php");
include("C:/xampp/htdocs/blog/app/helpers/validatePost.php");


$table='posts';
$topics=selectAll('topics');
$posts=selectAll($table);

$errors=array();
         $title="";
         $body="";
         $topic_id="";
         $published="";


if(isset($_POST['add-post'])){ 
    
    $errors=validatePost($_POST);
    if(!empty($_FILES['image']['name']))
     {
        $image_name=time().'_'.$_FILES['image']['name'];
        $destination="C:/xampp/htdocs/blog/assets/images/".$image_name;
        $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);
        if($result){
             $_POST['image']=$image_name;
        }else{
            array_push($errors,"Failed to upload image");
        }
    }else{
        array_push($errors,"post image required");
    }
    if(count($errors)==0){
        unset($_POST['add-post']);
        $_POST['user_id']=1;
        $_POST['published']=isset($_POST['published']) ? 1:0;
        $_POST['body']=htmlentities($_POST['body']);
    
   
        $post_id=create($table,$_POST);
        $_SESSION['message']="Post created successfully";
        $_SESSION['type']="success";
        header('location:../../admin/posts/index.php');
    }
     else{
         $title=$_POST['title'];
         $body=$_POST['body'];
         $topic_id=$_POST['topic_id'];
         $published=isset($_POST['published']) ? 1:0;
     }
}