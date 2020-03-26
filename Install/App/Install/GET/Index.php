<?php

/**
 * PESCMS for PHP 5.4+
 *
 * Copyright (c) 2014 PESCMS (http://www.pescms.com)
 *
 * For the full copyright and license information, please view
 * the file LICENSE.md that was distributed with this source code.
 */

namespace App\Install\GET;

class Index extends \Core\Controller\Controller {

    private $version;

    public function __init() {
        if (is_file(APP_PATH . 'install.txt')) {
            $this->error('Cannot perform the installer again.');
        }

        if(is_file(APP_PATH.'version')){
            $this->version = file(APP_PATH.'version')[0];
        }else{
            $this->version = 'Unknown Version';
        }

        $this->assign('version', $this->version);

    }

    /**
     * 欢迎界面
     */
    public function index() {
        $this->assign('title', 'Welcome to use FY Project Team');
        $this->layout();
    }

    /**
     * 验证扩展
     */
    public function config() {
        $phpVersion = explode('.', phpversion());
        $version = "{$phpVersion['0']}.{$phpVersion['1']}";
        $check['php_version'] =  $version >= 5.6 ? true : false;

        $check['pdo'] = in_array('pdo_mysql', get_loaded_extensions()) ? true : false;

        $check['gd'] = function_exists('gd_info') ? true : false;

        $check['curl'] = function_exists('curl_version') ? true : false;
        $this->assign($check);
        $this->assign('title', 'Configuration information');
        $this->layout();
    }

    /**
     * 配置选项
     */
    public function option() {
        $data['DB_TYPE'] = 'mysql';
        $data['DB_HOST'] = $this->isP('host', 'Please fill in the address database!');
        $data['DB_NAME'] = $this->isP('name', 'Please fill in the name of the database!');
        $data['DB_USER'] = $this->isP('account', 'Please fill in the account database!');
        $data['DB_PWD'] = $this->p('passwd');
        $data['DB_PORT'] = $this->isP('port', 'Please fill out the database port!');
        $data['DB_PREFIX'] = 'pes_';
        $data['PRIVATE_KEY'] = substr(md5(uniqid()), '0', '10');
        $data['USER_KEY'] = substr(md5(uniqid()), '10', '10');

        //写入安装配置信息
        $installConfig = require CONFIG_PATH . 'config_same.php';
        $fopen = fopen(CONFIG_PATH . 'config.php', 'w+');
        if (!$fopen) {
            $this->error('File cannot be opened. Please check whether the program installation directory Settings sufficient permissions');
        }

        $str = "<?php\n return array(\n";
        foreach (array_merge($data, $installConfig) as $key => $value) {
            $str .= "'{$key}' => '{$value}',\n";
        }
        $str .= ");";
        fwrite($fopen, $str);
        fclose($fopen);

        //创建临时运行配置文件
        $config = require CONFIG_PATH . 'config_array.php';
        $fopen = fopen(CONFIG_PATH . 'config_tmp.php', 'w+');
        if (!$fopen) {
            $this->error('File cannot be opened, please test whether or not enough permissions set program directory');
        }

        $str = "<?php\n return array(\n";
        foreach (array_merge($data, $config) as $key => $value) {
            $str .= "'{$key}' => '{$value}',\n";
        }
        $str .= ");";
        fwrite($fopen, $str);
        fclose($fopen);

        $this->assign('title', 'Ready to install');

        $this->layout();
    }

    /**
     * 执行安装
     */
    public function doinstall() {
        $data['domain'] = $this->p('domain');
        $data['account'] = $this->isP('account', 'Please fill in the administrator account');
        $data['passwd'] = $this->isP('passwd', 'Please fill in the administrator password');
        $data['name'] = $this->isP('name', 'Please fill in the administrator name');
        $data['mail'] = $this->isP('mail', 'Please fill in the administrator mailbox');

        //纯粹为了效果
        $table = array('To create departments list', 'Create a user dynamic table', 'Create a list of fields', 'To create a menu list', 'To create model list', 'Create a node list', 'Create a user group permissions nodes', 'Create system message list', 'Create a list of options', 'Create a list of items', 'To create the report list', 'To create report content list', 'Create a task list', 'Create a task review list', 'Create a task log list', 'Create a task list added', 'To create the update list', 'To create the user list', 'Create a user group list');
        $this->assign('table', json_encode($table));

        $this->assign($data);
        $this->assign('title', 'Perform the installation');
        $this->layout();
    }

