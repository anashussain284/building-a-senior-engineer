src/
├── Contracts/
│   ├── InventoryFeature.php ✅
│   ├── PricingFeature.php ✅
│   ├── ReviewFeature.php
│   └── ShippingFeature.php
│
├── Models/
│   ├── Money.php ✅
│   └── Product.php
│
├── Services/
│   ├── Inventory/
│   │   ├── FiniteInventory.php
│   │   ├── InfiniteInventory.php
│   │   └── OutOfStockInventory.php
│   │
│   ├── Pricing/
│   │   ├── FixedPrice.php
│   │   ├── DiscountPrice.php
│   │   └── PremiumPrice.php
│   │
│   ├── Reviews/
│   │   ├── EmptyReviews.php
│   │   ├── SimpleReviews.php
│   │   └── FeaturedReviews.php
│   │
│   ├── Shipping/
│   │   ├── FreeShipping.php
│   │   ├── PaidShipping.php
│   │   └── DigitalShipping.php
│   │
│   └── ProductPresenter.php
│
app.php