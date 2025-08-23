<?php
$_1 = $_2 = $_3 = $_4 = 0;
$filePath = "../domande.csv";
$domande = file($filePath);
$temp_array = [];
$CICLI = count(file($filePath));
for ($i = 1; $i < $CICLI; $i++){    //Saltiamo la domanda template
    $temp_array = explode('|',$domande[$i]);
    switch($temp_array[5]){
        case 1:
            $_1++;
            break;
        case 2:
            $_2++;
            break;
        case 3:
            $_3++;
            break;
        case 4:
            $_4++;
            break;
        
    }
}

$arrayCategorie = [];
for ($i = 1; $i < $CICLI; $i++){  
    $temp_array = explode('|',$domande[$i]);
    $tempStringa = trim($temp_array[6]);    //Rimuoviamo eventuali spazi vuoti e lo rimettiamo in una stringa temporanea
    if(!in_array($tempStringa, $arrayCategorie))
        $arrayCategorie[] = $tempStringa;
}

$contatoreNumeroCategorie = [];
for($i = 0; $i < sizeof($arrayCategorie); $i++){
    $contatoreNumeroCategorie[$i] = 0; //inizializzazione
    for ($j = 1; $j < $CICLI; $j++){
        $temp_array = explode('|',$domande[$j]);
        $tempStringa = trim($temp_array[6]);    //Rimuoviamo eventuali spazi vuoti e lo rimettiamo in una stringa temporanea
        if($tempStringa == $arrayCategorie[$i])
            $contatoreNumeroCategorie[$i] += 1;
    }
    echo $arrayCategorie[$i].": ".$contatoreNumeroCategorie[$i]." domande<BR>";
}
    echo "<BR><BR>"."Risposta 1: ".$_1."<BR>";
    echo "Risposta 2: ".$_2."<BR>";
    echo "Risposta 3: ".$_3."<BR>";
    echo "Risposta 4: ".$_4."<BR><BR>";

$numeri = [1,2,3,4];
shuffle($numeri);
for($i = 0; $i < 4; $i++)
    echo $numeri[$i]." ";
?>