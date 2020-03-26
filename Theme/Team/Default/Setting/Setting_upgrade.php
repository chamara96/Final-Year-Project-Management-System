<div class="am-padding-xs am-padding-top-0">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">

    <div class="am-cf">
        <div class="am-fl am-cf">
            <?php if (!empty($_GET['back_url'])): ?>
                <a href="<?= base64_decode($_GET['back_url']) ?>" class="am-margin-right-xs am-text-danger"><i lass="am-icon-reply"></i>return</a>
            <?php endif; ?>
            <strong class="am-text-primary am-text-lg"><?= $title; ?></strong>
        </div>
    </div>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

    <div class="am-alert am-alert-secondary" id="patch" data-am-alert>
        Communicating with PESCMS official website, getting updates ...
    </div>
    <article class="am-article am-hide"></article>

            <hr/>
            <a href="<?= $label->url(GROUP . '-Setting-atUpgrade', ['method' => 'PUT']) ?>" class="am-btn am-radius am-btn-success am-btn-xs">Perform automatic updates</a>
            <hr/>
            <div class="am-alert am-alert-secondary"  data-am-alert>
                When the automatic update fails multiple times, you can try to download the patch locally and perform a manual upgrade.
            </div>
            <form action="<?= $label->url(GROUP . '-Setting-mtUpgrade') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="method" value="PUT">

                <div class="am-form-group am-form-file">
                    <button type="button" class="am-btn am-radius am-btn-danger am-btn-xs">
                        <i class="am-icon-cloud-upload"></i> Import zip upgrade package
                    </button>
                    <input id="doc-form-file" type="file" name="zip" multiple>
                </div>
                <div id="file-list"></div>
                <script>
                    $(function () {
                        $('#doc-form-file').on('change', function () {
                            var fileNames = '';
                            $.each(this.files, function () {
                                fileNames += '<span class="am-badge">' + this.name + '</span> ';
                            });
                            $('#file-list').html(fileNames);
                        });
                    });
                </script>
                <button type="submit" id="btn-submit" class="am-btn am-radius am-btn-default am-btn-xs">
                    Install updates manually
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){

        $.getJSON(PESCMS_URL+'/patch/2/<?= $system['version'] ?>', function(data){
            if(data.status == 200){
                var update_patch_file = data.data.update_patch_file ? ' <a class="am-btn am-radius am-btn-primary am-radius am-btn-xs" href="' + PESCMS_URL + data.data.update_patch_file + '" >下载更新</a>' : '';
                $('#patch').html('New version released: '+data.data.new_version + update_patch_file);
                $('.am-article').html('<h3>update content:</h3>'+data.data.update_content).removeClass('am-hide')
            }else{
                $('#patch').html(data.msg)
            }
        }).fail(function(){
            $('#patch').html('Can not get link with PESCMS official website, please check if your network is normal.');
        })
    })
</script>