<?php
//Lesson3: Arrays

$arr = [1, 2, 3, 7, 31, 4, 1, 8, 6];
echo "<pre>\$arr = [1, 2, 3, 7, 31, 4, 1, 8, 6]</pre><br>";


echo "1. посчитать длину массива:" . sizeof($arr) . "<br>";
$arr_start = array_slice($arr, 0, 4);
$arr_end = array_splice($arr, 4);
$result = array_merge($arr_end, $arr_start);

echo "2. переместить первые 4 элемента массива в конец массива: ";
$last_value = end($result);
foreach ($result as $value) {
  if ($value !== $last_value) {
    echo $value . ', ';
  } else {
    echo $value;
  }
}
echo "<br>";

echo "3. получить сумму 4,5,6 элемента: ";
$arr = [1, 2, 3, 7, 31, 4, 1, 8, 6];
$sum = array_slice($arr, 3, 3);
$last = end($sum);
foreach ($sum as $value) {
  if ($value !== $last) {
    echo $value . ' + ';
  } else {
    echo $value;
  }
}
echo " = " . array_sum($sum) . "<br>";


echo "<br>";
echo "<pre>\$firstArr = [
  'one' => 1,
  'two' => 2,
  'three' => 3,
  'foure' => 5,
  'five' => 12,
];

\$secondArr = [
  'one' => 1,
  'seven' => 22,
  'three' => 32,
  'foure' => 5,
  'five' => 13,
  'six' => 37,
];</pre>";

$firstArr = [
  'one' => 1,
  'two' => 2,
  'three' => 3,
  'four' => 5,
  'five' => 12,
];

$secondArr = [
  'one' => 1,
  'seven' => 22,
  'three' => 32,
  'four' => 5,
  'five' => 13,
  'six' => 37,
];

function printValues($result) {
  $last_value = end($result);
  foreach ($result as $value) {
      if ($value !== $last_value) {
          echo $value . ', ';
      } else {
          echo $value;
      }
  }
}

echo "4. найти все элементы которые отсутствуют в первом массиве и присутствуют во втором: ";
$result = array_diff($secondArr, $firstArr);
printValues($result);
echo "<br>";

echo "5. найти все элементы которые отсутствуют в первом массиве и присутствуют во втором: ";
$result = array_diff($firstArr, $secondArr);
printValues($result);
echo "<br>";

echo "6. найти все элементы значения которых совпадают: ";
$result = array_intersect($firstArr, $secondArr);
printValues($result);
echo "<br>";

echo "7. найти все элементы значения которых отличается: ";
$result = array_intersect($firstArr, $secondArr);
$result = array_merge(array_diff($firstArr, $secondArr), array_diff($secondArr, $firstArr));
printValues($result);
echo "<br>";


echo "<pre> \$firstArr = [
  'one' => 1,
  'two' => [
    'one' => 1,
    'seven' => 22,
    'three' => 32,
  ],
  'three' => [
    'one' => 1,
    'two' => 2,
  ],
  'four' => 5,
  'five' => [
   'three' => 32,
   'foure' => 5,
   'five' => 12,
  ],
];</pre>";
$firstArr = [
  'one' => 1,
  'two' => [
    'one' => 1,
    'seven' => 22,
    'three' => 32,
  ],
  'three' => [
    'one' => 1,
    'two' => 2,
  ],
  'four' => 5,
  'five' => [
    'three' => 32,
    'foure' => 5,
    'five' => 12,
  ],
];

echo "8. получить все вторые элементы вложенных массивов: ";
foreach ($firstArr as $array) {
  if (is_array($array)) {

    echo "<br>";
    foreach (array_slice($array, 1, 1) as $key => $val) {
      echo $val;
    }
  }
};
echo "<br>";
echo "<br>";

echo "9. получить общее количество элементов в массиве: ";
foreach ($firstArr as $firstLevel) {
  if (!is_array($firstLevel)) {
    $top[] = $firstLevel;
  } else {
    foreach ($firstLevel as $secondLevel) {
      $inner[] = $secondLevel;
    }
  }
};
$result = array_merge($top, $inner);
echo count($result);
echo "<br>";

echo "10. получить сумму всех значений в массиве: ";
$result = array_sum($result);
print_r($result);
echo "<br>";
