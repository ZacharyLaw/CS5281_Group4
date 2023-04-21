<?php
fwrite(fopen("items.json", "w+"),$_POST['data']);
fclose($f);
?>
