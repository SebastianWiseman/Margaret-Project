<?php
 require_once ('jpgraph/src/jpgraph.php');
 require_once ('jpgraph/src/jpgraph_bar.php');
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
	die("Eror al conectar con el servidor de bases de datos :( ".mysql_error());
}
mysql_select_db("BaseDatosRegistros") or die("no se pudo seleccionar la base de datos :( ".mysql_error());

/**  Grfica Cliente X Casa   ***/
$sql="SELECT * FROM formulariopropuestas";
$res= mysql_query($sql);
$datos=array();
$label=array();

while($row=mysql_fetch_array($res)){	
$label[] = $row['fecha'];
}

$label[sizeof($label)] ="Diciembre";
 $sql = "SELECT COUNT(nombre) as datos  FROM formulariopropuestas WHERE MONTH( fecha ) = '12' and DAY(fecha) ='9'";
 $res= mysql_query($sql);
while($row=mysql_fetch_array($res)){
$datos[] = $row['datos'];
}
$sql = "SELECT COUNT(nombre) as datos  FROM formulariopropuestas WHERE MONTH( fecha ) = '12' and DAY(fecha) ='8'";
 $res= mysql_query($sql);
while($row=mysql_fetch_array($res)){
	
$datos[] = $row['datos'];
}
$sql = "SELECT COUNT(nombre) as datos  FROM formulariopropuestas WHERE MONTH( fecha ) = '12' and DAY(fecha) ='7'";
 $res= mysql_query($sql);
while($row=mysql_fetch_array($res)){
$datos[] = $row['datos'];
}
$sql = "SELECT COUNT(nombre) as datos  FROM formulariopropuestas WHERE MONTH( fecha ) = '12' and DAY(fecha) ='6'";
 $res= mysql_query($sql);
while($row=mysql_fetch_array($res)){
$datos[] = $row['datos'];	
}
$sql = "SELECT COUNT(nombre) as datos  FROM formulariopropuestas WHERE MONTH( fecha ) = '12'";
 $res= mysql_query($sql);
 
while($row=mysql_fetch_array($res)){
$datos[] = $row['datos'];	
}

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->xaxis->title->Set("Fecha");
$grafico->xaxis->SetTickLabels($label);
$grafico->yaxis->title->Set("Peticiones");
$barplot1 =new BarPlot($datos);
// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#FFFFFF", "#000000", GRAD_HOR);
// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();
$grafico->Stroke("grafica1.PNG");
/* Grafica propuesta X fecha  **/

?>