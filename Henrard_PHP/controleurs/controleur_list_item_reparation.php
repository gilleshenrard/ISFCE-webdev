<?php

//Contrôle la longueur de l'intervention à afficher (max. 44 caractères)
$display = strlen($r['intervention'])>47 ? substr($r['intervention'], 0, 44)."..." : $r['intervention'];
include './vues/list_items/list_item_reparation.php';
