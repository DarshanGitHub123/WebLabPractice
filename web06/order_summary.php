<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        table, th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        h2 { margin-top: 40px; }
        .address { background: #fff; padding: 15px; border: 1px solid #999; margin-bottom: 20px; }
    </style>
</head>
<body>

<h1>Order Summary</h1>

<?php
// Prices
$items = [
    "Ethernet Cable (2 m.)" => ["price" => 150, "qty" => intval($_GET['cableQty'])],
    "Router" => ["price" => 3000, "qty" => intval($_GET['routerQty'])],
    "Adapter" => ["price" => 280, "qty" => intval($_GET['adapterQty'])]
];

// Filter items with qty > 0
$ordered_items = array_filter($items, fn($item) => $item['qty'] > 0);

// Calculate total
$total = 0;
foreach ($ordered_items as $name => $item) {
    $total += $item['price'] * $item['qty'];
}

// Add shipping charge
$shipping = 0;
if ($total > 0 && $total < 1000) {
    $shipping = $total * 0.10;
}

$grandTotal = $total + $shipping;
?>

<?php if (count($ordered_items) > 0): ?>
<table>
    <tr>
        <th>Product</th>
        <th>Price (Rs.)</th>
        <th>Quantity</th>
        <th>Total (Rs.)</th>
    </tr>
    <?php foreach ($ordered_items as $name => $item): ?>
    <tr>
        <td><?= htmlspecialchars($name) ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['qty'] ?></td>
        <td><?= $item['price'] * $item['qty'] ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="right"><strong>Shipping Charges</strong></td>
        <td><?= number_format($shipping, 2) ?></td>
    </tr>
    <tr>
        <td colspan="3" align="right"><strong>Grand Total</strong></td>
        <td><strong><?= number_format($grandTotal, 2) ?></strong></td>
    </tr>
</table>
<?php else: ?>
    <p><strong>No items selected in your order.</strong></p>
<?php endif; ?>

<h2>Shipping Address</h2>
<div class="address">
    <p><strong>Name:</strong> <?= htmlspecialchars($_GET['shippingName']) ?></p>
    <p><strong>Locality:</strong> <?= htmlspecialchars($_GET['shippingLocality']) ?></p>
    <p><strong>City:</strong> <?= htmlspecialchars($_GET['shippingCity']) ?></p>
    <p><strong>State:</strong> <?= htmlspecialchars($_GET['shippingState']) ?></p>
    <p><strong>PIN:</strong> <?= htmlspecialchars($_GET['shippingPin']) ?></p>
</div>

<h2>Billing Address</h2>
<div class="address">
    <p><strong>Name:</strong> <?= htmlspecialchars($_GET['billingName']) ?></p>
    <p><strong>Locality:</strong> <?= htmlspecialchars($_GET['billingLocality']) ?></p>
    <p><strong>City:</strong> <?= htmlspecialchars($_GET['billingCity']) ?></p>
    <p><strong>State:</strong> <?= htmlspecialchars($_GET['billingState']) ?></p>
    <p><strong>PIN:</strong> <?= htmlspecialchars($_GET['billingPin']) ?></p>
</div>

</body>
</html>
