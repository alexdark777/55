<?
// показать комментарии постранично
			if(isset($_POST['c'])) { $c = $_POST['c']; } elseif(isset($_GET['c'])) { $c = $_GET['c']; } else { $c = 1; }
			$com_total = $users->com_total('users_coms', 'com_user_id', $id);
			$page_vars_c = $users->make_page($com_total, $com_page, $c);
			$com_list = $users->com_list($page_vars_c[0], $com_page, 'users_coms', 'com_user_id', $id);
			//echo $com_list;
			$smarty->assign('coms', $com_list);
			$smarty->assign('com_total', $com_total);
			$smarty->assign('c', $page_vars_c[1]);
			$smarty->assign('maxpage_c', $page_vars_c[2]);
			$smarty->assign('start_c', $page_vars_c[0]+1);
			$smarty->assign('end_c', $page_vars_c[0]+count($com_list));
?>