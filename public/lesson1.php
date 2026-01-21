<?php
$number1 = 5;
$number2 = 3;
$sum = $number1 + $number2;
echo "Сумма $number1 и $number2 равна $sum";


$Firstname = "Max";
$Lastname = "Savin";
$age = 36;
echo "Меня зовут $Firstname , Моя фамилия $Lastname , мне всего лишь $age лет!)";


$name = "Ритис";
$Age = 300;
$result = sprintf("Меня зовут %s, мне %d лет.", $name, $Age); // - важная херня!
echo $result;


$number = 10;
$stringnumber = (string)$number;
echo $stringnumber;
$integernumber = (int)$stringnumber;
$anothernumber = 4;
echo $integernumber + $anothernumber;


$apple = 3;
$orange = 4;
$sentence = "У меня $apple яблока и $orange апельсина.";
echo strlen($sentence);
$sum2 = $apple + $orange;
$newsentence = "У меня $sum2 яблок и апельсинов. ";
echo $newsentence;

?>

