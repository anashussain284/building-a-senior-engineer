<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductPresenter;
use App\Models\Product;
use App\Models\Money;

use App\Services\Pricing\FixedPrice;
use App\Services\Pricing\DiscountPrice;
use App\Services\Inventory\FiniteInventory;
use App\Services\Inventory\InfiniteInventory;
use App\Services\Inventory\OutOfStockInventory;
use App\Services\Reviews\SimpleReviews;
use App\Services\Shipping\PaidShipping;

$money = new Money(
	amountInCent: 10000,
	currency: 'USD'
);
$fixedPrice = new FixedPrice($money);
$discountPrice = new DiscountPrice(amount: 20000, discount: 75);
$finiteInventory = new FiniteInventory(quantity: 1);
$infiniteInventory = new InfiniteInventory();
$outOfStockInventory = new OutOfStockInventory();
$simpleReviews = new SimpleReviews(rating: 4.5);
$paidShipping = new PaidShipping(amount: 500);

$mobile = new Product(
	name: 'Mobile',
	pricing: $discountPrice,
	inventory: $outOfStockInventory,
	review: $simpleReviews,
	shipping: $paidShipping,
);
$productPresenter = new ProductPresenter();
$productPresenter->show(product: $mobile);