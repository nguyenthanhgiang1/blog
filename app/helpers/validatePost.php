<?php
function validatePost($post)//bai dang co loi gi khong
{
    $errors=array();
    if(empty($post['title'])){
        array_push($errors,'Title is required');//cac loi rong
    }
    if(empty($post['body'])){
        array_push($errors,'Body is required');
    }
    if(empty($post['topic_id'])){
        array_push($errors,'Please select a topic');
    }
 
    $existingPost=selectOne('posts',['title'=>$post['title']]);//lay 1 ban ghi voi dieu kien khac nhau
    if(isset($existingPost)){
        if(isset($post['update-post'])&& $existingPost['id']!=$post['id']){
            array_push($errors,'Post with that title already exists');//bai dang voi tieu de da ton tai
        }
        if(isset($post['add-post'])){
            array_push($errors,'Post with that title already exists');
        }
    }
    return $errors;//tra ve so loi
}