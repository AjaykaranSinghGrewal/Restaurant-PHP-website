<?php 
    define('title', 'Contact Us');
    include('includes/header.php');
?>

<div id="contact">
    <hr>
    <h1>Get In Touch!</h1>
    
    <?php 
        //Check header injections
        function hasHeaderInjection($str) {
            return preg_match("/[\r\n]/", $str);
        }
    
        if( isset($_POST['contact_submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = $_POST['messgae'];
            
            //check if name or email has header injections
            if(hasHeaderInjection($name) || hasHeaderInjection($email)) {
                die(); //Kill the script
            }
            
            if( !$name || !$email || !$messgage ) {
                echo '<h4 class="error">All Fields Required.</h4><a href="contact.php" class="button block">Go back and Try Again!</a>';
                exit;
            }
            
            //add recipient
            $to = "yoyo@email.com";
            
            //subject
            $subject = "$name sent you a message";
            
            //message
            $msg = "Name: $name\r\n";
            $msg .= "Email: $email\r\n";
            $msg .= "Message: $message\r\n";
            
            //subscribe was checked?
            if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscibe') {
                $msg .= "\r\n\r\nPlease add $email to the mailing list";
            }
            
            $msg = wordwrap($msg, 60);
            
            //set mail headers into a variable
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $name <$email>\r\n";
            $headers .= "X-Priority: 1\r\n";
            $headers .= "X-MSMail-Priority: High\r\n\r\n";
            
            //send the email
            mail($to, $subject, $msg, $headers);
        
    ?>
    
    <!--show success message-->
    <h5>Thanks for Contacting</h5>
    <p><a href="/final" class="button block">&laquo; Go back to the Home Page.</a></p>
    
    <?php } else { ?>
    
    <form method="post" action="" id="contact-form">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Your Message:</label>
        <textarea id="message" name="message"></textarea>
        
        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to Newsletter</label>
        
        <input type="button" class="button next" name="contact_submit" value="Send Message">
    </form>
    
    <?php } ?>
</div>

<?php include('includes/footer.php'); ?>