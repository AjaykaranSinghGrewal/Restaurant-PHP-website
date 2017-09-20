<?php 
define('title', 'The Team');
include('includes/header.php'); ?>

<div id="team-members" class="cf">
    <h1> Our Team at Franklin's</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vestibulum nulla vitae nulla lobortis volutpat. Proin egestas dolor hendrerit sapien tempor, vel convallis ante commodo. Praesent dignissim tempor convallis. Proin egestas massa nec libero rhoncus, vitae tempus mauris convallis.</p>
    
    <hr>
    
    <?php 
        foreach($teamMembers as $member) {
    ?>
        
        <div class="member">
            <img src="img/<?php echo $member['img']; ?>.png" alt="<?php echo $member[name]; ?>">
            <h2><?php echo $member[name]; ?></h2>
            <p><?php echo $member[bio] ?></p>
            
        </div>
    
    <?php
        }
    ?>
    <hr>
</div>


<?php include('includes/footer.php'); ?>