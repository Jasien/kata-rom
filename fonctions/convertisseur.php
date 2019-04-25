<?php

if(!empty($_POST['nbrCR']))
	chiffre_romain(intval($_POST['nbrCR']));

if(!empty($_POST['nbrRC']))
	romain_chiffres($_POST['nbrRC']);

/* fonction transformant les chiffres Arabes en chiffres Romains */
function chiffre_romain($num)
{
	$str='';
	$romainUnitaire = array("","I","II","III","IV","V","VI","VII","VIII","IX");// 1,2,3,4,5,6,7,8,9
	$romainDizaine  = array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");// 10,20,30,40,50,60,70,80,90
	$romainCentaine = array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");// 100,200,300,400,500,600,700,800,900
	$romainMillier  = array("","M","MM","MMM","IVM","V*","VI*","VII*","VIII*","IX*");// 1000,2000,3000,4000,5000,6000,7000,8000,9000(5000 s'écrit V, 10.000 s'écrit X tout deux avec une barre horizontale par dessus remplacé ici par *)

	$str=$romainUnitaire[$num%10];
	$num-=($num%10);
	$num/=10;

	$str=$romainDizaine[$num%10].$str;
	$num-=($num%10);
	$num/=10;

	$str=$romainCentaine[$num%10].$str;
	$num-=($num%10);
	$num/=10;

	$str=$romainMillier[$num%10].$str;
	echo $str;
}

/* fonction transformant les chiffres Romains en chiffres Arabes */
function romain_chiffres($num)
{
	$tot = is_numeric($num);
	$romains = array('M' => 1000,'CM' => 900,'D' => 500,'CD' => 400,'C' => 100,'XC' => 90,'L' => 50,'XL' => 40,'X' => 10,'IX' => 9,'V' => 5,'IV' => 4,'I' => 1,);

	foreach ($romains as $key => $value) {
		while (strpos($num, $key) === 0) {
			$tot += $value;
			$num = substr($num, strlen($key));
		}
	}
	if ($tot!= '')
		echo $tot;
	else
		echo  "Vous avez entré une lettre pas très romaine!";
}

?>