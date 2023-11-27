<?
// получаем ид новости если он есть
$news_id = $_GET['news_id'];
$smarty->assign('news_id', $news_id);

// показать все мероприятия постранично
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
$news_total = $news->news_total($news_id);
$news_page = 10;
$page_vars = $users->make_page($news_total, $news_page, $p);
$news_list = $news->news_list($page_vars[0], $news_page, $news_id);

if($news_id!=false){
$title = $users->check_info('news_title', 'news', 'news_id', $news_id);
$description = $users->check_info('news_text', 'news', 'news_id', $news_id);
}

$smarty->assign('news', $news_list);
$smarty->assign('news_total', $news_total);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('start', $page_vars[0]+1);
$smarty->assign('end', $page_vars[0]+count($news_list));
?>