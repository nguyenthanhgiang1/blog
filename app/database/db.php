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
        //dfsdklf
        // $sql="select * from $table where username='Awa' and admin=1 ";
        $i=0;
       foreach($conditions as $key => $value){
           if($i===0){
            $sql=$sql." where $key=$value";
           }else{
            $sql=$sql." and $key=$value";
           }
           $i++;
       }
       dd($sql);

    }
 
}
$conditions=[
'admin'=>1,
'username'=>'Awa'
];
$users = selectALL('users',$conditions);
dd($users);