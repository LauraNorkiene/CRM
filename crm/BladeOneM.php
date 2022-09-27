<?php

include_once "lib\BladeOne.php";
use \eftec\bladeone\BladeOne;

class BladeOneM extends BladeOne
{
    public function run($view = null, $variables = []): string
    {
        $out=parent::run($view,$variables);
        echo $out;
        return $out;
    }

}