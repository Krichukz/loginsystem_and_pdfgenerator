<!DOCTYPE html>

<?php session_start();

// Ja sesijas mainīgais nav uzstādīts, tad lietotāju pāradresē uz login lapu
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

?>
<html>
   <head>
      <title> PDF Forma generator </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="style2.css">
      
      <script>
         $( function() {
           $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
         } );
         $( function() {
           $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
         } );
      </script>
   </head>
   <body>
      <!---MENU-->
      <div class="container">
         <form id="forma" method="post"  target="_blank" >
            <div class="topnav" id="myTopnav">
               <input class="menu_pogas" type='submit' value="Skatīt PDF formu" name="submit"  onclick="askForSubmit()" >
               <input class="menu_pogas" type='submit' value="Saglabāt DB" name="submit"  onclick="askForSave()">
			   <input class="menu_pogas" type='submit' value="Ģenerēt PDF" name="submit"  onclick="askForGeneration()">
			   <a href="logout.php"  class="btn btn-danger">Iziet</a>
               <a href="javascript:void(0);" class="icon" onclick="myFunction()">
               <i class="fa fa-bars"></i>
               </a>
            </div>
	
            <!--Sakās forma-->
            <div class="form-group">
               <h2>Rēķinu sastāda:</h2>
               <div class="line"></div>
               <div class="input_fields_wrap">
                  <div class="inputs">
                     <div class="form-group row">
					 
                        <div class="col-md-6">
                           <label>Rēķinu izrakstīja:</label>
                           <select id="firmas" class = "form-control" onchange="updateText('firmas')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="naked Core, SIA">naked CORE, SIA</option>
                           </select>
                           <br>	
                           <input type="text" class="form-control" name="rekinu-izr"  id="firmasText" placeholder= "Rēķinu izrakstīja" />
                        </div>
						
                        <div class="col-md-6">
                           <label>Reģistrācijas nr:</label>
                           <select id="reg_nr" class = "form-control" onchange="updateText('reg_nr')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="44103116859">naked CORE, SIA - 44103116859</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="reg_nr" placeholder= "Reģistrācija Nr." id="reg_nrText" /> 
                        </div>
						
                        <div class ="col-md-4">
                           <label>Banka:</label>
                           <select id="banka" class="form-control" onchange="updateText('banka')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="Swedbank AS">Swedbank AS</option>
                              <option value="DNB">DNB</option>
                              <option value="Citadele">Citadele</option>
                              <option value="Nordea">Nordea</option>
                              <option value="SEB">SEB</option>
                              <option value="Rietumu banka">Rietumu banka</option>
                              <option value="ABLV Bank">ABLV Bank</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="banka" placeholder="Bankas nosaukums" id="bankaText" /> 
                        </div>
						
                        <div class ="col-md-4">
                           <label>SWIFT kods: </label>
                           <select id="swift" class="form-control" onchange="updateText('swift')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="HABALV22">naked - HABALV22</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="swift"  placeholder="Swift kods" id="swiftText" required /> 
                        </div>
						
                        <div class="col-md-4">
                           <label>Bankas konts:</label>
                           <select id="bankas-konts" class="form-control" onchange="updateText('bankas-konts')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="LV94HABA0551045085380">naked - LV94HABA0551045085380</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="bankas-konts"  placeholder="Bankas konts" id="bankas-kontsText" required /> 
                        </div>
						
                        <div class="col-md-4">
                           <label>Telefons:</label>
                           <select id="tele" class="form-control" onchange="updateText('tele')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="27661535">naked CORE, SIA - 27661535</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="tele_nr"  placeholder="Tele nr" id="teleText" required /> 
                        </div>
						
                        <div class="col-md-4">
                           <label>E-pasts:</label>
                           <select id="pasts" class="form-control" onchange="updateText('pasts')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="info@naked.lv">naked - info@naked.lv</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="pasts_1"  placeholder="E-pasts" id="pastsText" required /> 
                        </div>
						
                        <div class="col-md-4">
                           <label>Kontakpersona: </label>
                           <select id="kp" class="form-control" onchange="updateText('kp')">
                              <option selected hidden value="">Izvēlies</option>
                              <option value="Reinis">naked - Reinis</option>
                              <option value="Ģirts">naked - Ģirts</option>
                           </select>
                           <br>
                           <input class="form-control" type="text" name="kontakt_pers" placeholder="Kontakpersona" id="kpText" required /> 
                        </div>
                     </div>
                  </div>
				  
                  <div class="line"></div>
				  
                  <h2>Pakalpojuma rēķins:</h2>
                  <div class="input_fields_wrap">
                     <div class="inputs">
                        <div class="form-group row">
                           
						   <div class="col-md-4">
                              <label>Rēķina Nr: </label>
                              <input class="form-control" type="text"  name="rekina-nr" placeholder="Rēķina Nr." value="ND" required >
                           </div>
						   
                           <div class="col-md-4">
                              <label>Izrakstīšanas datums: </label>
                              <input class="form-control" type="text" id="datepicker" name="izra-date" required >
                           </div>
						   
                           <div class="col-md-4">
                              <label>Apmaksas datums:</label>
                              <input class="form-control" type="text" id="datepicker2" name="apm-date" required >
                           </div>
                        </div>
                     </div>
                  </div>
				  
                  <h2>Kam izraksta: </h2>
                  <div class="input_fields_wrap">
                     <div class="inputs">
                        <div class="form-group row">
						
                           <div class="col-md-6">
                              <label>Rēķinu izraksta:</label>
                              <input type="text" class="form-control" name="rekinu_sanem"   placeholder= "Rēķinu izraksta" required />
                           </div>
						   
                           <div class="col-md-6">
                              <label>Reģistrācijas nr:</label>
                              <input class="form-control" type="text" name="reg_nr_sanem" placeholder= "Reģistrācija Nr." required /> 
                           </div>
						   
                           <div class ="col-md-4">	
                              <label>Banka:</label>
                              <input class="form-control" type="text" name="banka_sanem" placeholder="Bankas nosaukums" required /> 
                           </div>
						   
                           <div class ="col-md-4">		
                              <label>SWIFT kods: </label>
                              <input class="form-control" type="text" name="swift_sanem"  placeholder="Swift kods" required /> 
                           </div>
						   
                           <div class="col-md-4">
                              <label>Bankas konts:</label>
                              <input class="form-control" type="text" name="bankas_konts_sanem"  placeholder="Bankas konts" required /> 
                           </div>
						   
                           <div class="col-md-4">
                              <label>Telefons:</label>
                              <input class="form-control" type="text" name="tele_nr_sanem"  placeholder="Tele nr"  /> 
                           </div>
						   
                           <div class="col-md-4">
                              <label>E-pasts:</label>
                              <input class="form-control" type="text" name="pasts_2"  placeholder="E-pasts"  /> 
                           </div>
						   
                           <div class="col-md-4">
                              <label>Kontakpersona: </label>
                              <input class="form-control" type="text" name="kontakt_pers_sanem" placeholder="Kontakpersona"/> 
                           </div>
						   
                           <div class="col-md-12">
                              <label>Rēķins par: </label>
                              <textarea class="form-control" name= "rekins_par_text" rows="4" cols="50" required></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
				  
                  <div class="line"></div>
				  
                  <div class="input_fields_wrap2">
                     <div class="inputs2" data-id="0">
                        <div class="form-group row">
						
                           <div class="col-md-4">
                              <label>Pakalpojuma apraksts</label><input type="text" class="form-control" id="serviceInfoInputField" name="fields[0][description]" placeholder="Apraksts" required>
                           </div>
						   
                           <div class="col-md-2">
                              <label>Stundas likme</label><input type="text" value="0.00" class="form-control" id="serviceInfoInputField" name="fields[0][hour_rate]" placeholder="Stundas likme" required >
                           </div>
						   
                           <div class="col-md-2">
                              <label>Stundas</label> <input type="text" value="0.00" class="form-control" id="serviceInfoInputField" name="fields[0][hours]" placeholder="Stundas" required>
                           </div>
						   
                           <div class="col-md-2">
                              <label>Fiksētā maksa</label><input type="text" value="0.00" class="form-control" id="serviceInfoInputField" name="fields[0][fixed_cost]" placeholder="Fiksētā maksa" required>
                           </div>
						   
                           <div class="col-md-2">
                              <label>Atlaide</label><input type="text" value="0.00" class="form-control" id="serviceInfoInputField" name="fields[0][discount]" placeholder="Atlaide" required >
                           </div>
                        </div>
                     </div>
                     <button class = "add" type="button" >+</button><br>
                     <hr>
                  </div>
               </div>
            </div>
         </form>
		
      </div>
      <!--Conteineris-->
      <script>
         function myFunction() {
             var x = document.getElementById("myTopnav");
             if (x.className === "topnav") {
                 x.className += " responsive";
             } else {
                 x.className = "topnav";
             }
         }
         
         form=document.getElementById("forma");
         function askForSave() {
                 form.action="database_import.php";
                 form.submit();
         }
         function askForSubmit() {
                 form.action="html_pdf.php";
                 form.submit();
         }
		   function askForGeneration() {
                 form.action="generate.php";
                 form.submit();
         }
         
         
         $(document).ready(function() {
         
                 var wrapper = $(".input_fields_wrap2"); //Fields wrapper
                 var add_button = $(".add"); //Add button ID
         
                 var i = 0;
         
                 $(add_button).click(function(e){ //on add input button click
                     e.preventDefault();
         		
                     var delButton = "<div class=\"form-group row\"><div class=\"col-md-12\"><button class=\"remove_field\">-</button> </a> </div></div><hr>";
                     $('.inputs2:first').clone().find("input:text").val("0.00").end().append(delButton).appendTo(wrapper).attr('data-id', i+=1);
         
                     console.log($('.inputs2:first').find("input:text"));
         
                     $('.inputs2 input').each(function() {
                       console.log($(this).parent().parent().parent().attr('data-id'));
         
                       $(this).attr('name', function(index, src) {
                           return src.replace('fields[0]', 'fields['+$(this).parent().parent().parent().attr('data-id')+']')
                       })
         
                       //fields[0]
                     });
         
                     //console.log()
         
                 });
         
                 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                     e.preventDefault();
                     $(this).closest('.inputs2').remove();
         
                 })
             });
         
         function updateText(type) { 
          var id = type+'Text';
          document.getElementById(id).value = document.getElementById(type).value;
         }
      </script>
   </body>
</html>