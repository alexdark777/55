<?
// показать всеx пользователей постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$users_total = $users->users_total();
$page_vars = $users->make_page($users_total, $users_page, $p);
$users_list = $users->users_list($page_vars[0], $users_page);

$smarty->assign('users', $users_list);
$smarty->assign('users_total', $users_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($users_list));
?>