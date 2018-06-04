
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naked Manager - Firmas</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
  require_once('assets/NumToText.php');
  require_once('assets/Currencies.php');
            
 
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
	
$kopa = 0;
$atlaide_kopa = 0;

}
	foreach ( $_POST['fields']  as $key => $value) {

                 $value['description'];
               $value['hour_rate'];
                $value['hours'];
                $value['fixed_cost'];
                $value['discount'];
            $kopa+= $value['hours']* $value['hour_rate'] + $value['fixed_cost'] - $value['discount'];
			$pvn = $kopa *21/100;
			$atlaide_kopa+= $value['discount'];
}
    ?>
    <style type="text/css">

         table td, table th {
              padding: .625em;
              
            }

            strong {
                font-weight: bold;
            }

        /** {
            font-family: verdana;
            font-size: 14px;
        }

        table {
          border: 1px solid #ccc;
          border-collapse: collapse;
          margin: 0;
          padding: 0;
          width: 100%;
          table-layout: fixed;
        }
        table caption {
          font-size: 1.5em;
          margin: .5em 0 .75em;
        }
        table tr {
          background: #white;
          border: 1px solid #ddd;
          padding: .35em;
        }
        table th,
        table td {
          padding: .625em;
          text-align: left;
          border: 1px solid #ddd;
        }
        table th {
          font-size: .85em;
          letter-spacing: .1em;
          text-transform: uppercase;
          border: 1px solid #ddd;
        }*/

        body {
            font-size: 12px;
        }
        body h4 {
            font-size: 13px;
        }

        .pdf-view {
           /* margin: 40px;*/
        }
        .main-logo {
            width: 200px;
            height: 47px;
            margin-bottom: 40px;
        }
        .left {
            float: left;
        }
        .right {
            float: right;
        }
        .clearer {
            clear: both;
        }

        .info-about-40 {
           
            width: 49%;
        }

        .info-about-10 {
            margin-left: 40px;
            width: 20%;
        }

        .info-about-20 {
            width: 20%;
        }
        .table {
            margin-bottom: 0px;
        }
		 .line{
			 margin-top:-70px;
			 margin-bottom:10px;
width: 4000px;
height: 47px;
border-bottom: 1px solid black;
position: absolute;
}
 .line2{
			 margin-top:-40px;
			 margin-bottom:10px;
width: 4000px;
height: 47px;
border-bottom: 1px solid black;
position: absolute;
}
    </style>

</head>

<body>
    <div class="pdf-view">

        <img class="main-logo" src="img/Capture.png" alt="" />
		<div class="line">
		</div>
        <div>
		
            <div class="left info-about-40">

                <h4 style="margin-top: 0px; margin-bottom: 20px;"><strong>Pakalpojuma rēķins</strong></h4>
               
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><p><strong>Rēķina nr.:</p></td>
                            <td><p><?php echo $rek_nr ?></strong></p></td>
                        </tr>
                        <tr>
                            <td><strong>Izrakstīšanas datums:</strong></td>
                            <td><?php echo $izra_date?></td>
                        </tr>
                        <tr>
                            <td><strong>Apmaksas datums:</strong></td>
                            <td><?php echo $apm_date?></td>
                        </tr>

                    </tbody>
                </table>
                 

            </div>
            <div class="right info-about-40">
                <h4 style="margin-top: 0px; margin-bottom: 20px;"><strong>Rēķins par:</strong></h4>
                <p><?php echo $rekins_par_text?></p>
            </div>

            
            
            <div class="clearer"></div>
        </div>
        <div style="margin-top: 20px;">
            <div class="left info-about-40">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong>Izrakstīja:</strong></td>
                            <td><?php echo $Rekinu_izraksija?></td>
                        </tr>
                        <tr>
                            <td><strong>Reģistrācijas nr:</strong></td>
                            <td><?php echo $reg_nr1?></td>
                        </tr>
                        <tr>
                            <td><strong>Bankas dati:</strong></td>
                            <td>Banka: <?php echo $banka1?><br />
