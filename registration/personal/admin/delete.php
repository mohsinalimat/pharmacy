<?php
session_start();
$k=1;
$id=array();
for($i=1; $i<100000; $i++)
{
    if(isset($_REQUEST["name$i"]))
    {
        $id[$k]=$_REQUEST["name$i"];
        $k=$k+1;
    }
}

for($n=1; $n<$k; $n++)
{
        include_once('connect.php');
    $int=(int)$id[$n]; 
    $pro=$_SESSION['user'];
        $sql="DELETE FROM product  WHERE id='$int' " ;
    $res=mysqli_query($conn, $sql);
        if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
    
 include ("admindeleteproduct.php");   

?>