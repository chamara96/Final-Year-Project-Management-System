<?php
/**
 * 本模板为通用编辑按钮，若没有特殊需求，请加载本模板
 */
$echoEditUrl = empty($editUrl) ? $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["{$fieldPrefix}id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))) : $editUrl;
$echoDeleteUrl = empty($deleteUrl) ? $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["{$fieldPrefix}id"], 'method' => 'DELETE', 'back_url' => base64_encode($_SERVER['REQUEST_URI']))) : $deleteUrl;

?>
<a class="am-text-secondary" href="<?= $echoEditUrl ?>"><span class="am-icon-pencil-square-o"></span> edit</a>
<i class="am-margin-left-xs am-margin-right-xs">|</i>
<a class="am-text-danger ajax-click ajax-dialog"  msg="confirm to delete? Will not recover!" href="<?= $echoDeleteUrl; ?>"><span class="am-icon-trash-o"></span> delete</a>