<div class="am-padding-xs am-padding-top-0">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">

            <div class="am-cf">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">Update execution results</strong>
                </div>
            </div>
            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

            <div class="am-alert am-alert-secondary" data-am-alert>
                <?php if(!empty($info)): ?>
                    <?php foreach ($info as $value): ?>
                        <p><?= $value ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>update completed</p>
                    <p>Note: The update program does not set the display menus and permissions of the user group. Please go to the user group list to update the missing menus and permissions.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>