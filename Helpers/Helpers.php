<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Libraries/phpmailer/Exception.php';
require 'Libraries/phpmailer/PHPMailer.php';
require 'Libraries/phpmailer/SMTP.php';  

	//Retorna la url del proyecto
	function base_url()
	{
		return BASE_URL;
	}
    //Retorla la url de Assets
    function media()
    {
        return BASE_URL."/Assets";
    }
    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once ($view_header);
    }
    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once ($view_footer);        
    }
	//Muestra información formateada
	function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    function getModal(string $nameModal, $data)
    {
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;        
    }
  /*ENVIO DE CORREOS */
  function sendEmail($data,$template){
    if(ENVIRONMENT == 1){
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        /*ENVIO DE CORREO */
        $de = "MIME-Version: 1.0\r\n";
        $de.="Content-Type: text/html; charset=UTF-8\r\n";
        $de.="From:{$empresa}<{$remitente}>\r\n";
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $mensaje=ob_get_clean();
        $send =mail($emailDestino,$asunto,$mensaje,$de);
        return $send;
    } else{
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);
         ob_start();
         require_once("Views/Template/Email/".$template.".php");
         $mensaje=ob_get_clean();

         try {
             //Server settings
             $mail->SMTPDebug = 0;                                       //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = 'PruebasDevDistribucion@gmail.com';     //SMTP username
             $mail->Password   = 'eqggilzpdldrzmct';                     //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

             //Recipients
             $mail->setFrom('PruebasDevDistribucion@gmail.com', 'Servidor Distribucion CLARO HND');
             $mail->addAddress($data['email']);                          //Add a recipient

             //Content
             $mail->isHTML(true);                                        //Set email format to HTML
             $mail->Subject = $data['asunto'];
             $mail->Body    = $mensaje;
             $mail->send();
             //echo 'Mensaje enviado';
             return true;
         } catch (Exception $e) {
             echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
             return false;
         }
         
    }
}

    function getPermisos(int $idmodulo){
        require_once ("Models/PermisosModel.php");
        $objPermisos = new PermisosModel();
        $idrol = $_SESSION['userData']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idrol);
        $permisos = '';
        $permisosMod = '';
        if(count($arrPermisos) > 0 ){
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
        }
        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
    }

    function sessionUser(int $idpersona){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idpersona);
        return $request;
    }

    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    //Genera una contraseña de 10 caracteres
	function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    //Genera un token
    function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }
    //Formato para valores monetarios
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }
    

 ?>