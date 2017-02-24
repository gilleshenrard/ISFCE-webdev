<?php
$display = strlen($r['description'])>47 ? substr($r['description'], 0, 44)."..." : $r['description'];
include './vues/list_item_reparation.php';