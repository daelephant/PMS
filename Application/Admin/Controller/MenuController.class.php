<?php
/**
 * 后台菜单相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Org\Util\Page;

/**
* 
*/
class MenuController extends CommonController {
	
	public function add(){
		//$post = serialize($_POST);
		//print_r($_POST);
		//String[] names = request.getParamterValues("name");
		if ($_POST) {
			
			// if (!isset($_POST['name'][0]) || !$_POST['name'][0]) {//判断是否设置，是否设置为空
			// 	return show(0,'商品名不能为空');
			// }
			// if (!isset($_POST['name'][1]) || !$_POST['name'][1]) {//判断是否设置，是否设置为空
			// 	return show(0,'商品名不能为空');
			// }
			
			// if (!isset($_POST['m']) || !$_POST['m']) {//判断是否设置，是否设置为空
			// 	return show(0,'模块名不能为空');
			// }
			// if (!isset($_POST['c']) || !$_POST['c']) {//判断是否设置，是否设置为空
			// 	return show(0,'控制器名不能为空');
			// }
			// if (!isset($_POST['f']) || !$_POST['f']) {//判断是否设置，是否设置为空
			// 	return show(0,'方法名不能为空');
			// }
			if ($_POST['id']) {
				return $this->save($_POST);
			}
			//$name = $_POST['name']['1'];
			//print_r($name);
			//$name = $_POST['name']['1'];
			//$c=count($_POST[name]);
			//var_dump($c);
			for ($i=0; $i < count($_POST[name]) ; $i++) { 
				$datalist[] = array('name'=>$_POST['name'][$i],
									'idnumber'=>$_POST['idnumber'][$i],
									'idmodel'=>$_POST['idmodel'][$i],
									'status'=>$_POST['status'][$i],
									'number'=>$_POST['number'][$i],
									'price'=>$_POST['price'][$i],
									'buyer'=>$_POST['buyer'][$i],
									'auditor'=>$_POST['auditor'][$i],
									'time'=>$_POST['time'][$i],
									'recordtime'=> time(),
									'comment'=>$_POST['comment'][$i]
									);
			}
			// $datalist[] = array('name'=>$_POST['name']['0'],'idnumber'=>$_POST['idnumber']['0']);
			// $datalist[] = array('name'=>$_POST['name']['1'],'idnumber'=>$_POST['idnumber']['1']);
			//print_r($datalist);
			$collectId = M("Collect")->addAll($datalist);
			if ($collectId) {
				// show(1,'排序成功',array('jump_url'=>'/admin.php?c=menu'));
				$this->redirect('/admin.php?c=menu');
			      //return show(1,'更新成功');
				//return show(1,'新增成功',$collectId);
			}
			//return show(0,'新增失败',$collectId);
		}else {
			$this->display();
		}
		
	}
	public function index(){

		$pagesize = 10;
		$page = I('get.p', '1');

		$m_collect = M('Collect');
		$m_collectrecord = M('Collectrecord');
		//$m_collect = M('Collect');
		// 通用查询条件
		// $cond['is_deleted'] = '0';
		// [Guard].[dbo].[Collect]
		$cond['collect.display'] = '1';
		$collect_list = $m_collect
			->table('Collect')
			->join("LEFT JOIN collectrecord ON collectrecord.cid = collect.id")
			->field('collect.*,count(collectrecord.cid) as countrecord')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			->group('collect.isreturn,collect.idnumber,collect.id,collect.name,collect.idmodel,collect.status,collect.number,collect.price,collect.time,collect.buyer,collect.auditor,collect.comment,collect.display,collect.recordtime')
			->select();
		//var_dump($collect_list);exit;
			//date("",$time);
		
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
	/**
	 * 生产领料
	 * @return [type] [description]
	 */
		public function yieldlist(){

		$pagesize = 10;
		$page = I('get.p', '1');

		$m_collect = M('Collect');
		$m_collectrecord = M('Collectrecord');
		//$m_collect = M('Collect');
		// 通用查询条件
		// $cond['is_deleted'] = '0';
		// [Guard].[dbo].[Collect]
		$cond['collect.display'] = '1';
		$collect_list = $m_collect
			->table('Collect')
			->join("LEFT JOIN collectrecord ON collectrecord.cid = collect.id")
			->field('collect.*,count(collectrecord.cid) as countrecord')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			->group('collect.isreturn,collect.idnumber,collect.id,collect.name,collect.idmodel,collect.status,collect.number,collect.price,collect.time,collect.buyer,collect.auditor,collect.comment,collect.display,collect.recordtime')
			->select();
		//var_dump($collect_list);exit;
			//date("",$time);
		
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
			/**
	 * 领取数量
	 * @return [type] [description]
	 */
		public function using(){
			//var_dump($_POST);exit;
			if (IS_SET) {
				$m_collect = M('Collect');
				$data['id']=$_POST['collect_id'];
 				$data['number'] =($_POST['number']-$_POST['numbering']) ;
 				//var_dump($data['number']);exit;
				$m_collect->save($data);
				$this->redirect('menu/yieldlist');
			}
		//end
		}		
	//start
	/**
	 * 退货记录
	 * @return [type] [description]
	 */
		public function isreturn(){

		$pagesize = 10;
		$page = I('get.p', '1');

		$m_collect = M('Collect');
		$m_collectrecord = M('Collectrecord');
		//$m_collect = M('Collect');
		// 通用查询条件
		// $cond['is_deleted'] = '0';
		// [Guard].[dbo].[Collect]
		$cond['collect.display'] = '1';
		$cond['collect.isreturn'] = '1';
		$collect_list = $m_collect
			->table('Collect')
			->join("LEFT JOIN collectrecord ON collectrecord.cid = collect.id")
			->field('collect.*,count(collectrecord.cid) as countrecord')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			->group('collect.isreturn,collect.idnumber,collect.id,collect.name,collect.idmodel,collect.status,collect.number,collect.price,collect.time,collect.buyer,collect.auditor,collect.comment,collect.display,collect.recordtime')
			->select();
		//var_dump($collect_list);exit;
			//date("",$time);
		
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
	//start
	/**
	 * 历史记录
	 * @return [type] [description]
	 */
		public function collectrecord(){
		
		$pagesize = 10;
		$page = I('get.p', '1');

		$m_collectrecord = M('Collectrecord');
		// 通用查询条件
		$cond['cid'] = $_GET['id'];
		$cond['display'] = '1';
		$collectrecord_list = $m_collectrecord
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($collectrecord_list);exit;
			foreach ($collectrecord_list as &$collectrecord) 
		{	
			//$moneys=sprintf("%.2f", $money);
			//$collectrecord['moneys'] = sprintf("%.2f", $collectrecord['moneys']);//将金额设置为两位浮点型
			$collectrecord['recordthis'] = date("Y/m/d H:s:i", $collectrecord['recordthis']);
			//$collectrecord['logintimes'] = date("Y-m-d H:s:i", $collectrecord['logintimes']);
			
		}
		
		$this->assign('collectrecord_list', $collectrecord_list);

		$total = $m_collectrecord->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
	
	public function edit() {
		$collectId = $_GET['id'];
		$collect=M("Collect")->find($collectId);
		$collect['recordtime'] = date("Y/m/d H:s:i",$collect['recordtime']);
		//var_dump($collect);exit;
		$this->assign('collect',$collect);
		$this->display();
	}
	public function save($data) {
		$id = $data['id'];
		$data['cid'] = $data['id'];
		$data['recordthis'] = time();
		$data['author'] = session('adminUser')['username'];
		//var_dump($collectId);exit;
		unset($data['id']);//释放掉
		try {
			//start
						if (!$id || !is_numeric($id)) {
			    			throw_exception('ID不合法');
			    		}
			    		if (!$data || !is_array($data)) {
			    			throw_exception('更新的数据不合法');
			    		}
			    		$idrecord = M('Collectrecord')->add($data);
			    		$id = M('Collect')->where('id='.$id)->save($data);
			//end
			//$id = M("Collect")->updateMenuById($collectId, $data);
			if($id == false) {
				return show(0,'更新失败');
			}
			if($idrecord == false) {
				return show(0,'记录失败');
			}
			return show(1,'更新成功');
		}catch(Exception $e) {
			return show(0,$e->getMessage());
		}
	}
	public function setStatus(){
		try{
			if($_POST) {
				$id = $_POST['id'];
				$display = $_POST['display'];
				//执行数据库更新操作
				//start
							if (!is_numeric($id) || !$id) {
			    		throw_exception("ID不合法");
			    	}
			    	if (!is_numeric($display)|| !$display) {
			    		throw_exception("状态不合法");
			    	}
			    	$data['display'] = $display;
			    	$res = M("Collect")->where('id='.$id)->save($data);
				//end
				//$res = D("Collect")->updateStatusById($id, $status);
				if($res) {
					return show(1,'操作成功');
				}else{
					return show(0, '操作失败');
				}
			}
		}catch(Exception $e){
			return show(0,$e->getMessage());
		}
		return show(0,'没有提交数据');
	}
	public function listorder(){
		$listorder = $_POST['listorder'];
		$jumpUrl = $_SERVER['HTTP_REFERER'];
		$errors = array();
		if ($listorder) {
			try {
				foreach ($listorder as $menuId => $v) {
					//执行更新，写model
					$id = D("Menu")->updateMenuListorderById($menuId, $v);
					if ($id===false) {
						$errors[] = $menuId;
					}
				}
			}catch(Exception $e) {
				return show(0,$e->getMessage(),array('jump_url'=>$jumpUrl));
			}
			if ($errors) {
				return show(0,'排序失败-'.implode(',', $errors),array('jump_url'=>$jumpUrl));
			}
			return show(1,'排序成功',array('jump_url'=>$jumpUrl));
		}
		return show(0,'排序数据失败',array('jump_url'=>$jumpUrl));
	}

	public function findlist(){
	   // var_dump($_POST);exit;
		
		if ($_POST['sosuo'] == 1) {
		// 考虑分页
		$pagesize = 10;
		$page = I('get.p', '1');

		$m_collect = M('Collect');
		// 通用查询条件
		
		// $cond['is_deleted'] = '0';
		$cond['display'] = '1';
		//$cond['name']=array('like','%');
		// $num=($_GET['user_id']);
		//$map['id']  = array('eq',$num);
		$cond['name']=array('like',$_POST['value'].'%');
		
		$collect_list = $m_collect
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($collect_list);exit;

	
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display('findlist');//action名称

		}elseif ($_POST['sosuo'] == 2) {
		$pagesize = 10;
		$page = I('get.p', '1');
		$m_collect = M('Collect');
		$cond['display'] = '1';
		$cond['idnumber']=array('like',$_POST['value'].'%');
		
		$collect_list = $m_collect
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($collect_list);exit;

	
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display('findlist');//action名称

		}elseif ($_POST['sosuo'] == 3) {
		$pagesize = 10;
		$page = I('get.p', '1');
		$m_collect = M('Collect');
		$cond['display'] = '1';
		$cond['idmodel']=array('like',$_POST['value'].'%');
		
		$collect_list = $m_collect
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($collect_list);exit;

	
		$this->assign('collect_list', $collect_list);

		$total = $m_collect->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display('findlist');//action名称

		}
	}
}
