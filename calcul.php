<?php

if($_POST['upload']==1) {
    $arxiu = "arxiu_pujat.csv"; // si l'arxiu esta pujat agafo aquest
} else {
    $arxiu = "arxiu.csv"; //sino el del servidor
}


$farxiu = fopen($arxiu, "r") or exit("no es pot obrir l'arxiu!"); //obro l'arxiu en mode lectura

$retorn=array(); //declaro variable

function afeigeix_cateogoria($a_categories, $le, &$retorn){
    foreach ($a_categories as $categoria) { // per cada categoria
        $categoria = trim($categoria);
        if (array_search($categoria, $retorn[$le[0]]) === false) { //busco si esta la categoria, sino esta
            array_push($retorn[$le[0]], $categoria); // afeigeixo amb al array.
        }
    }
}

while (!feof($farxiu)) {
    $l=null;
    $le=null;
    $a_categories=null;

    $l=fgets($farxiu); //agafo la linia

    if($l=="\n") continue; //linia en blanc

    $le=explode(";",$l); //separo els ; en arrays

    $a_categories=$le;
    unset($a_categories[0]); // trec comarca
    unset($a_categories[1]); // trec codi centre

    if (array_key_exists($le[0], $retorn)) {  //existeix la comarca al index de l'array?
        afeigeix_cateogoria($a_categories, $le, $retorn); //crido funcio
    } else {
        $retorn[$le[0]] = array(); //declaro array 
        afeigeix_cateogoria($a_categories, $le, $retorn); //crido funcio
    }

}
fclose($farxiu);

ksort($retorn); //ordeno el per key
?>