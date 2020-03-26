<?php /*任务动态*/ ?>
<div class="am-margin-bottom">
    <h4 class="task-active-subtitle am-inline-block">Task dynamics</h4>
    <hr class="am-margin-0 task-hr"/>
    <?php if (empty($dynamice)): ?>
        <p>The task executor (s) are lazy and have not published any news even today.</p>
    <?php else: ?>
        <?php foreach ($dynamice as $dynamiceDescription): ?>
            <div class="am-margin-top am-margin-bottom">
                <div class="am-fl am-margin-right">
                    <img src="<?= $label->getImg($label->findContent('user', 'user_id', $dynamiceDescription['task_dynamic_user_id'])['user_head'], ['50', '50']); ?>" class="am-comment-avatar" style="width: 48px;height: 48px;"/>
                </div>
                <div class="am-nbfc am-margin-bottom">
                    <div class="dynamic-tool">
                        <?= $label->findContent('user', 'user_id', $dynamiceDescription['task_dynamic_user_id'])['user_name']; ?>
                        <i class="am-icon-calendar"></i> <?= date('Y/m/d H:i', $dynamiceDescription['task_dynamic_createtime']) ?>
                    </div>
                    <article class="am-article am-margin-top-sm">
                        <?= htmlspecialchars_decode($dynamiceDescription['task_dynamic_content']) ?>
                    </article>
                </div>
                <hr class="am-margin-0 am-divider am-divider-dashed am-cf">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($actionAuth['action'] == true && ($task_status == 1)): ?>
        <form action="<?= $label->url('Team-Task_dynamic-action'); ?>" method="POST" class="am-margin-top-sm">
            <?= $label->token(); ?>
            <input type="hidden" name="task_id" value="<?= $task_id; ?>"/>
            <input type="hidden" name="back_url" value="<?= base64_encode($_SERVER['REQUEST_URI']); ?>">

            <div class="am-form-group am-hide task-taskdynamic">
                <label class="am-block">Post activity</label>
                <script type="text/plain" id="dynamic" style="height:250px;"></script>
                <div class="am-alert am-alert-secondary am-text-xs " data-am-alert="">
                    <i class="am-icon-lightbulb-o"></i> Your dynamic content will become the task log of the day.
                </div>
            </div>
            <button type="submit" class="am-btn am-radius am-btn-warning am-btn-xs task-append-button" data="task-taskdynamic">
                <i class="am-icon-hand-pointer-o"></i> Add activity
            </button>
        </form>
    <?php endif; ?>
</div>
