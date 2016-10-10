<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<table><tr>";
foreach (["Système d’exploitation",
        "Projet de développement Web",
        "Initiation aux bases de données",
        "Structure des ordinateurs",
        "Elements de statistiques"] as $value) {
    echo "<th>".$value."</th>";
}
echo "</tr></table>";