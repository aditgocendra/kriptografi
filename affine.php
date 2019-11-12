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


if (isset($_POST['buttonEnkrip'])) {
    $key1 = $_POST['key1'];
    $key2 = $_POST['key2'];
    $plaintext = str_split(trim(strtolower($_POST['string'])));

    echo "Ciphertext : ";
    foreach ($plaintext as $string) {
        $P = $key1*$mod26[$string]+$key2;
        if ($P > 25) {

            $enkripsi = $P % 26;
        }else {
            $enkripsi = $P;
        }

        echo $_mod26[$enkripsi];
    }
      }

if (isset($_POST['buttonDekrip'])) {
    $key1 = $_POST['key1'];
    $key2 = $_POST['key2'];
    $plaintext = str_split(trim(strtolower($_POST['string'])));

    echo "Plaintext : ";
    foreach ($plaintext as $string) {
        $P = $key1 * ($mod26[$string] - $key2);

        if ($P > 25) {

            $dekripsi = $P % 26;
        }else {
            $dekripsi = $P;
        }

        echo $_mod26[$dekripsi];
    }
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Affine Cipher</title>
   </head>
   <body>

     <form  action="affine.php" method="post">
       <input type="text" name="key1" id="key" placeholder="Masukkan Key 1">
        <input type="text" name="key2" id="key" placeholder="Masukkan Key 2">
        <br>
       <input type="text" name="string" id="string" placeholder="Masukkan String">

       <button type="submit" name="buttonEnkrip">Enkripsi</button>
     </form>
     <br><br>
     <form  action="affine.php" method="post">
       <input type="text" name="key1" id="key" placeholder="Masukkan Key 1">
        <input type="text" name="key2" id="key" placeholder="Masukkan Key 2">
        <br>
       <input type="text" name="string" id="string" placeholder="Masukkan String">

       <button type="submit" name="buttonDekrip">Dekripsi</button>
     </form>

   </body>
 </html>
