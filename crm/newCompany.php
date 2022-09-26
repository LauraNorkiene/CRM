<?php

include_once "DB.php";
include_once "Company.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$newCompany=Company::getCompanys();

$blade2=new BladeOne();
echo $blade2->run("newCompany", ["title"=>"Pridėti įmonę", "newCompany"=>$newCompany]);

if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $newCompany = new Company($_POST['name'], $_POST['address'], $_POST['vat_code'], $_POST['company_name'], $_POST['phone'], $_POST['email']);

    $newCompany->saveCompany();
    header("location:index.php");
    die();
}