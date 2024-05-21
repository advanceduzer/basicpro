<?php
//int
echo "Дії з числами" . "<br><br>";

$a = 7;
$b = 3;
echo "1. Отримати залишок від ділення 7 на 3: " . $a % $b . "<br>";

$c = 7;
$d = 7.15;
echo "2. Отримати цілу частину ділення 7 и 7,15: " . floor($c / $d) . "<br>";

$e = 25;
echo "3. Отримати корінь из 25: " . sqrt($e) . "<br><br>";

//str
echo "Дії зі строкаи" . "<br><br>";

$phrase = "Десять негритят пошли купаться в море";
$phrases = explode(" ", $phrase);
echo "4. Отримати 4-е слово з фрази - " . $phrase . ": " . $phrases[3] . "<br>";

$seventeenth_char = mb_substr($phrase, 16, 1, 'UTF-8');
echo "5. Отримати 17-й символ із фрази - " . $phrase . ": " . $seventeenth_char . "<br>";


$upper_phrase = mb_convert_case($phrase, MB_CASE_TITLE, "UTF-8");
echo "6. Зробити великою кожну першу букву слів фрази -" . $phrase . ": " . $upper_phrase . "<br>";


echo "7. Порахувати длину строки - " . $phrase . ": " . mb_strlen($phrase) . "<br><br>";

//boolean
echo "Дії з логіческими даними" . "<br><br>";


echo "8. Чи вірно твердження true дорівнює 1: ";
if (true == 1) {
    echo "да, если по значению" . "<br>";
}
if (true === 1) {
    echo "нет, если по значению и типу переменной" . "<br>";
}

echo "9. Чи вірно твердження false тождественно 0: ";
if (false === 0) {
    echo "";
} else {
    echo "нет, другой тип переменной" . "<br>";
}




echo "10. Яка строка більше three - три: ";

$three_en = "three";
$three_utf = "три";
$three_en_length = mb_strlen($three_en);
$three_utf_length = mb_strlen($three_utf);

if ($three_en_length > $three_utf_length) {
    echo "three" . "<br>";
} else {
    echo "три";
}


$x = 125 * 13 + 7;
$y = 233 + 28 * 2;

if ($x > $y) {
    echo "11. 125 умножить на 13 плюс 7 = " . $x . " <b>больше</b> чем 223 плюс 28 умножить 2 = " . $y . "</br>";
} else {
    echo $y . ">" . $x . "</br>";
}
