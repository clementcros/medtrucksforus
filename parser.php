<?php

// ceci est mon fichier csv que j'ai renomer en csv.csv car plus simple a ecrire'
$fichier="csv.csv";
 
//ouverture en lecture et modification
$text=fopen($fichier,'rw') or die("Fichier manquant");
$contenu=file_get_contents($fichier);
// la ligne du dessous va remplacer les caractères que je lui demande par ceux que je remplace
//la première ligne remplace les ; par des espace
$contenuMod=str_replace(';', ' ', $contenu);
$csv=str_replace(' R ', ' rue ', $contenuMod);

$csv = new SplFileObject($fichier); // On instancie l'objet SplFileObject
$csv->setFlags(SplFileObject::READ_CSV); // On indique que le fichier est de type CSV
$csv->setCsvControl(';');



foreach($csv as $ligne){
$csv = array(
  'nom'  => $ligne[3], 
  'type'  => $ligne[19], 
  'numero'  => $ligne[7],
  'type R'  => $ligne[8],
  'rue'  => $ligne[9],
  'ville CP'  => $ligne[15],
  'Paiement' => $ligne[25]
);
	print_r ($csv);
   }

//je ferme le fichier car je ne le modifie pas
fclose($text);
//je reregarde mon contenu qui n'a pas ete modifié

