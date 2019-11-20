<?php 
$tanggal = date("d-m-Y");
$jam = date("H:i:s");
$var_magin_left = 5;
$p = printer_open('POS58 (Copy 1)');
printer_set_option($p, PRINTER_MODE, "RAW"); // mode disobek (gak ngegulung kertas)

//then the width
printer_set_option( $p,PRINTER_RESOLUTION_Y, 940);
printer_start_doc($p);
printer_start_page($p);

$font = printer_create_font("Arial", 38, 10, PRINTER_FW_NORMAL, false, false, false, 0);
printer_select_font($p, $font);
printer_draw_text($p, "UPT PUSKESMAS NYOMPOK KECAMATAN KOPO",100,0);
//printer_draw_text($p, "",250,20);
// Header Bon
$pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
printer_select_pen($p, $pen);
//printer_draw_line($p, $var_magin_left, 50, 700, 50);
printer_draw_text($p, "No Antrian Anda:", 10, 50);

$font = printer_create_font("Arial", 98, 37, PRINTER_FW_NORMAL, false, false, false, 0);
printer_select_font($p, $font);
printer_draw_text($p, "P$antrian", 210, 70);

$font = printer_create_font("Arial", 15, 12, PRINTER_FW_NORMAL, false, false, false, 0);
printer_select_font($p, $font);
printer_draw_text($p, "Waktu Antrian :", $var_magin_left, 150);
printer_draw_text($p, date("Y/m/d H:i:s"),$var_magin_left, 170);
printer_draw_line($p, $var_magin_left, 210, 700, 210);
printer_draw_text($p, "\"Budayakan Antri Untuk Kenyamanan \n Bersama\"", $var_magin_left, 230);
printer_draw_text($p, "Terimakasih Atas Kunjungannya", 100, 250);

printer_draw_text($p, "  ", $var_magin_left, 260);

$row +=300;
printer_draw_text($p, "- ", 0, $row);
                           
printer_delete_font($font);

printer_end_page($p);
printer_end_doc($p);

printer_start_doc($p);
printer_start_page($p);
printer_close($p);
/**include 'config/database.php';
include "config/fungsi_zona.php";
mysql_query("INSERT INTO `nomor_antrian_administrasi`( `nomor_antrian`, `created`) VALUES ('P$antrian','$wita')");
header("location:struk.php");**/
?>