SWIFT kods: <?php echo $swift1?> <br />
Konts: <?php echo $bankas_konts1?></td>
                        </tr>
                        <tr>
                            <td><strong>Kontakti:</strong></td>
                            <td>
                                <strong>Tālrunis:</strong> <?php echo $tele_nr1?><br /><strong>E-pasts:</strong> <?php echo $pasts1?> <br /><strong>Kontaktpersona:</strong><?php echo $kontak1?>                           </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
            <div class="right info-about-40">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong>Saņēma:</strong></td>
                            <td><?php echo $rekinu_sanem ?></td>
                        </tr>
                        <tr>
                            <td><strong>Reģistrācijas nr:</strong></td>
                            <td><?php echo $reg_nr2?></td>
                        </tr>
                        <tr>
                            <td><strong>Bankas dati:</strong></td>
                            <td>Banka: <?php echo $banka2 ?><br />
SWIFT kods: <?php echo $swift2?><br />
Konts: <?php echo $bankas_konts2?></td>
                        </tr>
                        <tr>
                            <td><strong>Kontakti:</strong></td>
                            <td>
                                <strong>Tālrunis:</strong> <?php echo $tele_nr2?><br /><strong>E-pasts:</strong> <?php echo $pasts2?> <br /><strong>Kontaktpersona:</strong> <?php echo $kontak2 ?>                           </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="clearer"></div>
        </div>
        
        <div style="margin-top: 10px;">
                        <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Apraksts</th>
                        <th style="text-align: right;">Stundas Likme</th>
                        <th style="text-align: right;">Stundas</th>
                        <!-- <th>Fiksēta maksa</th> -->
						<th style="text-align: right;">Fiksēta maksa</th>
                        <th style="text-align: right;">Atlaide</th>
                        <th style="text-align: right;">Kopā</th>
                    </tr>
                </thead>
                <tbody>
				
				<?php foreach ($_POST['fields'] as $key => $value) : ?>
				<tr>
                            <td><?php echo $value['description']; ?></td>
                            <td style="text-align: right;"><?php echo number_format ($value['hour_rate'],2); ?> €</td>
                            <td style="text-align: right;"><?php echo number_format ($value['hours'],2); ?> €</td>
                           <!--  <td></td> -->
                            <td style="text-align: right;"><?php echo number_format ($value['fixed_cost'],2); ?> €</td>
							<td style="text-align: right;"><?php echo number_format ($value['discount'],2 );?> €</td>
							 <?php  $summ = $value['hour_rate'] * $value['hours'] + $value['fixed_cost'] - $value['discount']; ?>
							
                            <td style="text-align: right;"><?php echo number_format((float)$summ, 2, '.', '');?> €</td>				
                        </tr>
                              <?php endforeach; ?>                                         
                                                                 
                                    </tbody>
            </table>
        </div>
         <div style="margin-top: 10px;">
            
            
            <div class="right info-about-40">
                
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td style="text-align: right;"><strong>Summa bez PVN</strong></td>
                            <td style="text-align: right;"><?php echo number_format ($kopa,2 )?> €</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>PVN 21%</strong></td>
                                                        <td style="text-align: right;"><?php echo number_format ($pvn,2 )?> €</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Priekšapmaksa</strong></td>
                            <td style="text-align: right;">0.00 €</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Atlaide</strong></td>
                            <td style="text-align: right;"><?php echo number_format ($atlaide_kopa,2 )?> €</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Kopā:</strong></td>
							<?php $kopapavisam = $kopa + $pvn - $atlaide_kopa;?>
                                                        <td style="text-align: right;"><?php echo number_format ($kopapavisam,2 )?> €</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;">
                                 <p>Summa apmaksai vārdiem: <strong><?php echo PriceToText($kopapavisam, array(array('eiro', 'eiro'), array('centi', 'cents')), 'LV', false); ?></strong></p>
                            </td >
                        </tr>

                    </tbody>
                </table>
				
                
            </div>
			
				 <div class="line2"> </div>
			
            <div class="left info-about-40">
                <h4>Apmaksas veids: <strong>Pārskaitījums 15 dienu laikā</strong></h4>
               
                <p>Rēķins sagatavots elektroniski un ir derīgs bez paraksta</p>
            </div>
			 <div class="line2"> </div>
            <div class="clearer"></div>
        </div>

    </div>

</body>

</html>

