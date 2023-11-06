<?php
namespace App\Entities;

use Illuminate\Support\Facades\Cache;

class Bicycle {

    private $isMoving;

    public function __construct() {
        $this->isMoving = Cache::get('bicycle_is_moving', false);   
     }

    public function pedal() {
        if($this->isMoving) {
            throw new \Exception("Already pedaling");
        }

        $this->isMoving = true;
        Cache::put('bicycle_is_moving', $this->isMoving);
        echo "Started pedaling. The bicycle is now moving.";
    }

    public function brake() {
        if(!$this->isMoving) {
            throw new \Exception("Bike is already stopped");
        }

        $this->isMoving = false;
        Cache::put('bicycle_is_moving', $this->isMoving);
        echo "Brakes Applied, Bike has stopped";
        
    }

    public function status() {
        return ($this->isMoving) ? "The Bike is moving" : "The Bike is stopped";
    }

}