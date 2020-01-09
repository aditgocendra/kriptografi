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

                                 echo '<script language="javascript">';
                                 echo 'alert("Plaintext dan key tidak sama panjang")';
                                 echo '</script>';

                             }else {
                               foreach ($userInputString as $index => $show) {

                                   $textPindah = $mod26[$show] + $mod26[$key[$index]];

                                   if ($textPindah > 25) {

                                     $enkrip = $textPindah % 26 ;
                                     $ciperText = $_mod26[$enkrip];

                                   }else {
                                     $ciperText = $_mod26[$textPindah];
                                   }
                                   $elements[] = $ciperText;

                               }
                               $enkripsi1 = implode($elements);
                               hillCipherEnkrip($enkripsi1, $mod26, $_mod26);
                             }

                           }

                           if (isset($_POST["buttonDekrip"])){
                             // maka ambil string dan key yang diinput user
                               $string = strtolower(trim($_POST['string']));
                               $key1 = strtolower(trim($_POST['key']));

                               CipherDekrip($string, $mod26, $_mod26, $key1);

                             }

function hillCipherEnkrip($cipher1, $mod26, $_mod26){

  $keyEnkrip = array(
         array(4,3),
         array(3,3)
  );

      $userInputString = $cipher1;
      $jumlahPlaintext = strlen($userInputString);

      if ($jumlahPlaintext % 2 == 0) {
        $plaintext = $userInputString;
      }else {
        $plaintext = $userInputString."a";
      }

      $arr2 = str_split($plaintext, 2);

      $multiArray;

      foreach ($arr2 as $index =>$value) {

        $multiArray[$index] =  str_split($value);
      }

      foreach ($multiArray as $coba => $value) {
      //  foreach($value as $index => $final){
        $chipAtas = ($mod26[$value[0]] * $keyEnkrip[0][0]) + ($mod26[$value[1]] * $keyEnkrip[0][1]);
        $chipBawah = ($mod26[$value[0]] * $keyEnkrip[1][0]) + ($mod26[$value[1]] * $keyEnkrip[1][1]);

        $elements1[] = $_mod26[$chipAtas % 26] . $_mod26[$chipBawah % 26];
        // echo $_mod26[$chipAtas % 26];
        // // echo "<br>";
        // echo $_mod26[$chipBawah % 26];

      }

       $enkripsi2 = implode($elements1);
       echo '<script language="javascript">';
       echo 'alert("'.$enkripsi2.'")';
       echo '</script>';

    }

    function CipherDekrip($dekrip1, $mod26, $_mod26, $key1){

      $keyDekrip = array(
             array(1,25),
             array(25,10));

      $userInputString = $dekrip1;
      $jumlahPlaintext = strlen($userInputString);

      if ($jumlahPlaintext % 2 == 0) {
        $plaintext = $userInputString;
      }else {
        $plaintext = $userInputString."a";
      }

      $arr2 = str_split($plaintext, 2);

      $multiArray;

      foreach ($arr2 as $index =>$value) {

        $multiArray[$index] =  str_split($value);
      }


      foreach ($multiArray as $coba => $value) {

        // echo ($mod26[$value[0]] * $keyDekrip[0][0]) + ($mod26[$value[1]] * $keyDekrip[0][1]);
        // echo "<br>";
        // echo ($mod26[$value[0]] * $keyDekrip[1][0]) + ($mod26[$value[1]] * $keyDekrip[1][1]);
        // echo "<br>";
        $chipAtas = ($mod26[$value[0]] * $keyDekrip[0][0]) + ($mod26[$value[1]] * $keyDekrip[0][1]);
        $chipBawah = ($mod26[$value[0]] * $keyDekrip[1][0]) + ($mod26[$value[1]] * $keyDekrip[1][1]);

        $elements1[] = $_mod26[$chipAtas % 26] . $_mod26[$chipBawah % 26];

      }
      $dekrip2 = implode($elements1);


      // One Time Pad Dekripsi
      $cipher_dekrip = str_split($dekrip2);
      $key = str_split($key1);

      if (strlen($dekrip2) != strlen($key1)) {
          $kurangiString = substr($dekrip2);

          if (strlen($kurangiString) != strlen($key1)) {
              echo "Plaintext dan key tidak sama panjang";
          }
      }else {
        foreach ($cipher_dekrip as $index => $show) {

            $textPindah = $mod26[$show] - $mod26[$key[$index]];

            if ($textPindah < 0) {

              $enkrip = $textPindah + 26 ;
              $plaintext = $_mod26[$enkrip];

            }else {
              $plaintext = $_mod26[$textPindah];
            }

           $elementsPlaintext[] = $plaintext;
        }

        $plaintextAsli = implode($elementsPlaintext);
        echo '<script language="javascript">';
        echo 'alert("'.$plaintextAsli.'")';
        echo '</script>';
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
    <div style="width:600px; margin:0 auto;">
      <form  action="CombineCipher.php" method="post">
        <input type="text" name="string" id="string" placeholder="Masukkan PlainText" >
        <input type="text" name="key" id="key" placeholder="Masukkan Key" >

        <button type="submit" name="buttonEnkrip">Enkripsi</button>
      </form>
      <br>



      <br>
      <br>
      <form  action="CombineCipher.php" method="post">
        <input type="text" name="string" id="string" placeholder="Masukkan CiperText">
        <input type="text" name="key" id="key" placeholder="Masukkan Key" >
        <br>

        <button type="submit" name="buttonDekrip">Dekripsi</button>
      </form>
      <br>



      </div>


  </body>
</html>
