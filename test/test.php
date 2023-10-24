<? 
function removeKeyRecursive(&$array, $keyToRemove) {
    if (isset($array[$keyToRemove])) {
        unset($array[$keyToRemove]);
    }

    foreach ($array as $key => &$value) {
        if (is_array($value)) {
            removeKeyRecursive($value, $keyToRemove);
        }
    }
}



// Загрузите содержимое вашего JSON-файла
$jsonString = file_get_contents('../test/test.json');

if ($jsonString === false) {
    die("Ошибка при чтении файла");
}

$data = json_decode($jsonString, true);

// Проверьте на ошибки при декодировании
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Ошибка декодирования JSON: " . json_last_error_msg());
}

echo "Данные до удаления ключа:\n";
echo "<pre>";
print_r($data);
echo "</pre>";
// Удалите ключ 'ID'
removeKeyRecursive($data, 'ID');
removeKeyRecursive($data, 'parent');

echo "\n\nДанные после удаления ключа:\n";
echo "<pre>";
print_r($data);
echo "</pre>";
// Запишите измененный массив обратно в JSON-файл
$result = file_put_contents('../test/test2.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

if ($result === false) {
    die("Ошибка при записи в файл");
}