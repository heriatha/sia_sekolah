<?php
$pengirim='085726457243';
$str='tes ya nak';
passthru('gammu-smsd-inject -c smsdrc1 TEXT '.$pengirim.' -text "'.$str.'"');