    /**
     * 导入数据库
     */
    public function import() {
        $domain = $this->p('domain');
        $data['user_account'] = $this->isP('account', 'Please fill in the administrator account');
        $data['user_password'] = \Core\Func\CoreFunc::generatePwd($data['user_account'] . $this->isP('passwd', 'Please fill in the administrator password'), 'PRIVATE_KEY');
        $data['user_name'] = $this->isP('name', 'Please fill in the administrator name');
        $data['user_mail'] = $this->isP('mail', 'Please fill in the administrator mailbox');
        $data['user_group_id'] = $data['user_department_id'] = '1';
        $data['user_status'] = '1';
        $data['user_createtime'] = time();
        

        //读取数据库文件
        $sqlFile = file_get_contents(APP_PATH . 'InstallDb/install.sql');
        if (empty($sqlFile)) {
            $this->error('Can not read the install SQL file');
        }

        //配置PDO信息
        $config = \Core\Func\CoreFunc::loadConfig();
        try {
            //创建数据库
            $tmp = new \PDO("mysql:host={$config['DB_HOST']};port={$config['DB_PORT']}", $config['DB_USER'], $config['DB_PWD']);
            $createDb = "CREATE DATABASE IF NOT EXISTS {$config['DB_NAME']} DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
            $tmp->exec($createDb);
            //连接数据库
            $db = new \PDO("mysql:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PWD']);

        } catch (\PDOException $e) {
            $this->error("Database connection error: ".$e->getMessage());
        }

        //检查是否开启MYSQL严格模式
        $sql = "SELECT @@sql_mode AS mode";
        foreach ($db->query($sql) as $row) {
            if (strpos(strtoupper($row['mode']), 'STRICT_TRANS_TABLES') !== false) {
                $transTable = fopen(APP_PATH . '/STRICT_TRANS_TABLES.txt', 'w+');
                fwrite($transTable, $row['mode']);
                fclose($transTable);
            }
        }

        //安装数据库文件
        $db->exec($sqlFile);
	
	$option['version'] = $this->version;//设置系统版本
	//更新配置信息
        foreach($option as $optionkey => $optionvalue){
            $this->db('option')->where('option_name = :option_name')->update([
                'value' => $optionvalue,
                'noset' => [
                    'option_name' => $optionkey
                ]
            ]);
        }

        if (!empty($domain)) {
            $this->db('option')->insert([
                'option_name' => 'domain',
                'name' => 'Website domain name',
                'value' => $domain
            ]);
        }

        \Core\Func\CoreFunc::$defaultPath = false;
        require PES_CORE . '/Expand/Identicon/autoload.php';
        $identicon = new \Identicon\Identicon();
        $imageDataUri = $identicon->getImageDataUri($data['user_mail']);
        $data['user_head'] = $imageDataUri;
        $data['user_department_id'] = $data['user_status'] = $data['user_group_id'] = '1';

        //写入管理员帐号
        $this->db('user')->insert($data);

        //读取临时配置文件
        $config = require CONFIG_PATH . 'config_tmp.php';
        //在项目根目录的配置目录创建配置文件
        $fopen = fopen(PES_CORE . 'Config/config.php', 'w+');
        if (!$fopen) {
            $this->error('File cannot be opened, please test whether or not enough permissions set program directory');
        }

        $str = "<?php\n \$config = array(\n";

        $urlModelArray['URLMODEL'] = array('index' => 0, 'suffix' => '1');
        foreach (array_merge($config, $urlModelArray) as $key => $value) {
            if (is_array($value)) {
                $str .= "'{$key}' => array(\n";
                foreach ($value as $ik => $iv) {
                    $str .= "'" . strtoupper($ik) . "' => '{$iv}',\n";
                }
                $str .= "),";
            } else {
                $str .= "'{$key}' => '{$value}',\n";
            }
        }
        $str .= ");\n";
        $str .= file_get_contents(PES_CORE . 'Config/config_same.php');

        fwrite($fopen, $str);
        fclose($fopen);
        //更新根目录的index.php
        $readWriteFile = file_get_contents(APP_PATH . 'Write/index.php');
        $fopen = fopen(PES_CORE . 'Public/index.php', 'w+');
        fwrite($fopen, $readWriteFile);
        fclose($fopen);

        //标记程序已安装和移除安装数据库文件
        unlink(APP_PATH . '/index.php');
        unlink(APP_PATH . '/InstallDb/install.sql');
        fclose(fopen(APP_PATH . 'install.txt', 'w+'));
        fclose(fopen(APP_PATH . 'index.html', 'w+'));

        $this->success('The installation is complete!');
    }

}
