<?php 
	
	//define("BASE_URL", "http://localhost/tienda_virtual/");
	const BASE_URL = "http://localhost/tienda_virtual";

	//Zona horaria
	date_default_timezone_set('America/Tegucigalpa');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "db_tiendavirtual";
	const DB_USER = "root";
	const DB_PASSWORD = "123456";
	const DB_CHARSET = "utf8";

	/*PARA ENVIO DE CORREOS */
	const ENVIRONMENT= 0;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "L";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "Servidor Kiuni";
	const EMAIL_REMITENTE = "kilakiuni@gmail.com";
	const NOMBRE_EMPESA = "Ecommerce Jaom";
	const WEB_EMPRESA = "https://i.pinimg.com/originals/01/18/57/01185761e21826ca33f3a89a468c2cf5.jpg";
	



	


 ?>