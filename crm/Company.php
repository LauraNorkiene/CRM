<?php

class Company
{
    public $id;
    public $name;
    public $address;
    public $vat_code;
    public $company_name;
    public $phone;
    public $email;

    /**
     * @param $id
     * @param $name
     * @param $address
     * @param $vat_code
     * @param $company_name
     * @param $phone
     * @param $email
     */
    public function __construct($name, $address, $vat_code, $company_name, $phone, $email, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->vat_code = $vat_code;
        $this->company_name = $company_name;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * jei nera id vykdo naujos kompanijos pridejima,
     * jei id yra vykdo esamos kompanijos atnaujinima-pakeitima.
     */

    public function saveCompany(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO companys (name, address, vat_code, company_name,phone, email) VALUES (?,?, ?, ?, ?,?)");
            $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE companys SET name=?, address=?, vat_code=?, company_name=?, phone=?, email=? WHERE id=?");
            $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email, $this->id]);
        }

    }

    /*public function save(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("UPDATE companys SET name=?, address=?, vat_code=?, company_name=?, phone=?, email=? WHERE id=?");
        $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email, $this->id]);
    }*/

    public function deleteCompany(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM companys WHERE id=?");
        $stm->execute([ $this->id ]);}

    /*public static function insert($name, $address, $vat_code, $company_name,$phone, $email){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO companys (name, address, vat_code, company_name,phone, email) VALUES (?,?, ?, ?, ?,?)");
        $stm->execute([$name, $address, $vat_code, $company_name, $phone, $email]);}*/

    public static function getCompany($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companys WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $company=new Company($c['name'],$c['address'],$c['vat_code'],$c['company_name'],$c['phone'],$c['email'],$id);
        return $company;
    }

    public static function getCompanys(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companys");
        $stm->execute([]);
        $companys=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $companys[]=new Company($c['name'],$c['address'],$c['vat_code'],$c['company_name'],$c['phone'],$c['email'],$c['id']);
        }
        return $companys;
    }

    public function getCustomers() {
        if ($this->customers==null){
            $this->customers=Customer::getCustomer($this->id);
        }
        return $this->customers;
    }


}