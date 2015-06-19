 <?php
error_reporting(0);
session_start();
$_SESSION['uid']='';
$userData='';
if(session_destroy())
{
$url=$base_url.'index.php';
//header("Location: $url");
echo "<script>window.location='$url'</script>";
}
?>
