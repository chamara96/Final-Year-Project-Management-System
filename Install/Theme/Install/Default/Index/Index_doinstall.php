<div class="action am-padding am-margin-bottom am-text-xs"
     style="height: 200px; overflow-y: auto;border: 1px solid #DDDDDD">

        </div>
        <div class="am-g doc-am-g">
            <div class="am-u-sm-2">Installation progress:</div>
            <div class="am-u-sm-10">
                <div class="am-progress am-progress-striped am-active ">
                    <div class="am-progress-bar am-progress-bar-secondary"  style="width: 0%">0%</div>
                </div>
            </div>
        </div>
        <div class="am-center" style="width: 100px;">
    <a href="<?= str_replace("/Install", "", DOCUMENT_ROOT) ?>/" id="next"
       class="am-btn am-btn-success am-hide">View system</a>
</div>
<script>
    $(function () {
        var obj = eval('(<?= $table ?>)');
        var timeId;
        var i = 0;
        var process = 0;
        $(".action").prepend("<p class=\"wait-begin\">Waiting for response</p><p>Run the installer...</p>");
        $.ajax({
            url: '<?=DOCUMENT_ROOT?>/?m=Index&a=import&method=GET',
            data: {domain:'<?= $domain ?>', account: '<?= $account ?>', passwd: '<?= $passwd ?>', mail: '<?= $mail ?>', name: '<?= $name ?>'},
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                timeId = setInterval(function () {
                    if (process > 80) {
                        clearTimeout(timeId);
                        return true;
                    }
                    if (process <= '80') {
                        $(".am-progress-bar").css("width", process + "%").html(process + "%");
                    }
                    $(".wait-begin").append(".");
                    process++;
                }, '100');
            },
            success: function (data) {
                clearTimeout(timeId);
                if (data['status'] == '200') {
                    var endtimeId = setInterval(function () {
                        if (i >= obj.length && process > 100) {
                            $(".action").prepend("<p>Installation is complete, please remove the Install directory manually!</p>");
                            $("#next").removeClass("am-hide");
                            clearTimeout(endtimeId);
                            return true;
                        }
                        $(".am-progress-bar").css("width", process + "%").html(process + "%");
                        if (i < obj.length) {
                            $(".action").prepend("<p>" + obj[i] + "...</p>");
                        } else if (i == obj.length) {
                            $(".action").prepend("<p class=\"wait\">Please wait patiently for the installation to end</p>");
                        }
                        $(".wait").append(".");
                        i++;
                        process++;
                    }, '100');
                } else if (data['status'] != '200') {
                    $(".action").prepend("<p>" + data['msg'] + "</p>");
                } else {
                    $(".action").prepend("<p>The installation encountered an unresolvable error!</p>" +
                        "<p>"+data+"</p>" +
                        "<p>Please visit<a href=\"http://www.pescms.com/d/v/10/37\">This link</a>Get the solution</p>" +
                        "<p>Note: Please check if STRICT_TRANS_TABLES exists in the root directory of the program first.txt file</p>" +
                        "<p>Or to<a href=\"http://forum.pescms.com\">Official community</a>Seeking a solution</p>");
                }
            },
            error:function(obj){
                $(".action").prepend("<p>Installation error, unknown reason!</p>" +
                    "<p>"+obj.responseText+"</p>" +
                    "<p>Please visit<a href=\"http://www.pescms.com/d/v/10/37\">This link</a>Get the solution</p>" +
                    "<p>Note: Please check if STRICT_TRANS_TABLES exists in the root directory of the program first.txt file</p>" +
                    "<p>Or to<a href=\"http://forum.pescms.com\">Official community</a>Seeking a solution</p>");
            }
        })
    })
</script>
