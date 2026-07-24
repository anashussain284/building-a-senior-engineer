<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Vehicle;

final class VehiclePresenter
{
	public function show(Vehicle $vehicle)
	{
		echo <<<TEXT
VEHICLE DETAILS
-----------------
Name  : {$vehicle->name}
Engine: {$vehicle->engine()}
Fuel  : {$vehicle->fuel()}

TEXT;
	}
}