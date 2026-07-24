src/
├── Contracts/ ✅
│   ├── AutomationFeature.php ✅
│   ├── ConnectivityFeature.php ✅
│   ├── NotificationFeature.php ✅
│   ├── PowerFeature.php ✅
│   └── MonitoringFeature.php ✅
│
├── Models/ ✅
│   ├── DeviceStatus.php ✅
│   └── SmartDevice.php ✅
│
├── Services/
│   ├── Automation/
│   │   ├── ScheduleAutomation.php
│   │   ├── MotionAutomation.php
│   │   └── NoAutomation.php
│   │
│   ├── Connectivity/
│   │   ├── WifiConnectivity.php
│   │   ├── BluetoothConnectivity.php
│   │   └── ZigbeeConnectivity.php
│   │
│   ├── Monitoring/
│   │   ├── TemperatureMonitoring.php
│   │   ├── CameraMonitoring.php
│   │   └── EnergyMonitoring.php
│   │
│   ├── Notifications/
│   │   ├── PushNotification.php ✅
│   │   ├── EmailNotification.php
│   │   └── SilentNotification.php
│   │
│   ├── Power/
│   │   ├── BatteryPower.php ✅
│   │   ├── ElectricPower.php
│   │   └── SolarPower.php
│   │
│   └── DevicePresenter.php
│
app.php
