<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\VehiclePresenter;
use App\Models\Vehicle;
use App\Services\Engines\PetrolEngine;
use App\Services\Fuel\PetrolFuel;

$petrolEngine = new PetrolEngine();
$petrolFuel = new PetrolFuel();

$santro = new Vehicle(
	name: 'Santro Xing',
	engine: $petrolEngine,
	fule: $petrolFuel
);

$vehiclePresenter = new VehiclePresenter();
$vehiclePresenter->show(vehicle: $santro);