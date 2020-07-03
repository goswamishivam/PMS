<?php
    $command = escapeshellcmd('C:\xampp\htdocs\ci\application\views\ml.py');
    $output = shell_exec($command);
    echo $output;
?>


<?php echo $d[0]->gender;?>
