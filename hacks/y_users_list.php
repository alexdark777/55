<?
// показать всеx пользователей постранично
if(isset($_POST['c'])) { $c = $_POST['c']; } elseif(isset($_GET['c'])) { $c = $_GET['c']; } else { $c = 1; }
$y_users_total = $users->y_users_total();
$page_vars_c = $users->make_page($y_users_total, $users_page, $c);
$y_users_list = $users->y_users_list($page_vars_c[0], $users_page);

$smarty->assign('y_users', $y_users_list);
$smarty->assign('y_users_total', $y_users_total);
$smarty->assign('c', $page_vars_c[1]);
$smarty->assign('maxpage_c', $page_vars_c[2]);
$smarty->assign('start_c', $page_vars_c[0]+1);
$smarty->assign('end_c', $page_vars_c[0]+count($y_users_list));
?>