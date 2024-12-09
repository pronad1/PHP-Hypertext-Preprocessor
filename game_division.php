<?php

function read_line(){
    return trim(fgets(STDIN));
}

$t=(int)read_line();

for ($i=0; $i < $t; $i++) { 
    list($n,$k)=array_map('intval',explode(' ',read_line()));
    $a=array_map('intval',explode(' ',read_line()));

    $b=array_fill(0,$k,[]);

    for ($j=0; $j < $n; $j++) { 
        $x=$a[$j];
        $b[$x%$k][]=$j+1;
    }

    $re=-1;

    for ($l=0; $l < $k; $l++) { 
        if (count($b[$l])==1) {
            $re=$b[$l][0];
            break;
        }
    }

    if ($re==-1) {
        echo "NO\n";
    }
    else{
        echo "YES\n";
        echo $re,"\n";
    }

}


?>