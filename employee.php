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
include "config/connect.php";
$pagetitle = "Index";
//etc
//$sql = "SELECT * FROM TM03_employee";
$sql = "SELECT tm03_employee.EmplCode, tm03_employee.EmplType, tm03_employee.EmplTName, tm02_department.DeptTDesc, tm02_position.PosiTDesc, tm03_employee.Sex ";
$sql .= "FROM tm03_employee ";
$sql .= "INNER JOIN tm02_department ON tm03_employee.DeptCode=tm02_department.DeptCode ";
$sql .= "INNER JOIN tm02_position ON tm03_employee.PosiCode=tm02_position.PosiCode";

$DATA = mysql_query($sql);

//and then call a template:
$tpl = "";
$detail = "template/employee/emptable.php";
$footer = "";
include "template/layout.php";

?>