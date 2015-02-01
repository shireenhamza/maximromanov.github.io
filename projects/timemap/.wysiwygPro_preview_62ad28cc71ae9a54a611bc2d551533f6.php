<?php
if ($_GET['randomId'] != "prirdlsyPhQN2ePocIevdkA9bU6whhHPcU5re_cbRsFhCwx2L87TthL_Lvnk7rwP") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
