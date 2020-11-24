<?php
    require('fpdf.php');
    //Incluimos las funciones de mandar los correos pertinentes.
    include '../php/Email.php';

    function crearPDF($email,$nomrbre,$apellidos,$passEmail,$dia,$fecha_expiracion,$metedoPago,$NombreyApellidos,$fecha_actual){
        class PDF extends FPDF{
            // Cabecera de página
                function Header(){
                    // Arial bold 15
                    $this->SetFont('Arial','B',15);
                    // Movernos a la derecha
                    $this->Cell(80);
                    // Título
                    $this->Cell(30,10,'Films-online',0,0,'C');
                    // Salto de línea
                    $this->Ln(20);
                }
        
            // Pie de página
                function Footer(){
                    // Posición: a 1,5 cm del final
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Número de página
                    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
                }
            }

            $nombrePDFcompleto='../pdf/factura-'.$email.'-'.$fecha_actual.'.pdf';
            $nombrePDF='factura-'.$email.'-'.$fecha_actual.'.pdf';
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',12);
            $pdf->Cell(0,10,utf8_decode('Bienvenido '.$nomrbre.' '.$apellidos.' se ha dado de alta en Films-online.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Fecha de alta: '.$fecha_actual.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Mensualidad : '.$dia.' días.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Fecha de expiración: '.$fecha_expiracion.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Email: '.$email.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Password: '.$passEmail),0,1);
            $pdf->Cell(0,10,utf8_decode('Metodo de pago usado: '.$metedoPago.' a nombre de '.$NombreyApellidos.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Muchas gracias por su suscripción y para cualquier duda no dude en mandarnos '),0,1);
            $pdf->Cell(0,10,utf8_decode('un mensaje al correo: proyecto.films.online@gmail.com '),0,1);
            $pdf->Cell(0,10,utf8_decode('Atentamente el equipo Films-online.'),0,1);
            $pdf->Output('F',$nombrePDFcompleto);

            email($email,$nomrbre,$apellidos,$passEmail,$dia,$fecha_expiracion,$nombrePDFcompleto);
            unlink($nombrePDFcompleto);
    }

    function renovarPDF($email,$dia,$fecha_expiracion,$metedoPago,$NombreyApellidos,$fecha_actual){
        class PDF extends FPDF{
            // Cabecera de página
                function Header(){
                    // Arial bold 15
                    $this->SetFont('Arial','B',15);
                    // Movernos a la derecha
                    $this->Cell(80);
                    // Título
                    $this->Cell(30,10,'Films-online',0,0,'C');
                    // Salto de línea
                    $this->Ln(20);
                }
        
            // Pie de página
                function Footer(){
                    // Posición: a 1,5 cm del final
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Número de página
                    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
                }
            }

            $nombrePDFcompleto='../pdf/factura-'.$email.'-'.$fecha_actual.'.pdf';
            $nombrePDF='factura-'.$email.'-'.$fecha_actual.'.pdf';
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',12);
            $pdf->Cell(0,10,utf8_decode('Se ha renovado su suscripción en Films-online.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Fecha de renovación: '.$fecha_actual.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Mensualidad : '.$dia.' días.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Fecha de expiración: '.$fecha_expiracion.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Metodo de pago usado: '.$metedoPago.'.'),0,1);
            $pdf->Cell(0,10,utf8_decode('Muchas gracias por su renovacíon y para cualquier duda no dude en mandarnos '),0,1);
            $pdf->Cell(0,10,utf8_decode('un mensaje al correo: proyecto.films.online@gmail.com '),0,1);
            $pdf->Cell(0,10,utf8_decode('Atentamente el equipo Films-online.'),0,1);
            $pdf->Output('F',$nombrePDFcompleto);

            emailRenovacion($email,$dia,$fecha_expiracion,$nombrePDFcompleto);
            unlink($nombrePDFcompleto);
    }
?>