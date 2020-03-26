<?php
/**
 * 本模板为智能表单的列表输出操作
 * 若没有特殊的需求，请加载本列表代码。
 */
?>

        <?php if (empty($list)): ?>
            <div class="am-alert am-alert-secondary am-margin-top am-margin-bottom am-text-center" data-am-alert>
                <p>No data on this page :-(</p>
            </div>
        <?php else: ?>
            <form class="am-form ajax-submit" action="<?= $label->url(GROUP . '-' . MODULE . '-listsort'); ?>" method="POST">
                <input type="hidden" name="method" value="PUT"/>
                <table class="am-table am-table-bordered am-table-striped am-table-hover am-text-sm">
                    <tr>
                        <?php if ($listsort): ?>
                            <th class="table-sort">Sort</th>
                        <?php endif; ?>
                        <th class="table-set">ID</th>
                        <?php foreach ($field as $value) : ?>
                            <?php if ($value['field_name'] == 'status'): ?>
                                <?php $class = 'table-set'; ?>
                            <?php else: ?>
                                <?php $class = 'table-title'; ?>
                            <?php endif; ?>
                            <th class="<?= $class ?>"><?= $value['field_display_name']; ?></th>
                        <?php endforeach; ?>
                        <th class="table-set">operating</th>
                    </tr>
                    <?php foreach ($list as $key => $value) : ?>
                        <tr>
                            <?php if ($listsort): ?>
                                <td class="am-text-middle">
                                    <input type="text" class="am-input-sm" name="id[<?= $value["{$fieldPrefix}id"]; ?>]"
                                           value="<?= $value["{$fieldPrefix}listsort"]; ?>">
                                </td>
                            <?php endif; ?>
                            <td class="am-text-middle"><?= $value["{$fieldPrefix}id"]; ?></td>
                            <?php foreach ($field as $fv) : ?>
                                <td class="am-text-middle">
                                    <?= $label->valueTheme($fv, $fieldPrefix, $value); ?>
                                </td>
                            <?php endforeach; ?>


                            <td class="am-text-middle">
                                <?php /* To implement a custom action button, change this variable */ ?>
                                <?php $operate = empty($operate) ? '/Content/Content_index_operate.php' : $operate;  ?>
                                <?php include THEME_PATH . $operate; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <ul class="am-pagination am-pagination-right am-text-sm">
                    <?= $page; ?>
                </ul>
                <?php if ($listsort): ?>
                    <div class="am-margin-top">
                        <button type="submit" class="am-btn am-radius am-btn-primary am-btn-xs">Sort</button>
                    </div>
                <?php endif; ?>
            </form>
        <?php endif; ?>
