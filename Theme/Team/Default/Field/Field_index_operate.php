<?php

$editUrl = $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["{$fieldPrefix}id"], 'model_id' => $_GET['model_id'], 'back_url' => base64_encode($_SERVER['REQUEST_URI'])));

$deleteUrl = $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["{$fieldPrefix}id"], 'method' => 'DELETE', 'back_url' => base64_encode($_SERVER['REQUEST_URI'])));

?>
<div class="am-btn-toolbar">
    <div class="am-btn-group am-btn-group-xs">
        <a class="am-text-secondary" href="<?= $editUrl ?>"><span class="am-icon-pencil-square-o"></span> edit</a>
        <i class="am-margin-left-xs am-margin-right-xs">|</i>
        <a class="am-text-danger ajax-click ajax-dialog"  msg="confirm to delete? Will not recover!"
           href="<?= $deleteUrl; ?>" ><span class="am-icon-trash-o"></span> delete</a>
    </div>
</div>