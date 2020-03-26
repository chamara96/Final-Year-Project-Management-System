<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">PHP version:</label>
    <div class="am-u-sm-10">
        <button type="button" id="version" class="am-btn am-btn-<?= $php_version == true ? 'success' : 'danger' ?>"><?= $pdo == true ? phpversion() : 'Please upgrade PHP version' ?></button>
        <?php if ($php_version == false): ?>
            <a href="http://php.net/downloads.php" class="install_tips" target="_blank"><i class="am-icon-frown-o"></i>PESCMS DOC must be running PHP 5.6 or higher. Please upgrade</a>
        <?php endif; ?>
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">PDO extension:</label>
    <div class="am-u-sm-10">
        <button type="button" id="pdo" class="am-btn am-btn-<?= $pdo == true ? 'success' : 'danger' ?>"><?= $pdo == true ? 'stand by' : 'not support' ?></button>
        <?php if ($pdo == false): ?>
            <a href="http://php.net/manual/zh/book.pdo.php" class="install_tips" target="_blank"><i class="am-icon-frown-o"></i> PESCMS DOC relies on pdo_mysql to link the database, otherwise the program cannot be installed!</a>
        <?php endif; ?>
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">GD Library:</label>
    <div class="am-u-sm-10">
        <button type="button" class="am-btn am-btn-<?= $gd == true ? 'success' : 'danger' ?>"><?= $gd == true ? 'stand by' : 'not support' ?></button>
        <?php if ($gd == false): ?>
            <a href="http://php.net/manual/zh/book.image.php" target="_blank"><i class="am-icon-exclamation-triangle"></i>Uploading pictures and setting avatars requires the support of the GD library, but it does not affect program installation</a>
        <?php endif; ?>
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">CURL extension:</label>
    <div class="am-u-sm-10">
        <button type="button" class="am-btn am-btn-<?= $curl == true ? 'success' : 'danger' ?>"><?= $curl == true ? 'stand by' : 'not support' ?></button>
        <?php if ($curl == false): ?>
            <a href="http://php.net/manual/zh/book.curl.php" target="_blank"><i class="am-icon-exclamation-triangle"></i> Not installing will affect online update functionality, but will not affect program installation</a>
        <?php endif; ?>
    </div>
</div>