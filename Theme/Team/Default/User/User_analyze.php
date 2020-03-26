<?php include THEME_PATH . "/Content/Content_index_header.php"; ?>

<div class="am-g am-margin-top-sm am-margin-bottom-xs am-g-collapse">
    <div class="am-u-sm-12 am-u-md-12">
        <form class="am-form-inline">
            <input type="hidden" name="g" value="<?= GROUP; ?>"/>
            <input type="hidden" name="m" value="<?= MODULE ?>"/>
            <input type="hidden" name="a" value="<?= ACTION ?>"/>
            <div class="am-form-group">
                <input type="text" name="begin" value="<?= $label->xss($_GET['begin']) ?>" class="am-form-field" placeholder="start date" data-am-datepicker readonly>
            </div>

            <div class="am-form-group">
                <input type="text" name="end" value="<?= $label->xss($_GET['end']) ?>" class="am-form-field" placeholder="End date" data-am-datepicker readonly>
            </div>
            <button type="submit" class="am-btn am-btn-warning am-radius">analysis</button>
        </form>
    </div>
</div>
<hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>
<?php if (!empty($list)): ?>
    <table class="am-table am-table-bordered am-table-striped am-table-hover am-text-sm am-table-centered">
        <tr>
            <th>name</th>
            <?php foreach ($statusMark as $key => $value): ?>
                <th><?= $value['task_status_name'] ?> task</th>
            <?php endforeach; ?>
            <th>Total tasks</th>
            <th>Completion rate</th>
        </tr>
        <?php foreach ($list as $key => $item): ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <?php foreach ($statusMark as $status): ?>
                    <td><?= empty($item['task_status'][$status['task_status_type']]) ? 0 : $item['task_status'][$status['task_status_type']] ?></td>
                <?php endforeach; ?>
                <td><?= empty($item['total']) ? 0 : $item['total'] ?></td>
                <td><?= $item['total'] == 0 ? 0 : round(($item['task_status'][2]+$item['task_status'][3])/$item['total'] * 100 , 2) ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="am-text-xs">
        <p>1. The completion rate calculation method is not necessarily accurate, because the submission of the review by the performer does not indicate the end of the task. The reviewer does not perform a review operation on the task, which will affect the task completion rate. Therefore, the completion rate is calculated as:<strong class="am-text-danger">Completion rate = (review + completion) / total tasks</strong></p>
        <p>2. The default analysis is one month. Since there are multiple task reference times in the FY Project Team system, this analysis function uniformly uses the task release time as the basis for screening.</p>
    </div>
<?php else: ?>
    <p>No data analysis is available in the current time period.</p>
<?php endif; ?>

<?php include THEME_PATH . "/Content/Content_index_footer.php"; ?>
