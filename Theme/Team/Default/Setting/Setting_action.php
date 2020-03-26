<div class="am-padding-xs am-padding-top-0">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
            <div class="am-cf">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg"><?= $title; ?></strong>
                </div>
            </div>
            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

            <form class="am-form am-form-horizontal ajax-submit" action="<?= $url; ?>" method="post" data-am-validator>
                <?= $label->token(); ?>
                <input type="hidden" name="method" value="PUT"/>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">current version</label>
                            <a class="am-btn am-radius am-btn-sm am-btn-warning"
                               href="<?= $label->url('Team-Setting-upgrade', ['back_url' => base64_encode($_SERVER['REQUEST_URI'])]) ?>"><i
                                        class="am-icon-refresh"></i> <?= $version['value'] ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Program domain name</label>
                            <input type="text" name="domain" value="<?= $domain['value'] ?>"/>

                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> The domain name is mainly used to send email notifications, so that users can jump to the task system when viewing emails
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Upload picture format</label>
                            <textarea name="upload_img"><?= implode(',', $upload_img) ?></textarea>

                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> Fill in the picture format you want to support, separated by commas.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Upload file format</label>
                            <textarea name="upload_file"><?= implode(',', $upload_file) ?></textarea>

                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> Fill in the file formats you want to support, separated by commas.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">email address</label>
                            <input name="mail[account]" placeholder="" type="text" value="<?= $mail['account']; ?>"
                                   required="">
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">email Password</label>
                            <input name="mail[passwd]" placeholder="" type="password" value="<?= $mail['passwd']; ?>"
                                   required="">
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">SMTP address</label>
                            <input name="mail[address]" placeholder="" type="text" value="<?= $mail['address']; ?>"
                                   required="">
                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> There is no need to add the http:// or https:// prefix. Common mail service smtp addresses:<a
                                        href="https://www.pescms.com/d/v/1.0/10/56.html#%E5%B8%B8%E8%A7%81%E9%82%AE%E4%BB%B6%E6%9C%8D%E5%8A%A1%E5%95%86%E5%9C%B0%E5%9D%80"
                                        target="_blank" style="color: blue">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">SMTP port</label>
                            <input name="mail[port]" placeholder="" type="text" value="<?= $mail['port']; ?>"
                                   required="">
                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i>Under normal circumstances, enter 25 for non-encrypted ports, and for encrypted ports.<b
                                        class="am-text-danger">587</b>. Please consult your mail provider for specific ports.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Mailing name<i class="am-text-danger">*</i></label>
                            <input name="mail[formname]" placeholder="" type="text"
                                   value="<?= empty($mail['formname']) ? 'system' : $mail['formname']; ?>" required="">
                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> The sender name that the user sees when checking the mail. The default is system.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Email sending test</label>
                            <input type="email" class="test_email am-inline" style="width: 20%">
                            <a href="javascript:;" data="<?= $label->url(GROUP . '-Setting-emailTest') ?>" type="submit"
                               class="am-inline am-btn am-radius am-btn-warning email-test">Send a test email</a>
                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> Please save the email smtp settings before testing the email.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <div class="am-form-group">
                            <label class="am-block">Mail delivery method</label>
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="notice_way"
                                       required="" <?= $notice_way['value'] == '1' ? 'checked="checked"' : '' ?>> Passive trigger
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="2" name="notice_way"
                                       required="" <?= $notice_way['value'] == '2' ? 'checked="checked"' : '' ?>> Timer trigger
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="3" name="notice_way"
                                       required="" <?= $notice_way['value'] == '3' ? 'checked="checked"' : '' ?>> Both
                            </label>

                            <div class="am-alert am-alert-secondary am-text-xs " data-am-alert>
                                <i class="am-icon-lightbulb-o"></i> Detailed reference:
                                <a href="http://www.pescms.com/d/v/10/56" target="_blank" style="color: #0e90d2">click me</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-g am-g-collapse am-margin-bottom">
                    <div class="am-u-sm-12 am-u-sm-centered">
                        <button type="submit" class="am-btn am-radius am-btn-primary am-btn-xs">Submit to save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= DOCUMENT_ROOT; ?>/Theme/assets/js/spectrum.js?v.2.1.0"></script>
<link rel="stylesheet" href="<?= DOCUMENT_ROOT; ?>/Theme/assets/css/spectrum.css?v.2.1.0"/>
<script>
    $(".custom").spectrum({
        preferredFormat: "hex",
        showInput: true
    });
    $(function () {
        $('.email-test').on('click', function () {
            var email = $('.test_email').val();
            var url = $(this).attr('data')
            if (email == '') {
                return false;
            }
            window.open(url + '&email=' + email);
            return false;
        })
    })
</script>
