<form action="<?= DOCUMENT_ROOT ?>/?m=Index&a=doinstall" class="am-form am-form-horizontal" method="POST"
      data-am-validator>
    <input type="hidden" name="method" value="GET"/>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">domain name:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="domain" placeholder="domain name" required>
                    <div class="am-alert am-alert-secondary" data-am-alert>
                        The domain name is mainly used to send email notifications, so that users can jump to the task system when viewing emails
                    </div>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Administrator account:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="account" placeholder="Administrator account" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Admin password:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="passwd" placeholder="Admin password" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Admin mailbox:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="mail" placeholder="Admin mailbox" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Admin name:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="name"  placeholder="Admin name" required>
                </div>
            </div>

            <div class="am-margin-top am-fl">
                <a href="<?=DOCUMENT_ROOT?>/?m=Index&a=config" class="am-btn am-btn-default">Previous</a> 
            </div>

            <div class="am-margin-top am-fr">
                <button type="submit" id="next" class="am-btn am-btn-default">Next step</button> 
            </div>
    <div class="am-cf"></div>
        </form>
