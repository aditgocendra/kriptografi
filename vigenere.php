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
    $string = trim($_POST['string']);
    $arrString = str_split(strtolower($string));

    $key = trim($_POST['key']);
    $totalKey = cariJumlahKey($string, $key);
    $arrKey = str_split($totalKey);

    echo "Ciphertext : ";
        foreach ($arrString as $index => $tampilString) {
            $geserText = $mod26[$tampilString] + $mod26[$arrKey[$index]];

            if ($geserText > 25 ) {
                $hasilKurang = $geserText - 26 ;

                $enkripsi = $_mod26[$hasilKurang];
              }else {
                $enkripsi =  $_mod26[$geserText];
          }
          echo $enkripsi;
}

}


if (isset($_POST["buttonDekrip"])){
    $string = trim($_POST['string']);
    $arrString = str_split(strtolower($string));

    $key = trim($_POST['key']);
    $totalKey = cariJumlahKey($string, $key);
    $arrKey = str_split($totalKey);

    echo "Plaintext : ";
        foreach ($arrString as $index => $tampilString) {
            $geserText = $mod26[$tampilString] - $mod26[$arrKey[$index]];

            if ($geserText < 0 ) {
                $hasilTambah = $geserText + 26 ;

                $dekripsi = $_mod26[$hasilTambah];
              }else {
                $dekripsi = $_mod26[$geserText];
          }
          echo $dekripsi;
}

}


//array mod 26
// fungsi ini di gunakan untuk menentukan jumlah character key
function cariJumlahKey($string, $key){
  //hitung jumlah String
    $jumlahString = strlen($string);
    //hitung Jumlah Key
    $jumlahKey = strlen($key);
    $tambahString = $key;
    $keyHasil = "";

    if ($jumlahString == $jumlahKey) {
        $keyHasil = $key;
    }elseif ($jumlahString < $jumlahKey) {

          $kurangJumlahKey =  $jumlahKey - $jumlahString;
            $keyHasil = substr($key, 0 , "-".$kurangJumlahKey);

    }else if ($jumlahString > $jumlahKey) {

        while ($jumlahString >= $jumlahKey) {

                $tambahString = $tambahString.$key;
                $jumlahHasilTambah = strlen($tambahString);
                $jumlahKey = $jumlahHasilTambah;
                $keyHasil = $tambahString;

              if ($jumlahString < $jumlahKey) {

                  $kurangJumlahKey =  $jumlahKey - $jumlahString;
                  $gabungKey = substr($tambahString, 0 , "-".$kurangJumlahKey);
                  $keyHasil = $gabungKey;
              }
            }
    }
     return $keyHasil;

  }

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Vigenere Cipher</title>
   </head>
   <body>

     <br>
     <form  action="vigenere.php" method="post">
       <input type="text" name="key" id="key" placeholder="Masukkan Key" >
       <input type="text" name="string" id="string" placeholder="Masukkan String" >

       <button type="submit" name="buttonEnkrip">Enkripsi</button>
     </form>
     <br>

     <form  action="vigenere.php" method="post">
       <input type="text" name="key" id="key" placeholder="Masukkan Key">
       <input type="text" name="string" id="string" placeholder="Masukkan String">

       <button type="submit" name="buttonDekrip">Dekripsi</button>
     </form>

   </body>
 </html>
