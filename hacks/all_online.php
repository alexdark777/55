<?
$ip = $users->GetRealIp();
$period = 3;
$count_ip_query = mysql_query("SELECT (INTERVAL $period MINUTE + dates) as dates, id, ip  FROM countsip");
if(mysql_num_rows($count_ip_query)===0){
$truncate_counts_query = mysql_query("TRUNCATE TABLE `countsip`; OPTIMIZE TABLE `countsip`");
}
$count_date_array = Array();
$countsip = 0;
while($row = mysql_fetch_assoc($count_ip_query)) {
$id_k = $row[id];
$ip_k = $row[ip];
$date_k = $row[dates];
$count_date_array[$countsip] = Array('id' => $row[id],
                            'ip' => $row[ip],
						    'dates' => $row[dates]
							);
$countsip++;	
$newdate = date('Y-m-d H:i:s');
if($newdate <= $date_k){

}else{
$unlink_count_query = mysql_query("DELETE FROM countsip WHERE id='$id_k'");
}											
}
$smarty->assign('countsip', $countsip);
$count_myip_query = mysql_query("SELECT id  FROM countsip WHERE ip='$ip'");
if(mysql_num_rows($count_myip_query)===0){
$insert_count_ip_query = mysql_query("INSERT INTO countsip (id, ip, dates) VALUE ('', '$ip', NOW())");
}
// END количество человек на сайте
?>