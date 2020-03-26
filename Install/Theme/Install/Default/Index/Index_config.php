        <form action="<?=DOCUMENT_ROOT?>/?m=Index&a=option" class="am-form am-form-horizontal" method="POST" data-am-validator>
            <input type="hidden" name="method" value="GET" />
            <?php include 'Index_check.php'; ?>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Database address:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="host" value="localhost" placeholder="Database address" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Name database:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="name" placeholder="Name database" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Database account:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="account" placeholder="Database account" required>
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Database password:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="passwd" placeholder="Database password" >
                </div>
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Database port:</label>
                <div class="am-u-sm-10">
                    <input type="text" name="port" value="3306" placeholder="Database port" required>
                </div>
            </div>

            <div class="am-margin-top am-fl">
                <a href="<?=DOCUMENT_ROOT?>/?m=Index&a=index" class="am-btn am-btn-default">Previous</a> 
            </div>

            <div class="am-margin-top am-fr">
                <button type="submit" id="next" class="am-btn am-btn-default">Next step</button> 
            </div>
    <div class="am-cf"></div>
        </form>
<script>
    $(function () {
        $("#next").on("click", function () {
            if($("#version,#pdo").attr("class") == 'am-btn am-btn-danger'){
                alert($(".install_tips").text());
                return false;
            }
            
        })
    })
</script>