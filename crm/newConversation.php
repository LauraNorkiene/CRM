<?php
include_once "DB.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$newConversation=Conversation::getConversations();

$blade3=new BladeOne();
echo $blade3->run("newConversation", ["title"=>"Pridėti susitikimą", "newConversation"=>$newConversation]);

if (isset($_POST['action']) && $_POST['action'] == 'insert') {
$newConversation=new Conversation($_POST['customer_id'], $_POST['date'], $_POST['conversation']);

$newConversation->saveConversations();
header("location:index.php");
die();
    }