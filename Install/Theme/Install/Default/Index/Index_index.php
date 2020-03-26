        <div class="agree am-padding" style="height: 300px; overflow-y: auto;border: 1px solid #DDDDDD">
			<p>Please wait for the protocol to load</p>
        </div>
        <div class="am-margin-top am-fr">
            <a href="<?=DOCUMENT_ROOT?>/?m=Index&a=config" class="am-btn am-btn-default am-disabled">Program protocol loading...</a>
</div>
<div class="am-cf"></div>
<script>
    $(function(){
        var progress = $.AMUI.progress;


        $.ajax({
            url:'https://www.pescms.com/UserProtocol',
            dataType:'JSON',
            beforeSend:function(){
                progress.start();
            },
            success:function(data){
                $(".agree").html(data.data.replace(/\{program\}/g, "FY Project Team"));
                progress.done();
            },
            complete:function(){
                $(".am-btn").removeClass('am-disabled').html('Next step');
            },
            error:function(){
                alert('error,Refresh try');
                progress.done();
            }
        })
        var data = {
            id: 1,
            type: 1,
            version : '<?= $version ?>',
            sessionid : '<?= $this->session()->getId() ?>'
        };
        $.post('https://www.pescms.com/?g=Api&m=Statistics&a=action', data, function (data) {
        }, 'JSON')
    })
</script>