<?php
include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$companys=Company::getCompanys();
$blade=new BladeOne();
echo $blade->run("companys", ["title"=>"Įmonės", "companys"=>$companys]);

$customers=Customer::getCustomers();
$blade=new BladeOne();
echo $blade->run("customers", ["title"=>"Klientai", "customers"=>$customers]);

$conversations=Conversation::getConversations();
$blade=new BladeOne();
echo $blade->run("conversations", ["title"=>"Susitikimai", "conversations"=>$conversations]);

//if ($_GET['delete_id']){
//    $company=Company::getCompany($_GET['delete_id']);
//    $company->deleteCompany();
//}
/*$c=Company::getCompany(2);
echo "Firma: $c->name, telefono nr. $c->phone ";
$c->phone=5555;
$c->save();
echo "Firma: $c->name, telefono nr. $c->phone ";

$c2=new Company('nauja parduptuve', 'Ruko 5', 'LT54545454', 'Aibe', '852582522','sdfj@kdsnjf.li');

$c2->insert($c2->name,$c2->address,$c2->vat_code,$c2->company_name,$c2->phone,$c2->email);

$company=Company::getCompany(3);
$company->delete();*/