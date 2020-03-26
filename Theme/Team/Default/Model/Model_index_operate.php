<div class="am-btn-toolbar">
    <div class="am-btn-group am-btn-group-xs">
        <a class="am-text-secondary" href="<?= $label->url(GROUP.'-'.MODULE . '-action', array('id' => $value["model_id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"><span class="am-icon-pencil-square-o"></span> edit</a>
        <i class="am-margin-left-xs am-margin-right-xs">|</i>
        <a class="am-text-warning" href="<?= $label->url(GROUP.'-'.'Field-index', array('model_id' => $value["model_id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"><span class="am-icon-pencil-square-o"></span> Field management</a>
        <i class="am-margin-left-xs am-margin-right-xs">|</i>
        <a class="am-text-success" href="<?= $label->url(GROUP.'-'.'Model-export', array('model_id' => $value["model_id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"><span class="am-icon-cloud-upload"></span> Export model</a>
        <i class="am-margin-left-xs am-margin-right-xs">|</i>
        <a class="am-text-danger ajax-click ajax-dialog"  msg="confirm to delete? Will not recover!" href="<?= $label->url(GROUP.'-'.MODULE . '-action', array('id' => $value["model_id"], 'method' => 'DELETE', 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"><span class="am-icon-trash-o"></span> delete</a>
    </div>
</div>