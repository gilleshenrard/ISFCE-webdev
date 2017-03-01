<?php
$display = strlen($r['intervention'])>47 ? substr($r['intervention'], 0, 44)."..." : $r['intervention'];
include './vues/list_items/list_item_reparation.php';