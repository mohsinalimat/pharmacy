<?php
session_start();
$k=1;
$id=array();
for($i=1; $i<10000000; $i++)
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
        $sql="DELETE FROM link  WHERE idPharmacy='$pro' AND idDrug='$int'" ;
    $res=mysqli_query($conn, $sql);
        if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
    
 include ("deleteproduct.php");   

?>