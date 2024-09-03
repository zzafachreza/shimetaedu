<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
include('koneksi.php');

$mail->SMTPDebug = 2;   // Enable verbose debug output
 $mail->isSMTP();      // Set mailer to use SMTP
 $mail->Host = 'okeadmin.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'megadia@okeadmin.com';                 // SMTP username
 $mail->Password = 'zavalabs123';                           // SMTP password
 $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 465;                                    // TCP port to connect to
 $mail->setFrom('megadia@okeadmin.com', 'MEGADIA');
 

                                


 $today = date('Y-m-d');
 
  $jam = date('H').':00:00';

   $sql="SELECT * FROM data_obat a JOIN data_user b ON a.fid_user = b.id WHERE jam='$jam' AND tanggal_selesai >='$today'";
   
   
   
   $sql_pagi="SELECT * FROM data_user WHERE makan_pagi='$jam'";
   $sql_siang="SELECT * FROM data_user WHERE makan_siang='$jam'";
   $sql_malam="SELECT * FROM data_user WHERE makan_malam='$jam'";
  

    
    

        $hasil =  $conn->query($sql); 
        while($r = $hasil->fetch(PDO::FETCH_OBJ)){  
            
            
        
                
            
             $judul = "Hallo  ".$r->nama_lengkap." Waktunya minum obat ".$r->nama_obat;
               $pesan = "Jangan Lupa Minum Obat Ya ".$r->nama_lengkap."<br/><br/><br/><br/><a href='https://megadia.okeadmin.com/'>https://megadia.okeadmin.com/</a>";;
            	$dataNotifikasi = array('title'=>$judul,'body'=>$pesan);
                
                 $to = $r->email; //tujuan email
                $sub = $judul;
                $isi = $pesan;
                                    try {
                                  
                                      $mail->addAddress($to);
                                      $mail->isHTML(true);                                  // Set email format to HTML
                                      $mail->Subject = $sub;
                                      $mail->Body    = $isi;

                                      // $mail->addAttachment('data/brand.png');
                                      $mail->send();
                                      $mail->clearAllRecipients(); 

                                }
                                 catch (Exception $e) {
                                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                }

            
        }
        
        
        // pagi
         $hasil_pagi =  $conn->query($sql_pagi); 
        while($r = $hasil_pagi->fetch(PDO::FETCH_OBJ)){  
            
            
        
                
            
            echo $judul = "Hallo  ".$r->nama_lengkap." Waktunya Makan Pagi";
               $pesan = "Jangan Lupa Catat Makan Pagi Ya ".$r->nama_lengkap."<br/><br/><br/><br/><a href='https://megadia.okeadmin.com/'>https://megadia.okeadmin.com/</a>";
            
                
                 $to = $r->email; //tujuan email
                $sub = $judul;
                $isi = $pesan;
                                    try {
                                  
                                      $mail->addAddress($to);
                                      $mail->isHTML(true);                                  // Set email format to HTML
                                      $mail->Subject = $sub;
                                      $mail->Body    = $isi;

                                      // $mail->addAttachment('data/brand.png');
                                      $mail->send();
                                      $mail->clearAllRecipients(); 

                                }
                                 catch (Exception $e) {
                                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                }

            
        }
        
        // siang
         $hasil_siang =  $conn->query($sql_siang); 
        while($r = $hasil_siang->fetch(PDO::FETCH_OBJ)){  
            
            
        
                
            
            echo $judul = "Hallo  ".$r->nama_lengkap." Waktunya Makan Siang";
               $pesan = "Jangan Lupa Catat Makan Siang Ya ".$r->nama_lengkap."<br/><br/><br/><br/><a href='https://megadia.okeadmin.com/'>https://megadia.okeadmin.com/</a>";
            
                
                 $to = $r->email; //tujuan email
                $sub = $judul;
                $isi = $pesan;
                                    try {
                                  
                                      $mail->addAddress($to);
                                      $mail->isHTML(true);                                  // Set email format to HTML
                                      $mail->Subject = $sub;
                                      $mail->Body    = $isi;

                                      // $mail->addAttachment('data/brand.png');
                                      $mail->send();
                                      $mail->clearAllRecipients(); 

                                }
                                 catch (Exception $e) {
                                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                }

            
        }
        
        // malam

         $hasil_malam =  $conn->query($sql_malam); 
        while($r = $hasil_malam->fetch(PDO::FETCH_OBJ)){  
            
            
        
                
            
             $judul = "Hallo  ".$r->nama_lengkap." Waktunya Makan Malam";
           $pesan = "Jangan Lupa Catat Makan Malam Ya ".$r->nama_lengkap."<br/><br/><br/><br/><a href='https://megadia.okeadmin.com/'>https://megadia.okeadmin.com/</a>";
            
                
                 $to = $r->email; //tujuan email
                $sub = $judul;
                $isi = $pesan;
                                    try {
                                  
                                      $mail->addAddress($to);
                                      $mail->isHTML(true);                                  // Set email format to HTML
                                      $mail->Subject = $sub;
                                      $mail->Body    = $isi;

                                      // $mail->addAttachment('data/brand.png');
                                      $mail->send();
                                      $mail->clearAllRecipients(); 

                                }
                                 catch (Exception $e) {
                                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                }

            
        }
        
               $mail->clearAllRecipients(); 