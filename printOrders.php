<?php

include 'db_connect.php';
require('fpdf/fpdf.php');
session_start();
ob_start();

$qry = $conn->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
$row1 = $qry->fetch_assoc();
$order_id = $row1['id'];
$total_amount = $row1['total_amount'];

class PDF extends FPDF
{
  function header()
  {
        $this->SetFont('Arial', 'B', 16); 
        $this->Cell(190, 10, 'ORDER DETAILS', 0, 1, 'C');   

      $this->SetFont('Arial', 'B', 12);
      $this->Cell(40, 10, 'Shoe Name', 1, 0, 'C');
      $this->Cell(35, 10, 'Brand', 1, 0, 'C');
      $this->Cell(35, 10, 'Category', 1, 0, 'C');
      $this->Cell(35, 10, 'Size', 1, 0, 'C');
      $this->Cell(35, 10, 'Price', 1, 1, 'C');
  }

  function footer()
  {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
  }

  function chapterTitle($title)
  {
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(0, 10, $title, 0, 1, 'L');
  }

  function chapterBody($body)
  {
      $this->SetFont('Arial', '', 12);
      $this->MultiCell(0, 10, $body);
  }
}

$pdf = new PDF();
$pdf->AddPage();
$getItems = $conn->query("SELECT oi.*, p.name, p.product_image, p.category, p.brand, b.name AS brand_name
                    FROM order_items oi
                    LEFT JOIN orders o ON oi.order_id = o.id
                    LEFT JOIN products p ON oi.product_id = p.id
                    LEFT JOIN brand b ON p.brand = b.id
                    WHERE oi.order_id = $order_id;");

while ($row = $getItems->fetch_assoc()){
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $brand = $row['brand_name'];
    $picture = $row['product_image'];
    $size = $row['size'];
    $category = $row['category'];
    $status = $row['order_status'];

    $pdf->Cell(40, 10, $name, 1, 0,'C');
    $pdf->Cell(35, 10, $brand, 1, 0, 'C');
    $pdf->Cell(35, 10, $category, 1, 0, 'C');
    $pdf->Cell(35, 10, $size, 1, 0, 'C');
    $pdf->Cell(35, 10, $price, 1, 1, 'C');
}
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(70, 10, '', 0);
$pdf->Cell(35, 10, '', 0, 0, 'C');
$pdf->Cell(35, 10, 'Total Amount:', 0);
$pdf->Cell(50, 10, $total_amount, 0, 1, 'C');


$pdf->Output('Order_Details.pdf', 'D');

?>