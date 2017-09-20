<?php
    define('title', 'Menu Item');
    include('includes/header.php');

    function strip_bad_characters($input) {
        $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }

    if (isset($_GET['item'])) {
        $menuItem = strip_bad_characters ($_GET['item']);
        $dish = $menuItems[$menuItem];
    }

    function suggested_tip($price, $tip) {
        $totalTip = $price * $tip;
        return $totalTip;
    }
?>

<hr>

<div id="dish">
    <h1><?php echo $dish[title]; ?><span class="price">$<?php echo $dish[price]; ?></span></h1>
    <p><?php echo $dish[blurb]; ?></p>
    
    <br>
    
    <p><strong>Suggested Beverage: <?php echo $dish[drink]; ?></strong></p>
    <p><em>Suggested Tip: $<?php echo suggested_tip($dish["price"], 0.15); ?></em></p>
</div>

	
<hr>
	
<a href="menu.php" class="button previous">&laquo; Back to Menu</a>
			
<?php include('includes/footer.php'); ?>

