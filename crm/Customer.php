<?php

class Customer
{
public $id;
public $name;
public $surname;
public $phone;
public $email;
public $address;
public $position;
public $company_id;



    /**
     * @param $name
     * @param $surname
     * @param $phone
     * @param $email
     * @param $address
     * @param $position
     * @param $company_id
     */
    public function __construct($name, $surname, $phone, $email, $address, $position, $company_id, $id=null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
        $this->id=$id;
    }
    public function getCompany(){
        if ($this->company==null){
            $this->company= Company::getCompany($this->company_id);
        }
        return  $this->company;
    }

    /**
     * @param null $id
     * @return Customer
     */
    public static function getCustomer($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $customer=new Customer($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'],$c['id']);
        return $customer;
    }

    /**
     * @param null $company_id
     * @return Customer[]
     */
    public static function getCustomers($company_id = null){
        $pdo=DB::getPDO();
        if ($company_id!==null){
            $stm=$pdo->prepare("SELECT * FROM customers WHERE company_id=?");
            echo "SELECT * FROM customers WHERE company_id=$company_id <br>";
            $stm->execute([$company_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM customers ");
            $stm->execute([]);
        }
        $customers=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $customers[]=new Customer($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'],$c['id']);
        }
        return $customers;
    }

    public function getConversations() {
        if ($this->conversations==null){
            $this->conversations=Customer::getConversations($this->id);
        }
        return $this->conversations;
    }

    public function saveCustomer(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO customers (name, surname, phone, email, address, position, company_id) VALUES (?,?, ?, ?, ?,?,?)");
            $stm->execute([$this->name, $this->surname,$this->phone, $this->email,$this->address, $this->position, $this->company_id]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE customers SET name=?,surname=?,phone=?, email=?, address=?, position=?, company_id=?,  WHERE id=?");
            $stm->execute([$this->name, $this->surname,$this->phone, $this->email,$this->address, $this->position, $this->company_id, $this->id]);
        }
    }

    public function deleteCustomer(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM customers WHERE id=?");
        $stm->execute([ $this->id ]);}
}