<?php

// Base class Vehicle
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    // Constructor to initialize the vehicle properties
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding in child classes
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to be overridden by child classes
    public function describe() {
        return "This is a vehicle.";
    }
}

// Car class extending Vehicle
class Car extends Vehicle {
    private $doors;

    // Constructor for Car
    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    // Overriding describe method
    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Final Motorcycle class extending Vehicle
final class Motorcycle extends Vehicle {

    // Constructor for Motorcycle
    public function __construct($make, $model, $year) {
        parent::__construct($make, $model, $year);
    }

    // Overriding describe method
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Interface for electric vehicles
interface ElectricVehicle {
    public function chargeBattery();
}

// ElectricCar class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    // Constructor for ElectricCar
    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implementing chargeBattery method from the interface
    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery charged to 100%.\n";
    }

    // Overriding describe method
    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

// Testing the system with different vehicle types

// Create a Car instance
$car = new Car("Toyota", "Corolla", 2021, 4);
echo $car->getDetails() . "\n";
echo $car->describe() . "\n";

// Create a Motorcycle instance
$motorcycle = new Motorcycle("Harley-Davidson", "Sportster", 2020);
echo $motorcycle->getDetails() . "\n";
echo $motorcycle->describe() . "\n";

// Create an ElectricCar instance
$electricCar = new ElectricCar("Tesla", "Model 3", 2022, 4);
echo $electricCar->getDetails() . "\n";
echo $electricCar->describe() . "\n";
$electricCar->chargeBattery();
