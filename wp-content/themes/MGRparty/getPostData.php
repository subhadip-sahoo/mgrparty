<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wp-blog-header.php';
$content_post = get_post($_REQUEST['post_id']);
$content = strip_tags($content_post->post_content);
$post_date = date('j F, Y ', strtotime($content_post->post_date));
//$content = apply_filters('the_content', $content);
//$content = str_replace(']]>', ']]&gt;', $content);
$html = '';
$html .= '<a href="javascript:void(0);" class="modalclose">X</a>';
$html .= '<div>'.$post_date.'</div>';
$html .= '<p>By : '.get_post_meta($_REQUEST['post_id'], 'name', true).'</p>';
$html .= '<p>'.$content.'</p>';
echo json_encode(array('html' => $html));
?>
