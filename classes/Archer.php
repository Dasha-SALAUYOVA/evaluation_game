<?php

class Archer extends Charact {
    
    public $arrowStock = 8;//le nombre de fleches dans le carquois
    public $point = false;// point => pointer la cible

    public function __construct($name) {
        parent::__construct($name);
    }    

    public function turn($target) {
        $rand = rand(1,100);
        if($this->arrowStock == 0) {
            return $this->dagger($target);
        } else if($rand > 40 || $this->arrowStock <= 1) {
            return $this->arrow($target);
        } else if(($rand <= 40 || $this->point) || $this->point) {
            return $this->doobleArrow($target);
        }
    }

    public function arrow($target) {
        $rand = rand(1, 2);
        $target->setHealthPoints($this->damage);
        $this->arrowStock -= 1;
        $status = "$this->name attaque avec une fleche. il reste $target->healthPoints points de vie à $target->name...";
        return $status;
    }

    public function doobleArrow($target) {
        $doobleArrowDamage = $this->damage * 2;
        $target->setHealthPoints($doobleArrowDamage);
        $this->arrowStock -= 2;
        $status = "$this->name lance l'attaque speciale : Double-Fleche ! Il reste $target->healthPoints points de vie à $target->name";
        return $status;
    }
    
    
    //если готовится к метанию 2 стрел,
    //то пропускает ход, теряет жизни
           
    public function point() {
        $rand = rand(1, 2);
        $this->point = true;
        $status = "Archer se prepare pour viser la cible avec deux fleches, pendant ce temps...";    
        return $status;    
    }

    public function dagger($target) {
        $daggerDamage = $this->damage / 5;
        $target->setHealthPoints($daggerDamage);
        $status = "Il ne reste plus de fleches dans le carquois de $this->name, il utilise une dague pour attaquer $target->name. $target->name a $target->healthPoints points de vie.";
        return $status;
    }
}


