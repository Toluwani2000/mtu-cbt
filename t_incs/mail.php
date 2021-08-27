<?php
$to=$m_to;
$from=$m_from;
$subject=$m_subject;
$message='
<body style="margin: 0px;">
	<div class="w3-animate-zoom" id="mail" style="-webkit-animation: animatezoom 0.6s;animation: animatezoom 0.6s;font-family: Arial;padding: 2%;background-color: #efefef;">
		<div id="content" style="width: 90%;min-height: 400px;margin: 0 auto;border: 1px solid #f5f5f5;box-shadow: 1px 0 2px #ffc809;background-color: #fff;padding: 10px;">
			<div class="logo" style="text-align: center;">
				<img src="'.$webDir.'t_files/t_img/logo.png" alt="'.$company.'" width="100" height="100">
			</div>
			<div class="name" style="font-size: 1.4em;font-weight: bold;font-family: Arial;text-align: center;">
			'.$company.'
			</div>
			<h5 class="date" style="text-align: center;">  </h5>
			<div class="text" style="font-size: 1em;font-family: Arial;padding: 10px;">
				'.$m_message.'
				<br><br>
				Team: <b>'.$company.'</b>
				<br>
				'.$company_motto.'
			</div>
		</div>
	</div>
	</body>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Reply-To: '.$company.' <'.$from.'>' . "\r\n";
$headers .= 'From: '.$company.' <'.$from.'>' . "\r\n";
// Mail it
mail($to, $subject, $message, $headers);

?>
