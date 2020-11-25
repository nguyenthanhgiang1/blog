<?php
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

// $data=[
//     'username'=>'Awa Melvine',
//     'admin'=>1,
//     'email'=>'melvine@melvine.com',
//     'password'=>'melvine'
// ];

$id = delete('users',2);
dd($id);