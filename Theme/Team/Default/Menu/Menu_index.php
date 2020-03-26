<?php include THEME_PATH . "/Content/Content_index_header.php"; ?>
    <div class="am-btn-toolbar">
        <div class="am-btn-group am-btn-group-xs">
            <a href="<?= $label->url(GROUP . '-Menu-action', ['back_url' => base64_encode($_SERVER['REQUEST_URI'])]); ?>"
               class="am-btn am-radius am-btn-default"><span class="am-icon-plus"></span> Add</a>
        </div>
    </div>

    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

    <form class="am-form ajax-submit" action="<?= $label->url(GROUP . '-' . MODULE . '-listsort'); ?>" method="POST">
        <input type="hidden" name="method" value="PUT"/>
        <table class="am-table am-table-striped am-table-hover table-main">
            <tr>
                <th class="table-sort">Sort</th>
                <th class="table-id">ID</th>
                <th class="table-title">name</th>
                <th class="table-type">Link parameter</th>
                <th class="table-set">operating</th>
            </tr>
            <?php if (!empty($menu)): ?>
                <?php foreach ($menu as $topkey => $topValue) : ?>
                    <tr>
                        <td class="am-text-middle">
                            <input type="text" name="id[<?= $topValue['menu_id']; ?>]"
                                   value="<?= $topValue['menu_listsort']; ?>">
                        </td>
                        <td class="am-text-middle"><?= $topValue['menu_id']; ?></td>
                        <td class="am-text-middle"><i
                                class="<?= $topValue['menu_icon'] ?>"></i> <?= $topValue['menu_name']; ?></td>
                        <td class="am-text-middle"><?= $topValue['menu_link']; ?></td>
                        <td class="am-text-middle">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-text-secondary"
                                       href="<?= $label->url(GROUP . '-' . MODULE . '-action', array('id' => $topValue["menu_id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))) ?>"><span
                                            class="am-icon-pencil-square-o"></span> edit</a>
                                    <i class="am-margin-left-xs am-margin-right-xs">|</i>
                                    <a class="am-text-danger ajax-click ajax-dialog"  msg="confirm to delete? Will not recover!"
                                       href="<?= $label->url(GROUP . '-' . MODULE . '-action', array('id' => $topValue["menu_id"], 'method' => 'DELETE', 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"
                                       ><span class="am-icon-trash-o"></span> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php if (!empty($topValue['menu_child'])): ?>
                        <?php foreach ($topValue['menu_child'] as $key => $value) : ?>
                            <tr>
                                <td class="am-text-middle">
                                    <input type="text" name="id[<?= $value['menu_id']; ?>]"
                                           value="<?= $value['menu_listsort']; ?>">
                                </td>
                                <td class="am-text-middle"><?= $value['menu_id']; ?></td>
                                <td class="am-text-middle">
                                    <span class="plus_icon plus_end_icon"></span><i
                                        class="<?= $value['menu_icon'] ?>"></i> <?= $value['menu_name']; ?>
                                </td>
                                <td class="am-text-middle"><?= $value['menu_link']; ?></td>
                                <td class="am-text-middle">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-text-secondary"
                                               href="<?= $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["menu_id"], 'back_url' => base64_encode($_SERVER['REQUEST_URI']))) ?>"><span
                                                    class="am-icon-pencil-square-o"></span> edit</a>
                                            <i class="am-margin-left-xs am-margin-right-xs">|</i>
                                            <a class="am-text-danger ajax-click ajax-dialog"  msg="confirm to delete? Will not recover!"
                                               href="<?= $label->url(GROUP . '-' . MODULE . '-action', array('id' => $value["menu_id"], 'method' => 'DELETE', 'back_url' => base64_encode($_SERVER['REQUEST_URI']))); ?>"
                                               ><span class="am-icon-trash-o"></span>
                                                delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <button type="submit" class="am-btn am-radius am-btn-primary am-btn-xs">Sort</button>
    </form>
<?php include THEME_PATH . "/Content/Content_index_footer.php"; ?>