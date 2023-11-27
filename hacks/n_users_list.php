<?
// показать всеx пользователей постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$n_users_total = $users->n_users_total();
$page_vars = $users->make_page($n_users_total, $users_page, $p);
$n_users_list = $users->n_users_list($page_vars[0], $users_page);

$smarty->assign('n_users', $n_users_list);
$smarty->assign('n_users_total', $n_users_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($n_users_list));
?>