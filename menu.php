<?php
    define('title', 'Menu');
    include('includes/header.php');
?>

    <div id="menu-items">
        <h1>Our Delicious Menu</h1>
        <p>Maecenas in augue sed urna consectetur bibendum a eget libero. Pellentesque nisi est, elementum a pulvinar a, congue sed ipsum.</p>
        <p><em>Click any item for more details.</em></p>
        
        <hr>
        
        <ul>
            <?php foreach ($menuItems as $key => $item) { ?>
            
            <li><a href="dish.php?item=<?php echo $key; ?>">
                <?php echo $item[title]; ?><sup>   $</sup><?php echo $item[price]; ?>
            </a></li>
            
            <?php } ?>
        </ul>
    </div>

<?php include('includes/footer.php'); ?>