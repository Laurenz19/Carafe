<?php

namespace Events;

class Carafe{
    private $gallonsRestant;
    private $valeurGallons;

    /**
     * Class constructor.
     */
    public function __construct($valeurGallons)
    {
        $this->gallonsRestant = $valeurGallons;
        $this->valeurGallons = $valeurGallons;
    }

    public function remplir(){
        $this->gallonsRestant = $this->valeurGallons;
        echo "(Remplir) Carafe avec {$this->valeurGallons}G: {$this->gallonsRestant}G restant\n";
    }

    public function vider(){
        $this->gallonsRestant =0;
        echo "(Vider) Carafe avec {$this->valeurGallons}G: {$this->gallonsRestant}G restant\n";
    }

    public function estVide(){
        if($this->gallonsRestant<=0){
            return true;
        }
        return false;
    }

    public function estPlein(){
        if($this->gallonsRestant >= $this->valeurGallons){
            return true;
        }
        return false;
    }

    public function getGallonsRestant(){
        return $this->gallonsRestant;
    }

    public function setGallonsRestant($gallons){
        $this->gallonsRestant = $gallons;
    }

    public function getValeurGallons(){
        return $this->valeurGallons;
    }

    public function transvaser(Carafe $carafe){
        
        $gallonsR = $this->gallonsRestant;
        if(($carafe->getGallonsRestant() + $this->gallonsRestant) < $this->valeurGallons){
           
            $this->gallonsRestant += $carafe->getGallonsRestant();
            $carafe->vider();
            //echo "() Carafe avec {$this->valeurGallons}G: {$this->gallonsRestant}G restant\n";
           
        }else{ 
            $this->gallonsRestant += ($this->valeurGallons - $gallonsR);
            $gallons = $carafe->getGallonsRestant() - ($this->valeurGallons - $gallonsR);
            $carafe->setGallonsRestant($gallons);
            echo "(transvaser) Carafe avec {$carafe->valeurGallons}G: {$carafe->gallonsRestant}G restant\n";  
        }
        echo "(transvaser) Carafe avec {$this->valeurGallons}G: {$this->gallonsRestant}G restant\n";
        echo "-------------------------------------------------------------- \n";
    }

}