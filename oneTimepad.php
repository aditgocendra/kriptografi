<?php

$mod26 = array('a' => 0, 'b' => 1, 'c' => 2, 'd' => 3, 'e' => 4,
              'f' => 5, 'g' => 6, 'h' => 7, 'i' => 8, 'j' => 9,
              'k' => 10, 'l' => 11, 'm' => 12, 'n' => 13, 'o' => 14,
              'p' => 15, 'q' => 16, 'r' => 17, 's' => 18,'t' => 19,
              'u' => 20, 'v' => 21, 'w' => 22, 'x' => 23, 'y' => 24,
              'z' => 25);

$_mod26 = array('0' => 'a', '1'  => 'b', '2' => 'c', '3' => 'd', '4' => 'e',
               '5'  => 'f', '6'  => 'g', '7' => 'h', '8' => 'i', '9' => 'j',
               '10' => 'k', '11' => 'l', '12'=> 'm', '13'=> 'n', '14'=> 'o',
               '15' => 'p', '16' => 'q', '17'=> 'r', '18'=> 's', '19'=> 't',
               '20' => 'u', '21' => 'v', '22'=> 'w', '23'=> 'x', '24'=> 'y',
                '25' => 'z');


    if (isset($_POST["buttonEnkrip"])){
      // maka ambil string dan key yang diinput user
        $string = strtolower(trim($_POST['string']));
        $key1 = strtolower(trim($_POST['key']));

        $userInputString = str_split($string);
        $key = str_split($key1);



        if (strlen($string) != strlen($key1)) {
            echo "Plaintext dan key tidak sama panjang";
        }else {
          foreach ($userInputString as $index => $show) {

              $textPindah = $mod26[$show] + $mod26[$key[$index]];

              if ($textPindah > 25) {

                $enkrip = $textPindah % 26 ;
                $ciperText = $_mod26[$enkrip];

              }else {
                $ciperText = $_mod26[$textPindah];
              }

              echo $ciperText;

          }
        }

      }

      if (isset($_POST["buttonDekrip"])){
        // maka ambil string dan key yang diinput user
          $string = strtolower(trim($_POST['string']));
          $key1 = strtolower(trim($_POST['key']));

          $userInputString = str_split($string);
          $key = str_split($key1);

          if (strlen($string) != strlen($key1)) {
              echo "Plaintext dan key tidak sama panjang";
          }else {
            foreach ($userInputString as $index => $show) {

                $textPindah = $mod26[$show] - $mod26[$key[$index]];

                if ($textPindah < 0) {

                  $enkrip = $textPindah + 26 ;
                  $plaintext = $_mod26[$enkrip];

                }else {
                  $plaintext = $_mod26[$textPindah];
                }

                echo $plaintext;

            }
          }

        }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Hill Cipher</title>
   </head>
   <body>

     <br>
     <form  action="oneTimepad.php" method="post">
       <input type="text" name="string" id="string" placeholder="Masukkan PlainText" >
       <input type="text" name="key" id="key" placeholder="Masukkan Key" >

       <button type="submit" nnwame="buttonEnkrip">Enkripsi</button>
     </form>
     <br>

     <form  action="oneTimepad.php" method="post">
       <input type="text" name="string" id="string" placeholder="Masukkan CiperText">
       <input type="text" name="key" id="key" placeholder="Masukkan Key" >

       <button type="submit" name="buttonDekrip">Dekripsi</button>
     </form>

   </body>
 </html>
