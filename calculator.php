<?php
 $p=$_POST['principal'];
 $r=$_POST['rate'];
 $t=$_POST['time'];
 $sir=$p*$r*$t/100;
 $cir=$p*pow(1+$r/100,$t)-$p;
 echo "Annual Simple Interest is:-$sir\n";
 echo "Annual Compound Interest is:-".$cir;

?>