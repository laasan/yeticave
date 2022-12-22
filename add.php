<?php
require_once 'functions.php';
require_once 'data.php';

function hasError() {
    global $errors;
    return (count($errors));
}

function checkError($field) {
    global $errors;
    return !empty($errors[$field]) ? 'form__item--invalid' : '';
}

$input_temp = [];
$errors = [];

$requiredFields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach ($requiredFields as $field) {
        $value = htmlspecialchars($_POST[$field]);
        $selectTemp[$field] = $value;
        if (empty($value)) {
            $errors[$field] = 'Поле не заполнено';
        } else {
            switch ($field) {
                case 'lot-name':
                    if ($value != $_POST[$field]) {
                        $errors[$field] = 'Некорректное наименование';
                    }
                    break;
                case 'message':
                    if ($value != $_POST[$field]) {
                        $errors[$field] = 'Некорректное описание';
                    }
                    break;
                case 'lot-rate':
                case 'lot-step':
                    if (!filter_var($value, FILTER_VALIDATE_INT)) {
                        $errors[$field] = 'Значение должно быть целым числом';
                    }
                    break;
                case 'lot-date':
                    if(!$lotDate = strtotime($value)){
                        $errors[$field] = 'Неверно указана дата';
                    }
                    break;
                case 'category':
                    if(!in_array($value, $categories)) {
                        $errors[$field] = 'Указан не верный раздел';
                    }
                    break;
            }
        }
    }

    if (isset($_FILES['lot-image'])) {
        $upload = $_FILES['lot-image'];
        $file_name = $upload['name'];
        if ($upload['size'] > 2097152) {
            $errors['lot-image'] = 'Максимальный размер файла: 2Мб';
        } else {
            $fInfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($fInfo, $upload['tmp_name']);

            if (strpos($file_type, 'image') === false) {
                $errors['lot-image'] = 'Может быть выбрано только изображение!';
            } else {
                $file_url = '/upload/user_lots/' . $file_name;
                move_uploaded_file(
                    $upload['tmp_name'],
                    '/upload/user_lots/' . $file_name
                );
                $input_temp['lot-image'] = $file_url;
            }
        }
    }

    if (count($errors)) {
		$page_content = renderTemplate('/templates/add.php',
            ['categories' => $categories,
            'input_temp' => $input_temp,
            'errors' => $errors  
            ]);
	}
	else {
        $new_item = ['Название' => htmlspecialchars($_POST['lot-name']),
                    'URL_img' => !$file_url ? '/img/no_image.png' : $file_url,
                    'Категория' => htmlspecialchars($_POST['category']),
                    'description' => htmlspecialchars($_POST['message']),
                    // 'timer' => getLeftTime(htmlspecialchars($_POST['lot-date'])),
                    'timer' => getLeftTime(null),
                    'Цена' => htmlspecialchars($_POST['lot-rate']),
                    'minPrice' => htmlspecialchars($_POST['lot-step'])
                    ];
		$page_content = renderTemplate('/templates/lot.php',
            ['item' => $new_item,
             'bets' => []]);
	}
} else {
    $input_temp = array_fill_keys($requiredFields, '');
    $input_temp['lot-image'] = '';
}

if (!$page_content) {
    $page_content = renderTemplate('/templates/add.php',
    ['categories' => $categories,
    'input_temp' => $input_temp,
    'errors' => $errors  
    ]);
}


$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $page_content,
     'title' => 'Главная',
     'is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories
    ]);



print($layout_content);