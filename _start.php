<?php


/** start **/
passthru("gammu-smsd -n phone1 -k", $hasil); //stop phone service
passthru("gammu-smsd -n phone1 -u", $hasil); // service uninstal phone1
passthru("gammu-smsd -c smsdrc1 -n phone1 -i", $hasil); //install service
passthru("gammu-smsd -c smsdrc1 -n phone1 -s"); // start service