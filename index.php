<?php
//Lesson 4: Functions

// Создать функцию принимающую массив произвольной вложенности и определяющий любой элемент номер которого передан параметром во всех вложенных массивах.

function find_element(array $array, int $index): array
{
  $result = [];

  foreach ($array as $key => $value) {
    if (is_array($value)) {
      $result = array_merge($result, find_element($value, $index));
    } elseif ($key === $index) {
      $result[] = $value;
    }
  }

  return $result;
}

$index = 1;
$array = [
  [1, 2, [3, 4]],
  [5, 6, [7, 8]],
  [9, 10]
];

var_dump(find_element($array, $index));
echo '<br>';



// Создать функцию которая считает все буквы b в переданной строке, в случае если передается не строка функция должна возвращать false

function find_letter(string $sentence, string $letter = 'b'): int
{
  $result = NULL;

  if (is_string($sentence)) {

    $letters = (array) str_split($sentence);
    foreach ($letters as $key => $value) {
      $value = strtolower($value);
      if ($value == $letter) {
        $result += 1;
      }
    }
    return $result;
  }
}
$sentence = "Happy birthday Benjamin Franklin";

echo find_letter($sentence);
echo '<br>';


// Создать функцию которая считает сумму значений всех элементов массива произвольной глубины

function count_summ(array $array): int | float | NULL
{
  $result = NULL;
  foreach ($array as $element) {

    if (is_array($element)) {
      $result += count_summ($element);
    } else {
      $result += $element;
    }
  }
  return $result;
}

//var_dump(recursive_summ([range("a","j"), range('F','X')]));


echo (count_summ([range('1', '2'), range('1', '2')]));
echo '<br>';

// Создать функцию которая определит сколько квадратов меньшего размера можно вписать в квадрат большего размера размер возвращать в float

function count_squares(int $bigger_side, int $smaller_side): int | float | NULL
{
  $squares = NULL;

  if ($smaller_side <= 0 || $bigger_side <= 0) {
    echo 'error';
    return NULL;
  } else {
    $square_side = $bigger_side / $smaller_side;
    $squares = $square_side * $square_side;
  }

  return $squares;
}

echo count_squares(30, 3);
