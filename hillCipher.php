<?php

$keyEnkrip = array(
       array(4,3),
       array(3,3)
);

$keyDekrip = array(
       array(1,25),
       array(25,10)
);



//var_dump($key);

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
               $string = trim($_POST['string']);
                   //pecah string nya menjadi perhuruf
                //   $key = trim($_POST['key']);

                   $userInputString = $string;
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
                     echo $_mod26[$chipAtas % 26];
                     // echo "<br>";
                     echo $_mod26[$chipBawah % 26];

                   }


               }


               if (isset($_POST["buttonDekrip"])){
                           // maka ambil string dan key yang diinput user
                           $string = trim($_POST['string']);
                               //pecah string nya menjadi perhuruf
                            //   $key = trim($_POST['key']);

                              $userInputString = $string;
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
                                echo $_mod26[$chipAtas % 26];
                                // echo "<br>";
                                echo $_mod26[$chipBawah % 26];

                              }


                           }




//var_dump(str_split($multiArray));


  //var_dump($keyCipher);
  // var_dump($multiArray);




  // echo  $final[0];
  // echo $mod26[$final] * $keyCipher[0][1];
  // echo "<br>";

    // if ($index == 0) {
    //     $cipherNumber0 =  $mod26[$final] * $keyCipher[0][0];
    //     $cipherNumber1 =  $mod26[$final] * $keyCipher[1][0];
    //nw
        //     // $cipherArray[$index] =  array($cipherNumber0, $cipherNumber1);
        //     // echo $cipherNumber0;
        //     // echo $cipherNumber1;
        //     // echo "<br>";
        // //     $cipherNumber2 = 0;
        // //     $cipherNumber3 = 0;
        //
        //   //$cipherArray[$index] = array($cipherNumber0, $cipherNumber1);
        //
        //   if ($index == 1) {
        //     $cipherNumber2 =  $mod26[$final] * $keyCipher[0][1];
        //     $cipherNumber3 =  $mod26[$final] * $keyCipher[1][1];
        //   }
        //
        //  }
        // else {
        //     // $cipherNumber0aa = null;
        //     // $cipherNumber1 = null;
        //
        //     // echo $cipherNumber2;
        //     // echo $cipherNumber3;foreach($value as $index => $final){

        //     // echo "<br>";
        //
        // //    $cipherArray[$index] = array($cipherNumber0, $cipherNumber1);
        // }

        // if ($cipherNumber0 != null && $cipherNumber2 != null) {
        //     $ciphertext1 = ($cipherNumber0 + $cipherNumber2);
        //
        //     echo $ciphertext1;
        // }else if($cipherNumber1 != null && $cipherNumber3 != null) {
        //     $ciphertext2 = ($cipherNumber1 + $cipherNumber3);
        //
        //     echo $ciphertext2;
        // }
        //
        // $ciphertext1 = ($cipherNumber0 + $cipherNumber2) % 26;
        // $ciphertext2 = ($cipherNumber1 + $cipherNumber3) % 26;
        // echo $ciphertext1 ;
        // echo $ciphertext2 ;
        // echo "<br>";



        // if ($cipherNumber0 != null && $cipherNumber2 != null && $cipherNumber1 != null && $cipherNumber3 != null) {
        //     $ciphertext1 = ($cipherNumber0 + $cipherNumber2) % 26;
        //     $ciphertext2 = ($cipherNumber1 + $cipherNumber3) % 26;
        //     echo $ciphertext1 ;
        //     echo "<br>";
        //     echo $ciphertext2 ;
        // }
        //  // echo $cipherNumber0;
  //      }

// var_dump($cipherArray);
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Hill Cipher</title>
   </head>
   <body>

     <br>
     <form  action="hillCipher.php" method="post">
       <input type="text" name="string" id="string" placeholder="Masukkan PlainText" >

       <button type="submit" name="buttonEnkrip">Enkripsi</button>
     </form>
     <br>

     <form  action="hillCipher.php" method="post">
       <input type="text" name="string" id="string" placeholder="Masukkan CiperText">

       <button type="submit" name="buttonDekrip">Dekripsi</button>
     </form>

   </body>
 </html>
