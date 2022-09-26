<?php

class Conversation
{
    public $id;
    public $customer_id;
    public $date;
    public $conversation;

    private $customer;

    /**
     * @param $customer_id
     * @param $date
     * @param $conversation
     */
    public function __construct($customer_id, $date, $conversation, $id=null)
    {
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
        $this->id=$id;
    }
    public function getCustomer(){
        if ($this->customer==null){
            $this->customer= Customer::getCustomer($this->customer_id);
        }
        return  $this->customer;
    }

    /**
     * @param null $id
     * @return Conversation
     */
    public static function getConversation($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $conversation=new Conversation($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
        return $conversation;
    }

    /**
     * @param null $customer_id
     * @return Conversation[]
     */
    public static function getConversations($customer_id = null){
        $pdo=DB::getPDO();
        if ($customer_id!==null){
            $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
            echo "SELECT * FROM contact_information WHERE customers_id=$customers_id <br>";
            $stm->execute([$customers_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM contact_information ");
            $stm->execute([]);
        }
        $conversations=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $conversations[]=new Conversation($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
        }
        return $conversations;
    }

    public function saveConversations(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO contact_information (customer_id, date, conversation) VALUES (?,?, ?)");
            $stm->execute([$this->customer_id, $this->date,$this->conversation, $this->id]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE contact_information SET customer_id=?,date=?,conversation=? WHERE id=?");
            $stm->execute([$this->customer_id, $this->date,$this->conversation, $this->id]);
        }
    }

    public function deleteConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM contact_information WHERE id=?");
        $stm->execute([ $this->id ]);}

}