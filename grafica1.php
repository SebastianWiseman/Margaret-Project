<?php
 require_once ('jpgraph/src/jpgraph.php');
 require_once ('jpgraph/src/jpgraph_bar.php');


$conexion = mysql_connect("localhost","root","");

if (!$conexion) {
	die("Eror al conectar con el servidor de bases de datos :( ".mysql_error());
	
}

mysql_select_db("BaseDatosRegistros") or die("no se pudo seleccionar la base de datos :( ".mysql_error());



/**  Grfica Cliente X Casa   ***/
$sql1="SELECT * FROM formulariodatos";

$res1= mysql_query($sql1);

$datos=array();
$label=array();



while($row=mysql_fetch_array($res1)){
	

$label[] = $row['idCasa'];


	
}


 $sql2 = "SELECT COUNT(idCasa) as datos  FROM formulariodatos where idCasa = 'Abedules'";
 $res2= mysql_query($sql2);
 
while($row=mysql_fetch_array($res2)){
	

$datos[] = $row['datos'];


	
}
$sql2 = "SELECT COUNT(idCasa) as datos  FROM formulariodatos where idCasa = 'Alamos'";
 $res2= mysql_query($sql2);
 
while($row=mysql_fetch_array($res2)){
	

$datos[] = $row['datos'];


	
}

$sql2 = "SELECT COUNT(idCasa) as datos  FROM formulariodatos where idCasa = 'Constelaciones'";
 $res2= mysql_query($sql2);
 
while($row=mysql_fetch_array($res2)){
	

$datos[] = $row['datos'];


	
}

$sql2 = "SELECT COUNT(idCasa) as datos  FROM formulariodatos where idCasa = 'Olivos'";
 $res2= mysql_query($sql2);
 
while($row=mysql_fetch_array($res2)){
	

$datos[] = $row['datos'];


	
}

$sql2 = "SELECT COUNT(idCasa) as datos  FROM formulariodatos where idCasa = 'Amazonas'";
 $res2= mysql_query($sql2);
 
while($row=mysql_fetch_array($res2)){
	

$datos[] = $row['datos'];


	
}




$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");

$grafico->xaxis->title->Set("Casas");
$grafico->xaxis->SetTickLabels($label);
$grafico->yaxis->title->Set("Interesados");
$barplot1 =new BarPlot($datos);

// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);

// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();

$grafico->Stroke("grafica1.PNG");
/* Grafica propuesta X fecha  **/







?>