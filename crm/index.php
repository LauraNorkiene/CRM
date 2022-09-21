<?php
include_once "DB.php";
include_once "Company.php";

$c=Company::getCompany(2);
echo "Firma: $c->name, telefono nr. $c->phone ";
$c->phone=5555;
$c->save();
echo "Firma: $c->name, telefono nr. $c->phone ";

/*$c2=new Company('nauja parduptuve', 'Ruko 5', 'LT54545454', 'Aibe', '852582522','sdfj@kdsnjf.li');
print_r($c2);
$c2->insert($c2->name,$c2->address,$c2->vat_code,$c2->company_name,$c2->phone,$c2->email);*/

/*$company=Company::getCompany(3);
$company->delete();*/