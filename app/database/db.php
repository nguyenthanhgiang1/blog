<?php
session_start();
 require('connect.php');



// in ra gia tri truyen vao
function dd($value){
    echo "<pre>",print_r($value,true),"</pre>";
    die();
}


function executeQuery($sql,$data)
{
    global $conn;
   $stmt= $conn->prepare($sql);
       $values=array_values($data);
       $types=str_repeat('s',count($values));
       $stmt->bind_param($types,...$values);
       $stmt->execute();
    return $stmt;
}


function selectAll($table,$conditions=[])
{
    global $conn;
    $sql="select * from $table";
    if(empty($conditions)){
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
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
       return $records;
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
       return $records;
}

//them moi
function create($table,$data)
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



function update($table,$id,$data)
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



function delete($table,$id)
{
    global $conn;
    $sql="delete from $table where id=?";

    $stmt=executeQuery($sql,['id'=>$id]);
    return $stmt->affected_rows;
}


function getPulishedPosts()
{
    global $conn;
    $sql="select p.*, u.username from posts as p join users as u on p.user_id=u.id where p.published=?";

    $stmt=executeQuery($sql,['published'=>1]);
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function searchPosts($term)
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
