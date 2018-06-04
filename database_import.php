<?php   
if(isset($_POST['submit'])){
	
	$Rekinu_izraksija = $_POST['rekinu-izr'];
	$reg_nr1 = $_POST['reg_nr'];
	$banka1 = $_POST['banka'];
	$swift1 = $_POST['swift'];
	$bankas_konts1 = $_POST['bankas-konts'];
	$tele_nr1 = $_POST['tele_nr'];
	$pasts1 = $_POST['pasts_1'];
	$kontak1 = $_POST['kontakt_pers'];
	$rek_nr = $_POST['rekina-nr'];
	$izra_date = $_POST['izra-date'];
	$apm_date = $_POST['apm-date'] ;
	$rekinu_sanem = $_POST['rekinu_sanem'];
	$reg_nr2 = $_POST['reg_nr_sanem'];
	$banka2 = $_POST['banka_sanem'];
	$swift2 = $_POST['swift_sanem'] ;
	$bankas_konts2 = $_POST['bankas_konts_sanem'];
	$tele_nr2 = $_POST['tele_nr_sanem'];
	$pasts2 = $_POST['pasts_2'];
	$kontak2 = $_POST['kontakt_pers_sanem'];
	$rekins_par_text = $_POST['rekins_par_text'];

$atlaide_kopa = 0;
$kopa = 0;
$pvn =0;
	foreach ( $_POST['fields']  as $key => $value) {

                 $value['description'];
               $value['hour_rate'];
                $value['hours'];
                $value['fixed_cost'];
                $value['discount'];
 $atlaide_kopa+=  $value['discount'];
   $kopa+= $value['hours']* $value['hour_rate'] + $value['fixed_cost'] - $value['discount'];
}
 
	$pvn = $kopa *21/100;
	echo $kopapavisam = $kopa + $pvn - $atlaide_kopa;
	$kopapavisam =0;
	$kopapavisam = $kopa + $pvn - $atlaide_kopa;


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sistema";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);

if ( mysqli_connect_error()) {
	die();
}
else{
	$SELECT = "SELECT rekina_nr From pavadzimes Where rekina_nr = ? Limit 1";
	$INSERT = "INSERT Into pavadzimes (rekina_nr,rekinu_izrakstija,	izsutisanas_datums,apmaksas_datums,kam_izrakstija,cena_bez_pvn,pvn,	cena_kopa) values ( ?,?,?,? ,?,?,?,?)";
	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param("s",$rek_nr);
	$stmt->execute();
	$stmt->bind_result($rek_nr);
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	$kopapavisam = $kopa + $pvn - $atlaide_kopa;
	if ($rnum==0){	
		$stmt->close();
		$stmt = $conn->prepare($INSERT);	

		$stmt->bind_param("sssssddd", $rek_nr,$Rekinu_izraksija,$izra_date,$apm_date,$rekinu_sanem,$kopa,$pvn,$kopapavisam);
		$stmt->execute();
		echo "DATI PIEVIENOTI VEIKSMĪGI";
	}else{
		echo "tads rekina id jau eksiste";
	}
	$stmt->close();
	$conn->close();
}














}




?>