<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./template/login/login.php");
    exit();
}
//include our settings, connect to database etc.
//include dirname($_SERVER['DOCUMENT_ROOT']).'/cfg/settings.php';
//getting required data
//$DATA=dbgetarr("SELECT * FROM links");
//page
$perpage = 20;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
//page
include "config/connect.php";
include "template/branch/branchaction.php";

if(isset($_POST["search"])){
    $sql = "SELECT * FROM tm02_branch WHERE BranchCode like '%".$_POST['search']."%' OR BranchEName like '%".$_POST['search']."%' OR BranchTName like '%".$_POST['search']."%' OR Address like '%".$_POST['search']."%' OR PhoneNo like '%".$_POST['search']."%'";
}else{
    $sql = "SELECT * FROM tm02_branch";
}

$DATA = mysql_query($sql);
//page
$sql2 = "SELECT * FROM tm02_branch";
$query2 = mysql_query($sql2);
$total_record = mysql_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลแผนก";
$tpl = "";
$detail = "template/branch/branchtable.php";
$modal = "template/branch/branchmodal.php";
$script = "template/branch/branchscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>