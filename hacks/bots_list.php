<?
// показать всеx пользователей постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$bots_total = $users->bots_total();
$bots_page = 20;
$page_vars = $users->make_page($bots_total, $bots_page, $p);
$bots_list = $users->bots_list($page_vars[0], $bots_page);

$smarty->assign('bots', $bots_list);
$smarty->assign('bots_total', $bots_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($bots_list));
?>