
		<?php 

$token ="123456789:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"; //токен выданный botfather'ом

//получение значения стоимости из стима
function QuerySource($gameID){
$query = file_get_contents('https://store.steampowered.com/api/appdetails?appids=' . $gameID); //получаем ответ в json
$arr = json_decode($query, true); //раскладываем json в массив (false - в объект)
$cost = "Текст на странице:" . $arr[$gameID]["data"]["package_groups"]["0"]["subs"]["0"]["option_text"]; //формируем ответ
return $cost;
}

$cost = urlencode(QuerySource('240')); //передаем аргументом id товара и получаем значение стоимости в переменную cost
$sendMessage = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=84425617&text=" . $cost; //формируем url отправки сообщения в чат
file_get_contents($sendMessage); //открываем url отправкм

?>

