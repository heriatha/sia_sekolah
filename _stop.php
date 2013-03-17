<?php
passthru("gammu-smsd -n phone1 -k", $hasil); //stop phone service
passthru("gammu-smsd -n phone1 -u", $hasil); // service uninstal phone1
