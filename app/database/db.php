<?php
 require('connect.php');

function dd($value){
    echo "<pre>",print_r($value,true),"</pre>";
    die();
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
       
       $stmt=$conn->prepare($sql);
       $values=array_values($conditions);
       $types=str_repeat('s',count($values));
       $stmt->bind_param($types,...$values);
       $stmt->execute();
       $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       return $records;

    }
 
}
$conditions=[
'admin'=>1,
'username'=>'Awa'
];
$users = selectALL('users',$conditions);
dd($users);