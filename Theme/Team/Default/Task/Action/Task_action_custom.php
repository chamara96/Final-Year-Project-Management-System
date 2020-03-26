<!--任务审核人和指派人开始-->
<div class="am-g am-g-collapse">
    <div class="am-u-sm-6">
        <div class="am-form-group">
            <label class="am-block">Task reviewer</label>

            <input type="hidden" name="checkuser" value="<?= empty($actionUser['1']) ? $this->session()->get('team')['user_id'] : implode(',', $actionUser['1']); ?>"/>

            <div class="am-block am-margin-bottom-xs check-user">
                <?php if (ACTION == 'view'): ?>
                    <?php foreach ($userAccessList as $value): ?>
                        <?php if ($value['task_user_type'] == 1): ?>
                            <a href="javascript:;" <?= $value['user_id'] == $this->session()->get('team')['user_id'] ? 'type="no"' : '' ?> data="<?= $value['user_id']; ?>" class="remove-check-user"><i class="am-icon-user"></i><span> <?= $value['user_name']; ?></span></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <a href="javascript:;" type="no" data="<?= $this->session()->get('team')['user_id']; ?>" class="remove-check-user"><i class="am-icon-user"></i><span> <?= $this->session()->get('team')['user_name']; ?>(Myself)</span></a>
                <?php endif; ?>

            </div>

            <select class="select-check-user">
                <option selected value="">Add moderator</option>
                <?php foreach ($user['list'] as $key => $value): ?>
                    <option value="<?= $key; ?>" <?= $key == $this->session()->get('team')['user_id'] ? 'disabled="disabled"' : '' ?>><?= $value; ?></option>
                <?php endforeach; ?>
            </select>

            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                <i class="am-icon-lightbulb-o"></i> If there is a cross-department member in the assigned member, when the task is reassigned, the person in charge will automatically be set as the reviewer.
            </div>

        </div>
    </div>

    <div class="am-u-sm-6">
        <div class="am-form-group">
            <label class="am-block">Assigned members</label>

            <input type="hidden" name="actionuser" value="<?= empty($actionUser['2']) ? '' : implode(',', $actionUser['2']); ?>"/>
            <input type="hidden" name="actiondepartment" value="<?= empty($actionUser['3']) ? '' : implode(',', $actionUser['3']); ?>"/>

            <div class="am-block am-margin-bottom-xs action-user" data="">
                &nbsp;
                <?php if (ACTION == 'view'): ?>
                    <?php foreach ($userAccessList as $value): ?>
                        <?php if ($value['task_user_type'] == '2'): ?>
                            <a href="javascript:;" data="<?= $value['user_id']; ?>" class="remove-action-user"><i class="am-icon-user"></i><span> <?= $value['user_name']; ?></span></a>
                        <?php elseif ($value['task_user_type'] == '3'): ?>
                            <a href="javascript:;" data="<?= $value['user_id']; ?>" class="remove-action-department"><i class="am-icon-legal"></i><span> <?= $value['department_name']; ?></span></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <select class="department">
                        <option selected value="">Select department</option>
                        <?php foreach ($department as $value): ?>
                            <option value="<?= $value['department_id']; ?>" data="<?= $value['department_id'] == $this->session()->get('team')['user_department_id'] ? '1' : '' ?>"><?= $value['department_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="am-u-sm-6 am-hide">
                    <select class="department-user">
                        <option selected value="">Select user</option>
                        <?php foreach ($user['department'] as $key => $value): ?>
                            <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>

                <i class="am-icon-lightbulb-o"></i> Assigned across departments. The default is assigned to the department head.
            </div>
        </div>
    </div>
</div>
<!--任务审核人和指派人结束-->

<!--任务计划时间-->
<div class="am-g am-g-collapse">
    <div class="am-u-sm-6">
        <div class="am-form-group">
            <label class="am-block">Plan start time<i class="am-text-danger">*</i></label>
            <input name="start_time" type="text" class="datetimepicker am-text-left" value="<?= empty($task_start_time) ? '' : date('Y-m-d H:i', $task_start_time); ?>" readonly required/>
        </div>
    </div>

    <div class="am-u-sm-6">
        <div class="am-form-group">
            <label class="am-block">Planned completion time<i class="am-text-danger">*</i></label>
            <input name="end_time" type="text" class="datetimepicker am-text-left" value="<?= empty($task_end_time) ? '' : date('Y-m-d H:i', $task_end_time); ?>" readonly required/>
        </div>
    </div>
</div>
<!--任务计划时间-->

<?php if (ACTION == 'action'): ?>
    <!--任务条目-->
    <div class="am-g am-g-collapse">
        <div class="am-u-sm-12 am-u-sm-centered">
            <div class="am-form-group">
                <label class="am-block">Task entry</label>
                <textarea name="tasklist" rows="5"></textarea>

                <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                    <i class="am-icon-lightbulb-o"></i> Fill in one entry per line. Breaking down task entries helps to complete and track tasks. When assigning to multiple people, it is best to fill in the task entries to control the progress of the task.
                </div>
            </div>
        </div>
    </div>
    <!--任务条目-->
<?php endif; ?>

<script src="<?= DOCUMENT_ROOT; ?>/Theme/assets/js/team.js?v.2.1.0"></script>
