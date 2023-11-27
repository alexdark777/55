<?
// показать все добавленные категории
$levels_list = $users->levels_list();


// ассигнования для шаблонизатора
$smarty->assign('levels', $levels_list);
?>