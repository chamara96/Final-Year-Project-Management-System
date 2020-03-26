<form action="" class="ajax-submit" method="POST" data-am-validator>
    <input type="hidden" name="back_url" value="<?= $_GET['back_url']; ?>"/>
    <?= $label->token() ?>
    <img align="center" src="logo1.png" alt="">
    <h1 align="center" style="color: #fff">Final Year Project Team <br>2020</h1>
    <!--<h1 align="center" style="color: #fff">2020</h1>-->
    <p style="color:white;" align="center">Faculty of Engineering University of Ruhuna</p>
    <div class="am-input-group am-margin-bottom">
        <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
        <input name="account" class="am-form-field" type="text" placeholder="Username" autofocus required>
    </div>

    <div class="am-input-group am-margin-bottom">
        <span class="am-input-group-label"><i class="am-icon-lock am-icon-fw"></i></span>
        <input name="passwd" class="am-form-field" type="password" placeholder="Password" required>
    </div>

    <button class="am-btn am-radius am-btn-primary am-btn-block am-margin-bottom">log in</button>

<!--    <button class="am-btn am-radius am-btn-primary am-btn-block">提交</button>-->
    <a href="<?= $label->url('Team-Login-findPassword'); ?>" class="am-text-sm">forget password?</a>
</form>