<?php
include_once "DB.php";
include_once "Customer.php";
include_once "Company.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$newCustomer=Customer::getCustomers();
$company=Company::getCompanys();

$blade4=new BladeOne();
echo $blade4->run("newCustomer", ["title"=>"Pridėti įmonę", "newCustomer"=>$newCustomer, "company"=>$company]);

if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $newCustomer = new Customer($_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['position'], $_POST['company_id']);

    $newCustomer->saveCustomer();
    header("location:index.php");
    die();
}
