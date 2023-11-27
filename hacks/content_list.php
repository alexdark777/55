<?
// получаем ид новости если он есть
$content_id = $_GET['content_id'];
$smarty->assign('content_id', $content_id);

// показать все мероприятия постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$content_total = $contents->content_total($content_id);
$content_page = 10;
$page_vars = $users->make_page($content_total, $content_page, $p);
$content_list = $contents->content_list($page_vars[0], $content_page, $content_id);

if($content_id!=false){
$title = $users->check_info('content_title', 'content', 'content_id', $content_id);
$description = $users->check_info('content_text', 'content', 'content_id', $content_id);
}

$smarty->assign('contents', $content_list);
$smarty->assign('content_total', $content_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($content_list));
?>