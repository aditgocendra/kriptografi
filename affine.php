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
if (isset($_POST['buttonEnkrip'])) {
  // maka ambil string dan key yang diinput user
    $key1 = $_POST['key1'];
    $key2 = $_POST['key2'];
    // pecah string menjadi perhuruf
    $plaintext = str_split(trim(strtolower($_POST['string'])));

    echo "Ciphertext : ";
//lakukan perulangan dengan foreach untuk menampilkan
//semua isi array dari $plaintext
    foreach ($plaintext as $string) {
      // key pertama akan dikalikan dengan hasil angka yng mewakili huruf
      // kemudian akan ditambahkan dengan key ke dua
        $P = $key1*$mod26[$string]+$key2;
        //jika hasil nya melebihi dari 26
        if ($P > 25) {
          // maka hasil nya akan dimod kan dengan 26
            $enkripsi = $P % 26;
        }else {
            $enkripsi = $P;
        }
        //tampil hasil enkripsi
        echo $_mod26[$enkripsi];
    }
      }
//ketika tombol dekrip ditekan
if (isset($_POST['buttonDekrip'])) {
    $key1 = $_POST['key1'];
    $key2 = $_POST['key2'];
    // maka ambil string dan key yang diinput user
    $ciphertext = str_split(trim(strtolower($_POST['string'])));

    echo "Plaintext : ";
    //lakukan perulangan dengan foreach untuk menampilkan
    //semua isi array dari $ciphertext
    foreach ($ciphertext as $string) {
      // key pertama akan dikalikan dengan hasil dari pengurangan angka yang mewakili huruf
      // dengan key ke dua
        $P = $key1 * ($mod26[$string] - $key2);
      //jika hasil nya lebih dari 26 atau kurang dari 0
        if ($P > 25 ) {
        //maka hasil nya akan di mod kan dengan 26
            $dekripsi = $P % 26;
        //jika hasil nya kurang dari 0
        }elseif($P < 0){
        // maka hasil nya akan di mode kan dengan 26 lalu dikurangi dengan 26
          $dekripsi = $P % 26 + 26;
        }
        else {
            $dekripsi = $P;
        }
        //tampil hasil dekripsi
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
