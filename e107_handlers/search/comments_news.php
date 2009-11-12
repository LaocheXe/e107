<?php
/*
 * e107 website system
 *
 * Copyright (C) 2001-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_handlers/search/comments_news.php,v $
 * $Revision: 1.3 $
 * $Date: 2009-11-12 15:11:14 $
 * $Author: marj_nl_fr $
 */

if (!defined('e107_INIT')) { exit; }

$comments_title = LAN_SEARCH_98;
$comments_type_id = 0;
$comments_return['news'] = "n.news_title";
$comments_table['news'] = "LEFT JOIN #news AS n ON c.comment_type=0 AND n.news_id = c.comment_item_id";
function com_search_0($row) {
	global $con;
	$datestamp = $con -> convert_date($row['comment_datestamp'], "long");
	$res['link'] = "comment.php?comment.news.".$row['comment_item_id'];
	$res['pre_title'] = $row['news_title'] ? LAN_SEARCH_71.": " : "";
	$res['title'] = $row['news_title'] ? $row['news_title'] : LAN_SEARCH_9;
	$res['summary'] = $row['comment_comment'];
	preg_match("/([0-9]+)\.(.*)/", $row['comment_author'], $user);
	$res['detail'] = LAN_SEARCH_7."<a href='user.php?id.".$user[1]."'>".$user[2]."</a>".LAN_SEARCH_8.$datestamp;
	return $res;
}

?>