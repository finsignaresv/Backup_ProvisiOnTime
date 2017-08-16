<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "comercial@provisiontime.com";
    $email_subject = "ProvisiONtime Contact form";
     
     
    function died($error) {
        // your error code can go here
        echo "lo sentimos, pero hay errores en la informacion. ";
        echo "Estos errores aparecen a continuacion.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor regrese e intentelo nuevamente.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
	    !isset($_POST['city']) ||
	    !isset($_POST['country']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Lo sentimos, pero parece haber problemas con la informaciòn ingresada.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
	$city = $_POST['city']; // required
    $country = $_POST['country']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El correo que ingreso no parece ser valido.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El nombre que ingreso no parece ser valido.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El apellido que ingreso no parece ser valido.<br />';
  }
    if(!preg_match($string_exp,$city)) {
    $error_message .= 'La ciudad que ingreso no parece ser valida.<br />';
  }
    if(!preg_match($string_exp,$country)) {
    $error_message .= 'El pais que ingreso no parece ser valido.<br />';
  }
    if(strlen($comments) < 2) {
    $error_message .= 'El comentario que ingreso no parece ser valido.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Informacion del contacto.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Ciudad: ".clean_string($city)."\n";
    $email_message .= "Pais: ".clean_string($country)."\n";
    $email_message .= "Telefono: ".clean_string($telephone)."\n";
    $email_message .= "Comentario: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<style type="text/css">
.text2 {
	color: #CCC;
}
.Estilo2 {color: #CCC; font-size: 28px; }
.Estilo4 {font-size: 28px}
</style>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><img src="../../../pages/pages/images/cont1.jpg" width="850" height="560" />
  <?php
}
?>
</p>
