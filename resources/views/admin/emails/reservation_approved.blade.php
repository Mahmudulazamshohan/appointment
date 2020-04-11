<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reservation Approved</title>
	<style>
		body{
			font-family: Helvetica;
			font-size: 16px;
			line-height: 150%;
			margin:0;
			padding:0;
		}
		p{
			color: #757575;
			margin-top: 10px;
		}
		footer{
			background-color: #333333;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 45px;
			padding-bottom: 63px;
		}
	</style>
</head>
<body>
<center>
	<div style="max-width: 600px;padding: 0 18px 9px 18px;margin-top: 43px;">
		<table>
			<tr>
				<td>
					<img src="https://mcusercontent.com/32bc830e8ace97d034b7a9bd8/images/293ff433-e8ae-4936-9960-13d74d126162.png" alt="Logo" width="129" style="max-width: 258px;">
				</td>
			</tr>
		</table>
		<hr style="border-top-width:4px;border-top-style:solid;border-top-color:#EAEAEA;border-bottom-color:#EAEAEA;border-left-color: #EAEAEA;border-right-color: #EAEAEA; background-color: #EAEAEA;">
		<div style="text-align: left; margin-top: 50px;">
			<div>
				<h1 style="font-size:18px;">Potvrzení rezervace</h1>
			</div>
			<div>
				<p>Dobrý den,</p>
				<p>děkujeme za Vaši rezervaci na datum {{\Carbon\Carbon::parse($data['booking_date'])->format('d/m/Y') }} v čase {{ $data['booking_time'] }} k našemu odborníkovi {{ $data['specialistname'] }}</p>
				<p><strong>Vaši rezervaci tímto závazně potvrzujeme.</strong></p>
				<p><em>Případné storno rezervace je možné 24 hodin dopředu na e-mailové adrese info@dermatopsychologie.cz.</em></p>
				<p>Veškeré platby přijímáme pouze v hotovosti.</p>
				<p>Budeme se těšit na Vaši návštěvu.</p>

			</div>
			<div>
				<p>Srdečně,<br>
				Recepce Ústavu dermatopsychologie</p>
			</div>
		</div>
		<hr style="border-top-width:1px;border-top-style:solid;border-top-color:#EAEAEA; margin-top: 150px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		    <tbody>
		    	<tr>
		        	<td valign="top">
		            	<table align="left" border="0" cellpadding="0" cellspacing="0" width="176">
		                	<tbody>
		                		<tr>
		                    		<td align="left" valign="top">
		                        		<img alt="" src="https://mcusercontent.com/32bc830e8ace97d034b7a9bd8/images/974e6600-2ba6-4fc3-9e4c-bb6849a1a339.png" width="176" style="max-width:439px;">
		                    		</td>
		                		</tr>
		            		</tbody>
		        		</table>
		            	<table align="right" border="0" cellpadding="0" cellspacing="0" width="352">
			                <tbody>
			                	<tr>
			                    	<td valign="top" class="mcnTextContent">
			                        	<span style="color:#000000"><strong>Najdete nás:</strong><br>Slavojova 445/2, Praha 2</span><br>
										<span style="font-size:12px"><em>7 minut od stanice metra Vyšehrad, 1 minutu od stanice tramvaje Ostrčilovo náměstí, případně je možné využít placeného parkování v bezprostředním okolí ordinace</em></span>
			                    	</td>
			                	</tr>
			            	</tbody>
		        		</table>
		        	</td>
		    	</tr>
			</tbody>
		</table>
		<div style="margin: 60px 0px;">
			<a href="http://www.dermatopsychologie.cz" style="background-color: #35CCF1;color: #FFFFFF;text-decoration: none;font-family: Helvetica; font-size: 13px; padding: 18px;" target="_blank">www.dermatopsychologie.cz</a>
		</div>
	</div>
</center>
<br>
<footer>
	<center>
		<div style="max-width: 600px;">
			<hr style="border-top-width:2px;border-top-style:solid;border-top-color:#505050;border-bottom-color: #505050;border-right-color: #505050;border-left-color:#505050;">
			<p style="font-size: 12px; color: #fff;"><em>Copyright © {{ date('Y') }}, Ústav dermatopsychologie s.r.o.</em></p>
		</div>
	</center>
</footer>
</body>
</html>