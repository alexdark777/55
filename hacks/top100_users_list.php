<?
$order = $_GET['order'];
$desc = $_GET['desc'];

// показать всеx пользователей постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$users_total = $users->top_users_total();
$page_vars = $users->make_page($users_total, $users_page, $p);
$top_users_list = $users->top_users_list($page_vars[0], $users_page, $order, $desc);

$smarty->assign('order', $order);
$smarty->assign('desc', $desc);
$smarty->assign('users', $top_users_list);
$smarty->assign('users_total', $users_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($top_users_list));
?>