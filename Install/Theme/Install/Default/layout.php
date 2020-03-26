<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="/favicon.ico">
        <link rel="stylesheet" href="<?=str_replace("/Install", "", DOCUMENT_ROOT)?>/Theme/assets/css/amazeui.min.css"/>
        <!--[if (gte IE 9)|!(IE)]><!-->
        <script src="<?=str_replace("/Install", "", DOCUMENT_ROOT)?>/Theme/assets/js/jquery.min.js"></script>
        <script src="<?=str_replace("/Install", "", DOCUMENT_ROOT)?>/Theme/assets/js/amazeui.min.js"></script>
        <!--<![endif]-->
        <style>
        html, body {
            -moz-background-size: 100% 100%;
            background-size: cover;
            background: url('<?=str_replace("/Install", "", DOCUMENT_ROOT)?>/Theme/assets/i/lattice.png');
        }
            .header {
                text-align: center;
            }
            .header h1 {
                font-size: 200%;
                color: #333;
                margin-top: 30px;
            }
            .header p {
                font-size: 14px;
            }
        </style>
    </head>
    <body>
<div class="am-g am-padding-top">
    <div class="am-u-lg-8 am-u-md-8 am-u-sm-centered">
        <div class="am-panel am-panel-default">
            <div class="am-panel-bd">
                <div class="pesad"></div>
                <script>
                    $(function(){
                        $.getJSON('https://www.pescms.com/pesad/2', function(data){
                            if(data.status == 200){
                                for(var i = 0; i < data.data.length; i++){
                                    $('.pesad').append(data.data[i]);
                                }
                            }else{
                                $('.pesad').append('<a href="https://www.pescms.com/Page/ad.html" style="color: #fff;"><div class="am-vertical-align" style="background: #61cff9;height: 70px;text-align: center;"><div class="am-vertical-align-middle am-text-xxxl">Advertising</div></div></a>');
                            }
                        })
                    })
                </script>
                <div class="header">
                    <h1 class="am-margin-top-0"><?= $title ?> <small class="am-text-xs">v<?= $version ?></small></h1>
                <?php if (ACTION == 'index'): ?>
                    <p>An open source task management system<br /></p>
                <?php elseif (ACTION == 'config'): ?>
                    <p>Perform a regular check to see if we are suitable.</p>
                <?php elseif (ACTION == 'option'): ?>
                    <p>Almost there, we can meet!</p>
                <?php endif; ?>
            <hr />
        </div>
        <?php include $file; ?>
            </div>
        </div>
    </div>
</div>

    </body>
</html>