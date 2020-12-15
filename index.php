<?php
require __DIR__ . '/vendor/autoload.php';

use Al68\transcoder\transcoder;

if (isset($_GET['action'])) {
    if (1) { ?>
        <form action="" method="POST">
            <input name="string_to_encode" type="text" autofocus required>
            <input type="submit" value="encoder">
        </form>
    <?php }
    if (isset($_POST['string_to_encode'])) {
        echo $_POST['string_to_encode'] . '<br/>';
        $trans = new transcoder;
        echo $trans->encode_string($_POST['string_to_encode']);
    }
    if (1) { ?>
        <form action="" method="POST">
            <input name="string_to_decode" type="text" autofocus required>
            <input type="submit" value="decoder">
        </form>
<?php }
    if (isset($_POST['string_to_decode'])) {
        echo $_POST['string_to_decode'] . '<br/>';
        $trans = new transcoder;
        echo $trans->decode_string($_POST['string_to_decode']);
    }
}
