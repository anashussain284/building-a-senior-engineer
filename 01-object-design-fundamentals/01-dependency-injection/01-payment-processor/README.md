src/
├── Contracts/
│   ├── Logger.php
│   ├── PaymentGateway.php ✅
│   └── ReceiptGenerator.php ✅
│
├── Models/ ✅
│   ├── Payment.php ✅
│   └── PaymentResult.php ✅
│
├── Services/
│   ├── Gateways/
│   │   ├── PayPalGateway.php
│   │   ├── StripeGateway.php
│   │   └── RazorpayGateway.php ✅
│   │
│   ├── Logging/
│   │   ├── ConsoleLogger.php
│   │   └── NullLogger.php
│   │
│   ├── Receipts/
│   │   └── SimpleReceiptGenerator.php
│   │
│   └── PaymentProcessor.php
│
app.php