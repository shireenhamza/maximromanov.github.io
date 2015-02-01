<?php
if ($_GET['randomId'] != "bI03ZS1MIVB4bNdQcYGQVLadwfDm_gTHXOqLFDB1b5dn4F_Od60m2jtBj4hletKt") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
