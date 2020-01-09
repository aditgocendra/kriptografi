<?php

//array ini digunakan untuk menginisialisasi huruf
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


//ketika tombol enkrip ditekan
if (isset($_POST["buttonEnkrip"])){
    // maka ambil string dan key yang diinput user
    $string = trim($_POST['string']);
    //pecah string nya menjadi perhuruf
    $arrString = str_split(strtolower($string));
    $key = trim($_POST['key']);
    // kemudian panggil method cariJumlahKey
    $totalKey = cariJumlahKey($string, $key);
    // setelah total key didapatkan pecah string nya menjadi perhuruf
    $arrKey = str_split($totalKey);

    echo "Ciphertext : ";
    //lakukan perulangan dengan foreach untuk menampilkan semua isi array
        foreach ($arrString as $index => $tampilString) {
            // maka huruf dari string dan key akan di inisilisasikan dengan angka
            // dan angka dari string akan ditambahkan dengan angka dari key
            $geserText = $mod26[$tampilString] + $mod26[$arrKey[$index]];
            // jika hasil dari penambahan melebihin 26
            if ($geserText > 25 ) {
              //maka akan dimodkan dengan 26
                $hasilKurang = $geserText % 26 ;
                $enkripsi = $_mod26[$hasilKurang];

              }else {
                $enkripsi =  $_mod26[$geserText];
          }
          //tampilkan hasil enkripsi
          echo $enkripsi;
}

}

//ketika button dekripsi ditekan
if (isset($_POST["buttonDekrip"])){
  //maka ambil ciphertext dan key yang diinput oleh user
    $string = trim($_POST['string']);
    //pecah string nya menjadi perhuruf
    $arrString = str_split(strtolower($string));
    $key = trim($_POST['key']);
    // panggil fungsi cariJumlahKey untuk mendapatkan jumla key nya
    $totalKey = cariJumlahKey($string, $key);
    // setelah total key didapatkan pecah string nya menjadi perhuruf
    $arrKey = str_split($totalKey);

    echo "Plaintext : ";
    //lakukan perulangan untuk menampilkan semua isi array
        foreach ($arrString as $index => $tampilString) {
          // maka huruf dari string dan key akan di inisilisasikan dengan angka
          // dan angka dari string akan dikurangi dengan angka dari key
            $geserText = $mod26[$tampilString] - $mod26[$arrKey[$index]];
            // jika hasil dari pengurangan kurang dari 0 atau hasil nya minus
            if ($geserText < 0 ) {
              // maka hasil nya akan ditambahkan denga 26
                $hasilTambah = $geserText + 26 ;
                $dekripsi = $_mod26[$hasilTambah];
              }else {
                $dekripsi = $_mod26[$geserText];
          }
          // tampil hasil dekripsi
          echo $dekripsi;
}

}



// fungsi ini di gunakan untuk menentukan jumlah character key
function cariJumlahKey($string, $key){
  //ambil jumlah String
    $jumlahString = strlen($string);
    //ambil Jumlah Key
    $jumlahKey = strlen($key);
    $tambahString = $key;
    $keyHasil = "";
    //jika jumlah string sama dengan jumlah key
    if ($jumlahString == $jumlahKey) {
        // maka key tetap
        $keyHasil = $key;
    //jika jumlah string kurang dari jumlah key
    }elseif ($jumlahString < $jumlahKey) {
          //maka jumlah dari key akan dikurangi jumlah dari string
          $kurangJumlahKey =  $jumlahKey - $jumlahString;
          //maka key akan dikurangi dengan hasil dari pengurangan di atas
            $keyHasil = substr($key, 0 , "-".$kurangJumlahKey);
    //jika jumlah String lebih dari jumlah key
    }else if ($jumlahString > $jumlahKey) {
      //maka lakukan perulangan while dengan kondisi jika jumlah string lebih dari jumlah key
        while ($jumlahString >= $jumlahKey) {
              // maka string dari key akan ditambah dengan key
                $tambahString = $tambahString.$key;
                $jumlahHasilTambah = strlen($tambahString);
                $jumlahKey = $jumlahHasilTambah;
                $keyHasil = $tambahString;
              // apabila setelah jumlah key ditambahkan dan hasil nya melebihi jumlah dari string
              if ($jumlahString < $jumlahKey) {
                  //maka jumlah dari key akan dikurangi dari jumlah string
                  $kurangJumlahKey =  $jumlahKey - $jumlahString;
                  // maka jumlah dari key akan dikurangi lagi dari hasil pengurangan diatass
                  $gabungKey = substr($tambahString, 0 , "-".$kurangJumlahKey);
                  $keyHasil = $gabungKey;
              }
            }
    }
    //return hasil key
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
