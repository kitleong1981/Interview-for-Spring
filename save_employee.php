<?php
include "conf.php";

$error="";

$employee_name=htmlspecialchars(trim($_POST["employee_name"]));
$continue_build=(int)($_POST["continue_build"]);
$company_id=(int)($_POST["company_id"]);

if (strlen($employee_name) >200) $error.="Sorry, your Employee name is over 200 characters.<br />";
if (empty($employee_name)) $error.="Sorry, your Employee name is empty.<br />";
if ($company_id==0) $error.="Sorry, Comething wrong, please select the company again.<br />";

//check dup
$sql="select Id from employees_db where name='$employee_name' and company='$company_id'";
$datas=get_data($sql);
if (!empty($datas)) $error.="Sorry, this Employee was already build.<br />";

if ($error !="") {
    $_SESSION["error"]=$error;
    header("Location: index.php?func=buildemployee&company_id=$company_id");
    die();
}

$sql="insert into employees_db values ('','$employee_name', '$company_id')";
if (sql_cmd($sql)) {
    $_SESSION["error"]="Thanks, employee data stored in our database";
    $location=($continue_build==1)?"index.php?func=buildemployee&company_id=$company_id":"index.php";
    header("Location: $location");
} else {
    $_SESSION["error"]="Sorry, employee data can not be stored in our database, please try again!";
    header("Location: index.php?func=buildemployee&company_id=$company_id");
};
?>