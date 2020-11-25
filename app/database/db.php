<?php
 require('connect.php');

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
function create($table,$data){
    global $conn;
    $sql="insert into users set";
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
$data=[
    'username'=>'Melvine',
    'admin'=>1,
    'email'=>'melvine@melvine.com',
    'password'=>'melvine'
];
$id = create('users',$data);
dd($id);