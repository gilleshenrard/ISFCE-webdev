<?php
$display = strlen($r['intervention'])>47 ? substr($r['intervention'], 0, 44)."..." : $r['intervention'];
include './vues/list_item_reparation.php';