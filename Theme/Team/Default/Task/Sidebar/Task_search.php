<div class="admin-sidebar-panel">
    <form action="" class="am-form" method="GET">
        <input type="hidden" name="g" value="<?= GROUP; ?>"/>
        <input type="hidden" name="m" value="<?= MODULE; ?>"/>
        <input type="hidden" name="a" value="<?= ACTION; ?>"/>
        <input type="hidden" name="status" value="<?= $label->xss($_GET['status']); ?>"/>
        <input type="hidden" name="id" value="<?= $label->xss($_GET['id']); ?>"/>

        <select name="time_type" class="am-margin-bottom-xs">
            <option value="1">Match by task creation time</option>
            <option value="2" <?= (int)$_GET['time_type'] == '2' ? 'selected' : '' ?>>Matching task schedule start time</option>
            <option value="3" <?= (int)$_GET['time_type'] == '3' ? 'selected' : '' ?>>Match by task plan end time</option>
            <option value="4" <?= (int)$_GET['time_type'] == '4' ? 'selected' : '' ?>>Match by task completion time</option>
        </select>

        <input type="text" name="begin" class="am-margin-bottom-xs" placeholder="Match start date" readonly value="<?= $label->xss($_GET['begin']); ?>"/>
        <input type="text" name="end" class="am-margin-bottom-xs" placeholder="Match end date" readonly value="<?= $label->xss($_GET['end']); ?>"/>

        <input type="text" name="k" class="am-margin-bottom-xs" placeholder="Search task content" value="<?= $label->xss($_GET['k']); ?>"/>
        <button class="am-btn am-radius am-btn-primary am-btn-block" type="submit"><span class="am-icon-search">Start matching task</span>
        </button>

    </form>
    <script>
        $(function () {

            var nowTemp = new Date();
            var nowDay = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0).valueOf();
            var nowMoth = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), 1, 0, 0, 0, 0).valueOf();
            var nowYear = new Date(nowTemp.getFullYear(), 0, 1, 0, 0, 0, 0).valueOf();

            var checkin = $('input[name=begin]').datepicker({
                onRender: function (date, viewMode) {
                    // 默认 days 视图，与当前日期比较
                    var viewDate = nowDay;

                    switch (viewMode) {
                        // moths 视图，与当前月份比较
                        case 1:
                            viewDate = nowMoth;
                            break;
                        // years 视图，与当前年份比较
                        case 2:
                            viewDate = nowYear;
                            break;
                    }
                }
            }).on('changeDate.datepicker.amui', function (ev) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 30);
                checkout.setValue(newDate);
                checkin.close();
                $('input[name=end]')[0].focus();
            }).data('amui.datepicker');

            var checkout = $('input[name=end]').datepicker({
                onRender: function (date, viewMode) {
//                    console.dir(checkin.date.valueOf());
                    var inTime = checkin.date;
                    var inDay = inTime.valueOf();

                    return date.valueOf() < inDay ? 'am-disabled' : '';
                }
            }).on('changeDate.datepicker.amui', function (ev) {
                checkout.close();
            }).data('amui.datepicker');
        });
    </script>
</div>
