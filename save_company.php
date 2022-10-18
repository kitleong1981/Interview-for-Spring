<?php
include "conf.php";

$error="";

$company_name=htmlspecialchars(trim($_POST["company_name"]));
$company_address=htmlspecialchars(trim($_POST["company_address"]));

if (strlen($company_name) >200) $error.="Sorry, your Company name is over 200 characters.<br />";
if (empty($company_name)) $error.="Sorry, your Company name is empty.<br />";
if (strlen($company_address) >255) $error.="Sorry, your Company address is over 255 characters.<br />";
if (empty($company_address)) $error.="Sorry, your Company address is empty.<br />";

//check duplicate
$sql="select Id from company_db where name='$company_name'";
$datas=get_data($sql);
if (!empty($datas)) $error.="Sorry, this Company name was already build.<br />";

if ($error !="") {
    $_SESSION["error"]=$error;
    header("Location: index.php?func=buildcompany");
    die();
}

$sql="insert into company_db values ('','$company_name', '$company_address')";
if (sql_cmd($sql)) {
    $_SESSION["error"]="Thanks, company data stored in our database";
    header("Location: index.php");
} else {
    $_SESSION["error"]="Sorry, company data can not be stored in our database, please try again!";
    header("Location: index.php");
};
?>