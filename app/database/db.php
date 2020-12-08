<?php
session_start();
 require('connect.php');



// in ra gia tri truyen vao
function dd($value){
    echo "<pre>",print_r($value,true),"</pre>";
    die();
}


function executeQuery($sql,$data)//truy van voi cac truong du lieu
{
    global $conn;// de dung bien ket noi
   $stmt= $conn->prepare($sql);//cau lenh chuan bi php musqli
       $values=array_values($data);//mang theo ten =>mang theo chi so lan luot 123 ma ko xap xep
       $types=str_repeat('s',count($values));//lap lai so lan chu s
       $stmt->bind_param($types,...$values);//truyen nhieu tham so , van chua hieu ro
       $stmt->execute();//thuc thi
    return $stmt; // tra ve true la thuc thi con lai la false
}


function selectAll($table,$conditions=[])//truy van toan bo hoac co dieu kien
{
    global $conn;
    $sql="select * from $table";
    if(empty($conditions)){
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records; //tra ve toan bang cac ban ghi voi truy van khong co dieu kien
    }else{
        $i=0;
       foreach($conditions as $key => $value){
           if($i===0){
            $sql=$sql." where $key=?";
           }else{
            $sql=$sql." and $key=?";
           }
           $i++;
       }

       $stmt=executeQuery($sql,$conditions);
       $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       return $records;  //tra ve voi 1 hoac nhieu dieu kien where
    }
}



function selectOne($table,$conditions)
{
    global $conn;
    $sql="select * from $table";

        $i=0;
       foreach($conditions as $key => $value){
           if($i===0){
            $sql=$sql." where $key=?";
           }else{
            $sql=$sql." and $key=?";
           }
           $i++;
       }

       $sql=$sql." limit 1";
       $stmt=executeQuery($sql,$conditions);
       $records=$stmt->get_result()->fetch_assoc();
       return $records;// tra ve voi 1 hoac nhieu dieu kien where voi  chi 1 ban ghi
}

//them moi
function create($table,$data)//them du lieu vao bang
{
    global $conn;

    $sql="insert into $table set ";

    $i=0;
       foreach($data as $key => $value){
           if($i===0){
            $sql=$sql." $key=?";
           }else{
            $sql=$sql.", $key=?";
           }
           $i++;
       }

    $stmt=executeQuery($sql,$data);
    $id=$stmt->insert_id;
    return $id;
}



function update($table,$id,$data)//cap nhap du lieu vao bang
{
    global $conn;

    $sql="update $table set ";

    $i=0;
       foreach($data as $key => $value){
           if($i===0){
            $sql=$sql." $key=?";
           }else{
            $sql=$sql.", $key=?";
           }
           $i++;
       }
     
       $sql=$sql." where id=?";
       $data['id'] = $id;
       $stmt=executeQuery($sql,$data);
    return $stmt->affected_rows;
}



function delete($table,$id)//xoa du lieu bang theo id
{
    global $conn;
    $sql="delete from $table where id=?";

    $stmt=executeQuery($sql,['id'=>$id]);
    return $stmt->affected_rows;//tra ve so dong bi tac dong
}


function getPulishedPosts()//nhan cac bai da xuat ban tthi moi hien ra
{
    global $conn;
    $sql="select p.*, u.username from posts as p join users as u on p.user_id=u.id where p.published=?";

    $stmt=executeQuery($sql,['published'=>1]);
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPostsByTopicId($topic_id)//lay ra bai viet theo id va xuat ban =1
{
    global $conn;
    $sql="select p.*, u.username from posts as p join users as u on p.user_id=u.id where p.published=? and topic_id=?";

    $stmt=executeQuery($sql,['published'=>1,'topic_id'=>$topic_id]);
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function searchPosts($term)// tim kiem bai viet theo tu khoa
{ 
    $match='%'.$term.'%';
    global $conn;
    $sql="select p.*, u.username 
          from posts as p 
          join users as u 
          on p.user_id=u.id 
          where p.published=?
          and p.title like ? or p.body like ?";

    $stmt=executeQuery($sql,['published'=>1,'title'=>$match,'body'=>$match]);
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

