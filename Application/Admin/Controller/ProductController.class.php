<?php
/**
 * 后台成品相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Org\Util\Page;

class ProductController extends CommonController {
	
	public function add(){
		//$post = serialize($_POST);
		//print_r($_POST);
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
			for ($i=0; $i < count($_POST[idnumber]) ; $i++) { 
				$datalist[] = array('batch'=>$_POST['batch'][$i],
									'idnumber'=>$_POST['idnumber'][$i],
									'pcbnumber'=>$_POST['pcbnumber'][$i],
									'mbnumber'=>$_POST['mbnumber'][$i],
									'cardnumber'=>$_POST['cardnumber'][$i],
									'ramnumber'=>$_POST['ramnumber'][$i],
									'romnumber'=>$_POST['romnumber'][$i],
									'asstime'=>$_POST['asstime'][$i],
									'asser'=>$_POST['asser'][$i],
									'version'=>$_POST['version'][$i],
									'testtime'=>$_POST['testtime'][$i],
									'tester'=>$_POST['tester'][$i],
									'trytime'=>$_POST['trytime'][$i],
									'trier'=>$_POST['trier'][$i],
									'jointime'=>$_POST['jointime'][$i],
									'trier'=>$_POST['trier'][$i],
									'comment'=>$_POST['comment'][$i]
									
									);
			}
			// $datalist[] = array('name'=>$_POST['name']['0'],'idnumber'=>$_POST['idnumber']['0']);
			// $datalist[] = array('name'=>$_POST['name']['1'],'idnumber'=>$_POST['idnumber']['1']);
			//print_r($datalist);
			$collectId = M("product")->addAll($datalist);
			if ($collectId) {
				// show(1,'排序成功',array('jump_url'=>'/admin.php?c=menu'));
				$this->redirect('/admin.php?c=product');
			      //return show(1,'更新成功');
				//return show(1,'新增成功',$collectId);
			}
			//return show(0,'新增失败',$collectId);
		}else {
			$this->display();
		}
		
	}
	public function index(){
		
		// 考虑分页
		$pagesize = 10;
		$page = I('get.p', '1');

		$m_product = M('product');
		// 通用查询条件
		// $cond['is_deleted'] = '0';
		$cond['product.display'] = '1';
		$product_list = $m_product
			->table('product')
			->join("LEFT JOIN productrecord ON productrecord.cid = product.id")
			->field('product.*,count(productrecord.cid) as countrecord')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			->group('product.isreturn,product.devicename,product.id,product.devicetype,product.batch,product.idnumber,product.pcbnumber,product.mbnumber,product.cardnumber,product.ramnumber,product.romnumber,product.asstime,product.asser,product.version,product.testtime,product.tester,product.trytime,product.trier,product.jointime,product.issend,product.sendtime,product.sendtype,product.sendfor,product.comment,product.display')
			->select();
		//var_dump($product_list);exit;

	
		$this->assign('product_list', $product_list);

		$total = $m_product->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
	/**
	 * 退货记录
	 * @return [type] [description]
	 */
	public function isreturn(){
		
		// 考虑分页
		$pagesize = 10;
		$page = I('get.p', '1');

		$m_product = M('product');
		// 通用查询条件
		// $cond['is_deleted'] = '0';
		$cond['product.display'] = '1';
		$cond['product.isreturn'] = '1';
		$product_list = $m_product
			->table('product')
			->join("LEFT JOIN productrecord ON productrecord.cid = product.id")
			->field('product.*,count(productrecord.cid) as countrecord')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			->group('product.isreturn,product.devicename,product.id,product.devicetype,product.batch,product.idnumber,product.pcbnumber,product.mbnumber,product.cardnumber,product.ramnumber,product.romnumber,product.asstime,product.asser,product.version,product.testtime,product.tester,product.trytime,product.trier,product.jointime,product.issend,product.sendtime,product.sendtype,product.sendfor,product.comment,product.display,product.display')
			->select();
		//var_dump($product_list);exit;

	
		$this->assign('product_list', $product_list);

		$total = $m_product->where($cond)->count();
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
		public function productrecord(){
		
		$pagesize = 10;
		$page = I('get.p', '1');

		$m_productrecord = M('productrecord');
		// 通用查询条件
		$cond['cid'] = $_GET['id'];
		$cond['display'] = '1';
		$productrecord_list = $m_productrecord
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($productrecord_list);exit;
			foreach ($productrecord_list as &$productrecord) 
		{	
			//$moneys=sprintf("%.2f", $money);
			//$productrecord['moneys'] = sprintf("%.2f", $productrecord['moneys']);//将金额设置为两位浮点型
			$productrecord['recordthis'] = date("Y/m/d H:s:i", $productrecord['recordthis']);
			//$productrecord['logintimes'] = date("Y-m-d H:s:i", $productrecord['logintimes']);
			
		}
		
		$this->assign('productrecord_list', $productrecord_list);

		$total = $m_productrecord->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display();
		//end
	}
	public function edit() {
		$productId = $_GET['id'];
		$product=M("product")->find($productId);
		//var_dump($product);exit;
		$this->assign('product',$product);
		$this->display();
	}
	public function save($data) {
		$id = $data['id'];
		$data['cid'] = $data['id'];
		$data['recordthis'] = time();
		$data['author'] = session('adminUser')['username'];
		//var_dump($productId);exit;
		unset($data['id']);//释放掉
		try {
			//start
						if (!$id || !is_numeric($id)) {
			    			throw_exception('ID不合法');
			    		}
			    		if (!$data || !is_array($data)) {
			    			throw_exception('更新的数据不合法');
			    		}
			    		$idrecord = M('productrecord')->add($data);
			    		$id = M('product')->where('id='.$id)->save($data);
			//end
			//$id = M("product")->updateMenuById($productId, $data);
			if($id == false) {
				return show(0,'更新失败');
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
			    	$res = M("product")->where('id='.$id)->save($data);
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

		$m_product = M('product');
		// 通用查询条件
		
		// $cond['is_deleted'] = '0';
		$cond['display'] = '1';
		//$cond['name']=array('like','%');
		// $num=($_GET['user_id']);
		//$map['id']  = array('eq',$num);
		$cond['idnumber']=array('like',$_POST['value'].'%');
		
		$product_list = $m_product
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($product_list);exit;

	
		$this->assign('product_list', $product_list);

		$total = $m_product->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display('findlist');//action名称

		}elseif ($_POST['sosuo'] == 2) {
		$pagesize = 10;
		$page = I('get.p', '1');
		$m_product = M('product');
		$cond['display'] = '1';
		$cond['sendfor']=array('like',$_POST['value'].'%');
		
		$product_list = $m_product
			//->field('id,name,nickname,phone,idnumber,status,status,regtime,logintimes,sex,birthday,idnumber,idpic')
			->where($cond)
			->order('id desc')
			->page($page, $pagesize)
			//->group('id')
			->select();
		//var_dump($product_list);exit;

	
		$this->assign('product_list', $product_list);

		$total = $m_product->where($cond)->count();
		$t_page = new Page($total, $pagesize);
		$this->assign('page_html', $t_page->show());


		$this->display('findlist');//action名称

		}
	}
}
