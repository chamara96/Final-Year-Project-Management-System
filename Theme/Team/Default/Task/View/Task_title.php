<?php /*任务标题*/ ?>
<div class="task-list am-padding-xs">
    <!--任务标题-->
    <div>
        <h2 class="am-margin-top-sm am-margin-bottom-sm task-edit-display"><?= $task_title ?></h2>
    </div>
    <!--任务标题-->

    <!--任务指派信息-->
    <div>
        <span>#<?= $task_id ?></span>
        <!--任务优先度-->
        <span class="am-badge am-radius" style="background-color: <?= $taskPriority[$task_priority]['priority_color'] ?>"><?= $taskPriority[$task_priority]['priority_name'] ?></span>
        <!--任务优先度-->

        <!--任务所属项目-->
        [<a href="<?= $label->url('Team-Task-project', ['id' => $task_project_id]); ?>"
            class="am-link-muted "><i><?= $label->findContent('project', 'project_id', $task_project_id)['project_title']; ?></i></a>]
        <!--任务所属项目-->

        <a href="<?= $label->url('Team-User-view', ['id' => $task_create_id]); ?>">

            <img src="<?= $label->getImg($label->findContent('user', 'user_id', $task_create_id)['user_head'], ['50', '50']); ?>"
                 class="am-comment-avatar" style="width: 20px;height: 20px;"/>
            <?= $label->findContent('user', 'user_id', $task_create_id)['user_name']; ?>
        </a>
        Assigned to
        <?php foreach ($userAccessList as $value): ?>
                <?php if ($value['task_user_type'] == '2'): ?>
                    <a href="<?= $label->url('Team-User-view', ['id' => $value['user_id']]); ?>">
                        <img src="<?= $label->getImg($value['user_head'], ['50', '50']); ?>"
                             class="am-comment-avatar" style="width: 20px;height: 20px;"/>
                        <?= $value['user_name']; ?></a>
                <?php elseif ($value['task_user_type'] == '3'): ?>
                        <i class="am-icon-legal"></i>
                        <?= $value['department_name']; ?></a>
                <?php endif; ?>
                <?= $value != end($userAccessList) && !in_array($value['task_user_type'], ['1']) ? '、': '' ?>
        <?php endforeach; ?>
        in <?= date('Y/m/d H:i', $task_submit_time) ?>release

        <?php if ($actionAuth['check'] === true && $task_status < 3): ?>
            <a href="javascript:;" class="task-append-button" data="task-edit"><i class="am-icon-edit">edit</i></a>

            <?php include 'Task_update.php' ?>

        <?php endif; ?>
    </div>
    <!--任务指派信息-->

</div>
