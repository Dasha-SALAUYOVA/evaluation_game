<?php

class Warrior extends Charact
{

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = $this->damage /3;
    }
    
    public function turn($target) {
        return $this->attack($target);
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup d'épée à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}
