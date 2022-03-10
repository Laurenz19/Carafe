<?php

namespace Events;
use Events\Carafe;

class Events{
    private $carafe1;
    private $carafe2;
    private $remainGallons;

    /**
     * Class constructor.
     */
    public function __construct(Carafe $carafe1, $carafe2, $remainGallons)
    {
        $this->carafe1 = $carafe1;
        $this->carafe2 = $carafe2;
        $this->remainGallons = $remainGallons;
    }

    public function start(){
        /**
         * pour carafe 1 ==> 4
         * & carafe 2 ==>3
         * et reste 2G dans le carafe 1
         */
        echo "\n \n ------------------------- Initiation ----------------------------- \n";
        $this->carafe1->vider();
        $this->carafe2->remplir();
        echo "------------------------------------------------------------------- \n \n";
        do{
            $this->carafe1->transvaser($this->carafe2);

            if($this->carafe1->estPlein()){
                $this->carafe1->vider();
            }

            if($this->carafe2->estVide()){
                $this->carafe2->remplir();
            }

        }while($this->carafe2->getGallonsRestant() != $this->remainGallons);
        
        $this->carafe1->transvaser($this->carafe2);
        $this->carafe2->vider();

        echo "Resultat : \n";
        echo "Carafe avec {$this->carafe1->getValeurGallons()}G: {$this->carafe1->getGallonsRestant()}G restant \n";
        echo "Carafe avec {$this->carafe2->getValeurGallons()}G: {$this->carafe2->getGallonsRestant()}G restant \n";
    }
}