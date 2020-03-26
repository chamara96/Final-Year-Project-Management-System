<?php /*任务条目*/ ?>
<div class="am-margin-bottom">
    <h4 class="task-active-subtitle am-inline-block">Task entry</h4>
    <hr class="am-margin-0 task-hr"/>
    <?php if (empty($taskList)): ?>
        <div class="am-alert am-alert-secondary am-text-xs" data-am-alert>
            <i class="am-icon-warning"></i> Add entries to streamline the task process and help improve execution efficiency.
        </div>
    <?php else: ?>
        <div class="am-margin-bottom-sm">
            <?php foreach ($taskList as $value): ?>
                <div class="am-text-default task-entry am-margin-top-xs">
                    <label class="am-checkbox-inline am-padding-left-0">

                        <!--只有任务执行者才可以操作勾选动作-->
                        <?php if ($actionAuth['action'] == true && $task_status < 3): ?>
                            <input type="checkbox" class="am-margin-left-0 ajax-click ajax-href"
                                   href="<?= $label->url('Team-Task-taskListAction', ['task_id' => $task_id, 'listid' => $value['task_list_id'], 'method' => 'PUT']) ?>"
                                   value="" <?= !empty($value['task_user_id']) ? 'checked="checked" disabled="disabled"' : '' ?>>
                        <?php endif; ?>
                        <!--只有任务执行者才可以操作勾选动作-->

                        <?php if (!empty($value['task_user_id'])): ?>
                            <s>
                                <img
                                    src="<?= $label->findContent('user', 'user_id', $value['task_user_id'])['user_head']; ?>"
                                    class="am-comment-avatar" style="width: 20px;height: 20px;"/>
                                <?= $label->findContent('user', 'user_id', $value['task_user_id'])['user_name']; ?>
                            </s>
                        <?php endif; ?>
                        <?= $label->xss(htmlspecialchars_decode(!empty($value['task_user_id']) ? "<s>{$value['task_list_content']}</s>" : $value['task_list_content'])) ?>
                        <s><?= !empty($value['task_user_id']) ? date('m-d H:i', $value['task_list_time']) : '' ?></s>
                    </label>
                    <?php if (($actionAuth['check'] == true || $actionAuth['action'] == true) && $task_status < 3): ?>
                        <a href="<?= $label->url('Team-Task_list-action', ['id' => $value['task_list_id'], 'task_id' => $task_id, 'method' => 'DELETE']); ?>"
                           class="ajax-click ajax-dialog" msg="confirm to delete? Will not recover!"><i
                                class="am-icon-remove"></i></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ( ($actionAuth['check'] == true || $actionAuth['action'] == true) && $task_status < 3 ): ?>
        <form action="<?= $label->url('Team-Task-taskListAction'); ?>" class="" method="POST">
            <?= $label->token(); ?>
            <input type="hidden" name="task_id" value="<?= $task_id ?>"/>
            <input type="hidden" name="back_url" value="<?= base64_encode($_SERVER['REQUEST_URI']); ?>">

            <div class="am-form-group am-margin-top-sm am-hide task-taskListAction">
                <label class="am-block">Append entry</label>
                <textarea class="am-form-field" name="tasklist" rows="5"></textarea>

                <div class="am-alert am-alert-secondary am-text-xs " data-am-alert="">
                    <i class="am-icon-lightbulb-o"></i> Fill in one entry per line. Breaking down task entries helps to complete and track tasks. When assigning to multiple people, it is best to fill in the task entries to control the progress of the task.
                </div>
            </div>
            <button type="submit" class="am-btn am-radius am-btn-success am-btn-xs task-append-button" data="task-taskListAction">
                <i class="am-icon-plus"></i> additional
            </button>
        </form>
    <?php endif; ?>
</div>
