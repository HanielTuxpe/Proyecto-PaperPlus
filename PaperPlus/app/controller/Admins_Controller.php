<?php
session_start();
include_once 'app/models/Reports_Model.php';
include_once 'app/LibreriaFPDF/fpdf.php';

class Admins_Controller
{
	private $vista;
	
	
    public function ProdsReport()
    {
        $historial=new Reports_Model();
        if(empty($_POST))
        {
            
           
            // Crear el objeto FPDF
            $pdf = new FPDF('L', 'mm', 'A4');
        
            // Agregar una página
            $pdf->AddPage('L');
            $pdf->Cell(150,30,$pdf->Image('app/img/LOGO.png',130,12,60,30),0,1,'R');
        
            // Establecer la fuente y el tamaño del título
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->SetLeftMargin(5);
            $pdf->Cell(0, 20, utf8_decode('Consulta general de Productos'), 0, 1, 'C');



            // Consulta a la base de datos
            
            $Consulta=$historial->getAllProds();     
            //Centrar la tabla
            $pdf->SetLeftMargin(5);
            if ($Consulta->num_rows > 0) {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(10, 10, 'Id', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Nombre', 1, 0, 'L');
                $pdf->Cell(130, 10, utf8_decode('Descripción'), 1, 0, 'C');
                $pdf->Cell(20, 10, 'Stock', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Precio', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Categoria', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Marca', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(10, 20, $row["IdProd"], 1, 0, 'C');
                    $pdf->Cell(40, 20, utf8_decode($row["Nombre"]), 1, 0, 'L');
                    $pdf->Cell(130, 20, utf8_decode($row["Descripción"]), 1, 0, 'J');
                    $pdf->Cell(20, 20, $row["Stock"], 1, 0, 'C');
                    $pdf->Cell(20, 20, $row["PrecioVenta"], 1, 0, 'C');
                    $pdf->Cell(20, 20, utf8_decode($row["Categoria"]), 1, 0, 'C');
                    $pdf->Cell(20, 20, utf8_decode($row["Marca"]), 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                $historial=new Reports_Model();
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }

        }
        else
        {
             $Consulta=$historial->getAllProds();
             $vista="app/views/Principal/Inicio.php";
             include_once("app/views/Principal/PlantillaAdmin.php");
        }
    }

    public function InvsReport()
    {
        $historial=new Reports_Model();
        if(empty($_POST))
        {
            
           
            // Crear el objeto FPDF
            $pdf = new FPDF();
        
            // Agregar una página
            $pdf->AddPage();
            $pdf->Cell(150,30,$pdf->Image('app/img/LOGO.png',130,12,60,30),0,1,'R');
        
            // Establecer la fuente y el tamaño del título
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->SetLeftMargin(25);
            $pdf->Cell(0, 20, utf8_decode('Consulta general de compras a proveedores'), 0, 1, 'C');



            // Consulta a la base de datos
            
            $Consulta=$historial->consInventary();     
            //Centrar la tabla
            $pdf->SetLeftMargin(25);
            if ($Consulta->num_rows > 0) {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(10, 10, 'Id', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Proveedor', 1, 0, 'L');
                $pdf->Cell(60, 10, utf8_decode('Producto'), 1, 0, 'C');
                $pdf->Cell(20, 10, 'Stock', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Fecha de Compra', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(10, 20, $row["IdInventario"], 1, 0, 'C');
                    $pdf->Cell(40, 20, utf8_decode($row["Proveedor"]), 1, 0, 'L');
                    $pdf->Cell(60, 20, utf8_decode($row["Producto"]), 1, 0, 'J');
                    $pdf->Cell(20, 20, $row["Stock"], 1, 0, 'C');
                    $pdf->Cell(40, 20, $row["FechaCompra"], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                $historial=new Reports_Model();
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }

        }
        else
        {
             $Consulta=$historial->consInventary();
             $vista="app/views/Principal/Inicio.php";
             include_once("app/views/Principal/PlantillaAdmin.php");
        }
    }
}
?>