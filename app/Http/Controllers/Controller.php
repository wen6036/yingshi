<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Menu;
class Controller extends BaseController
{

	public $template = array();			//模板数据

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * 初始化
     * 2018年08月23日17:44:02
     **/
    public function __construct(){
        $this->role();
    }


    /**
	 * 获取并检查权限
	 * add by zhixiao476@gmail.com
	 * 2016年08月04日16:41:20
	 */
	private function role(){

		$menuList = Menu::where('pid','=',0)->get();
		$menu = array();
		foreach($menuList as $key => $val){
			$menu[$val['id']] = $val;
		}

		foreach($menu as $key => $val){
			$nums = Menu::where('pid','=',$val['id'])->get();
			$parentmenu[$val['id']] = $val;
			$lastmenu[$val['id']] = $nums;
		}
		$this->template['parentmenuList'] = $parentmenu;
		$this->template['lastmenuList'] = $lastmenu;
	}

	/**
     * 统一的错误输出
     * add by 846473066@qq.com
     * 2018年08月27日11:04:25
     */
    public function splitJson($json,$status = 0,$type = 0) {
        $array = array('status' => $status,'info' => $json);
        if (empty($type)){
            echo json_encode($array);exit();
        }else{
            return json_encode($array);
        }
    }

}
