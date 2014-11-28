<?php
namespace Home\Model;
use Think\Model;
class FilesModel extends Model {
    private $dist       = null;
    /**
     * index
     * @return boolean
     * @author nixus
     **/
    public function index() {
    }

    /**
     * 打包保留功能的相关文件
     * @return boolean
     * @author John Doe
     **/
    public function packFiles($privilege_list) {
        $files = array_keys($privilege_list, 2);
        foreach ($files as $val) {
            $this->copyAPPFile(MODULE_PATH.'Model/'.ucfirst(str_replace('_', '', $val)).'Model.class.php');
            /*
            if (MODULE_PATH.'Controller/'.ucfirst(str_replace('_', '', $val)).'Controller.class.php') {
                touch(MODULE_PATH.'Controller/'.ucfirst(str_replace('_', '', $val)).'Controller.class.php');
            }
             */
            $this->copyAPPFile(MODULE_PATH.'Controller/'.ucfirst(str_replace('_', '', $val)).'Controller.class.php');
        }
        $app_path = str_replace('\\', '/', $this->dist.__ROOT__.MODULE_PATH);
        $app_path = str_replace('/./', '/', $app_path);
        if (!$this->packBaseFiles("{$app_path}View")) {
            return false;
        }
        if (!$this->packBaseFiles("{$app_path}Common")) {
            return false;
        }
        if (!$this->packBaseFiles("{$app_path}Conf")) {
            return false;
        }
        if (!$this->copyFile("{$app_path}index.html")) {
            return false;
        }
        $base_file = $this->dist.__ROOT__;
        if (!$this->packBaseFiles("{$base_file}/Public")) {
            return false;
        }
        if (!$this->packBaseFiles("{$base_file}/ThinkPHP")) {
            return false;
        }
        if (!$this->copyFile("{$base_file}/index.php")) {
            return false;
        }
        if (!$this->copyFile("{$base_file}/.htaccess")) {
            return false;
        }
        if (!$this->copyFile("{$base_file}/composer.json")) {
            return false;
        }
        if (!$this->copyFile("{$base_file}/README.md")) {
            return false;
        }
        return true;
    }

    /**
     * 打包基础文件
     *
     * @return boolean
     */
    private function packBaseFiles($src) {
        foreach (glob("$src/*") as $val) {
            if (is_dir($val)) {
                $this->packBaseFiles($val);
            } else {
                if (!$this->copyFile($val)) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 根据文件的pathinfo信息 建立相应的目录
     *
     * @return string 完整的文件目录及文件名
     */
    private function makeDir($file) {
        $path = pathinfo($file);
        $dist_path = str_replace(__ROOT__, '/think', $path['dirname']);
        if (!file_exists($dist_path)) {
            mkdir($dist_path, 755, true);
        }
        return $dist_path.DIRECTORY_SEPARATOR.$path['basename'];
    }

    /**
     * 复制文件到指定目录
     * @return void
     */
    private function copyFile($file) {
        $target = $this->makeDir($file);
        return copy($file, $target);
    }

    /**
     * 复制APP文件到相应目录
     *
     * @return boolean
     */
    private function copyAPPFile($file) {
        if (file_exists($file)) {
            $file_path = pathinfo($file);
            $this->dist = strstr(str_replace('\\', '/', dirname(__FILE__)), __ROOT__, true);
            $copy_dst = str_replace('.', $this->dist.'/think/', $file_path['dirname']);
            if (!file_exists($copy_dst)) {
                mkdir($copy_dst, 755, true);
            }
            if (!copy($file, $copy_dst.DIRECTORY_SEPARATOR.$file_path['basename'])) {
                return false;
            }
        }
    }

    /**
     * 遍历文件目录
     * @return array
     * @author nixus
     */
    public function scaner($dir) {
        $files_list = array();
        foreach (glob("$dir/*") as $val) {
            if (is_dir($val)) {
                $files_list['dir'][] = $val;
                $this->scaner($val);
            } else {
                $files_list['file'][] = $val;
            }
        }
        return $files_list;
    }
}
