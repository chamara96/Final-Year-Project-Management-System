<div class="admin-sidebar-panel am-panel am-panel-default">
    <div class="am-panel-hd"><?= $project_title; ?></div>
    <div class="am-panel-bd">
        <?= empty($project_content) ? 'The current project is not described;' : htmlspecialchars_decode($project_content); ?>
    </div>
</div>