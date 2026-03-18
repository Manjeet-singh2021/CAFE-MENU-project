<?php
// 1. Our Menu Data (The "Database")
$menu = [
    "Midnight Roast"   => 4.50,
    "Honey Oat Latte"  => 5.25,
    "Cold Brew"        => 4.00,
    "Almond Croissant" => 3.75,
    "Lemon Muffin"     => 3.50
];

$tax_rate = 0.08; // 8% Tax
$bill_html = "";

// 2. Process the Bill when "Generate Receipt" is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantities'])) {
    $subtotal = 0;
    $items_ordered = [];

    foreach ($_POST['quantities'] as $item_name => $quantity) {
        $quantity = (int)$quantity;
        if ($quantity > 0 && isset($menu[$item_name])) {
            $line_total = $menu[$item_name] * $quantity;
            $subtotal += $line_total;
            $items_ordered[] = [
                "name" => $item_name,
                "qty"  => $quantity,
                "total" => $line_total
            ];
        }
    }

    if (!empty($items_ordered)) {
        $tax = $subtotal * $tax_rate;
        $grand_total = $subtotal + $tax;

        // Create the Receipt UI
        $bill_html = "<div class='receipt'>";
        $bill_html .= "<h3>--- RECEIPT ---</h3>";
        foreach ($items_ordered as $item) {
            $bill_html .= "<p>{$item['qty']}x {$item['name']} <span>$" . number_format($item['total'], 2) . "</span></p>";
        }
        $bill_html .= "<hr>";
        $bill_html .= "<p>Subtotal: <span>$" . number_format($subtotal, 2) . "</span></p>";
        $bill_html .= "<p>Tax (8%): <span>$" . number_format($tax, 2) . "</span></p>";
        $bill_html .= "<h4>Total: <span>$" . number_format($grand_total, 2) . "</span></h4>";
        $bill_html .= "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; background: #fdf5e6; display: flex; justify-content: center; padding: 50px; 
    }
        .pos-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; }
        .menu-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        input[type="number"] { width: 50px; padding: 5px; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #27ae60; color: white; border: none; cursor: pointer; font-size: 16px; margin-top: 20px; }
        .receipt { margin-top: 30px; padding: 20px; border: 2px dashed #333; background: #fff; font-family: 'Courier New', Courier, monospace; }
        .receipt p { display: flex; justify-content: space-between; margin: 5px 0; }
    </style>
</head>
<body>

<div class="pos-container">
    <h2>☕ Cafe POS System</h2>
    <form method="POST">
        <?php foreach ($menu as $name => $price): ?>
            <div class="menu-item">
                <div>
                    <strong><?php echo $name; ?></strong><br>
                    <small>$<?php echo number_format($price, 2); ?></small>
                </div>
                <input type="number" name="quantities[<?php echo $name; ?>]" value="0" min="0">
            </div>
        <?php endforeach; ?>
        
        <button type="submit">Generate Receipt</button>
    </form>

    <?php echo $bill_html; ?>
</div>

</body>
</html>