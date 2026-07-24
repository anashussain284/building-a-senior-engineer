src/
├── Contracts/ ✅
│   ├── EngineFeature.php ✅
│   ├── FuelFeature.php ✅
│   ├── NavigationFeature.php ✅
│   ├── SafetyFeature.php ✅
│   └── TransmissionFeature.php ✅
│
├── Models/
│   ├── Specification.php ✅
│   └── Vehicle.php ✅
│
├── Services/
│   ├── Engines/
│   │   ├── PetrolEngine.php ✅
│   │   ├── DieselEngine.php
│   │   └── ElectricMotor.php
│   │
│   ├── Fuel/
│   │   ├── PetrolFuel.php ✅
│   │   ├── DieselFuel.php
│   │   └── BatteryFuel.php
│   │
│   ├── Navigation/
│   │   ├── GpsNavigation.php
│   │   ├── PremiumNavigation.php
│   │   └── NoNavigation.php
│   │
│   ├── Safety/
│   │   ├── BasicSafety.php
│   │   ├── AdvancedSafety.php
│   │   └── AutonomousSafety.php
│   │
│   ├── Transmission/
│   │   ├── ManualTransmission.php
│   │   ├── AutomaticTransmission.php
│   │   └── SingleSpeedTransmission.php
│   │
│   └── VehiclePresenter.php ✅
│
app.php ✅