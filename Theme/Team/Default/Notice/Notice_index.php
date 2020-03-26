<div class="admin-content am-padding-xs am-padding-top-0">
    <ul class="am-list am-list-border">
        <?php if (empty($list)): ?>
            <li class="am-padding am-nbfc">
                <div class="am-text-sm am-alert am-alert-secondary tm-at-tips-a-color am-margin-bottom-0">
                    <p>No new news for now</p>
                </div>
            </li>
        <?php else: ?>
            <?php foreach ($list as $key => $value): ?>
                <li class="am-padding am-nbfc">
                    <div class="am-text-sm">
                        <?= $value['notice_title'] ?>
                        <time datetime="2016-01-17 17:15" title="2016-01-17 17:15"> <?= $label->timing($value['notice_time']) ?></time>
                        <a href="<?= $label->url('Team-Notice-action', ['id' => $value['notice_id'], 'method' => 'DELETE']) ?>" class="ajax-click ajax-dialog" msg="Are you sure you want to delete this message?"><i class="am-icon-trash"></i></a>
                    </div>
                    <div class="am-text-sm am-alert am-alert-secondary tm-at-tips-a-color am-margin-bottom-0">
                        <?= htmlspecialchars_decode($value['notice_content']) ?>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>

        <li>
            <ul class="am-pagination am-pagination-right am-margin-right-sm am-text-xs">
                <?= $page ?>
            </ul>
        </li>
    </ul>
</div>