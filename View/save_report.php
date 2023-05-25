<?php
require_once __DIR__ . '/vendor/autoload.php';

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$description = $_POST['description'];

$mpdf = new \Mpdf\Mpdf();

$data = '';

$data .= "<hReport1></h1>";

$data .= '<strong> name </strong>' . $name . '<br>';
$data .= '<strong> mobile </strong>' . $mobile . '<br>';
$data .= '<strong> email </strong>' . $email. '<br>';
$data .= '<strong> description </strong>' . $description. '<br>';

$mpdf->WriteHTML('<h1>Hello world!</h1>');

$mpdf->Output('myFile.pdf','D');



?>