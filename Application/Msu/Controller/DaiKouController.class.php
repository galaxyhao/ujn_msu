<?php
namespace Msu\Controller;
use Think\Controller;
/**
 * 工资代扣管理模块
 * @Author   LRHest
 * @DateTime 2017-08-05T08:37:31+0800
 */
class DaiKouController extends Controller
{	
	public function index()
	{
		$daikou = M('daikou');
		if(I('get.id')){
			$where['id'] = I('get.id');
		}
		if(I('get.name')){
			$where['name'] = I('get.name');
		}
		if(I('get.batch')){
			$where['batch'] = I('get.batch');
		}
		$where['status'] = 1;
		$count = $daikou -> where($where) -> count();
		$Page = new \Think\Page($count,30);

		$show = $Page -> show();
		$data = $daikou -> where($where) -> limit($Page->firstRow.','.$Page->listRows) ->select();

		$counts = $daikou -> max('id') + 1;
		$this->assign('where',$where);
		$this->assign('show',$show);
		$this->assign('data',$data);
		$this->assign('counts',$counts);
		$this->display();
	}
	/**
	 * 上传表格页面
	 * @Author   LRHest
	 * @DateTime 2017-08-07T09:19:29+0800
	 * @return   [type]                   [description]
	 */
	public function import_excel(){
		$this->display();
	}
	public function add(){
		$daikou = M("daikou");
		//验证规则
		$rule = array(
			array('name','1,10','姓名长度不合法',0,'length'),
			array('je','require','扣费金额不能为空'),
			array('je','number','扣费金额必须是数字'),
			array('batch',array(1,4,7,10),'扣费月份不在正确范围内',0,'in'),
			array('remark','0,100','备注长度不合法',0,'length'),
			);
		if(!$daikou->validate($rule)->create()){
			exit($daikou->getError());
		}else{
			$result = $daikou->add(I('post.'));
			if($result){
				$this->ajaxreturn('success','eval');
			}else{
				$this->ajaxreturn('添加失败！','eval');
			}
		}
	}
	/**
	 * 编辑工资代扣记录
	 * @Author   LRHest
	 * @DateTime 2017-08-07T11:43:41+0800
	 * @return   [type]                   [description]
	 */
	public function edit(){
		$daikou = M("daikou");
		$where = I('post.');
		//验证规则
		$rule = array(
			array('je','require','扣费金额不能为空'),
			array('je','number','扣费金额必须是数字'),
			array('remark','0,100','备注长度不合法',0,'length'),
			);
		if(!$daikou -> validate($rule) -> create()){
			exit($daikou->getError());
		}else{
			$result = $daikou->save($where);
			if($result){
				$this->ajaxreturn('success','eval');
			}else{
				$this->ajaxreturn('修改失败！','eval');
			}
		}
	}
	/**
	 * 删除记录
	 * @Author   LRHest
	 * @DateTime 2017-08-07T11:54:27+0800
	 * @return   [type]                   [description]
	 */
	public function delete(){
		$daikou = M('daikou');
		$id = I('get.id');
		$result = $daikou -> where("id = $id") -> setField('status',0);
		if($result){
			$this->ajaxreturn('success','eval');
		}else{
			$this->ajaxreturn('删除失败！','eval');
		}
	}
	/**
	 * 读取上传的Excel表格
	 * @Author   LRHest
	 * @DateTime 2017-08-05T08:39:55+0800
	 * @return   [type]                   [description]
	 */
	public function read_excel(){
		$daikou = M('daikou');
		$upload = new \Think\Upload;
		$upload->maxSize   =  3145728 ;// 设置附件上传大小
	    $upload->exts      =  array('xls', 'xlsx');// 设置附件上传类型
	    $upload->rootPath  =  './public/upload/'; // 设置附件上传根目录
	    $info = $upload -> uploadOne($_FILES['excel']);
	    if(!$info){
	    	$this->error($upload->getError());
	    }else{
	    	$data = import_excel('./public/upload/'.$info['savepath'].$info['savename']);
	    	for($i=2; $i<=count($data); $i++) { 
	    		$where['name'] = $data[$i][0];
	    		$where['zgbh'] = $data[$i][1];
	    		$where['dwdm'] = $data[$i][2];
	    		$where['idcard'] = $data[$i][3];
	    		$where['acadmic'] = $data[$i][4];
	    		$where['je'] = $data[$i][5];
	    		$where['batch'] = $data[$i][6];
	    		$where['remark'] = $data[$i][7];
	    		$where['edit_time'] = date('Y-m-d H:i:s');
	    		$daikou->add($where);
	    		echo "正在写入第".($i-1)."条数据...</br>";
	    	}
	    }
	    if($i > 1){
	    	echo ('数据写入成功，共计'.($i-2).'条');
	    }

	}
	public function output_excel(){
		$daikou = M('daikou');
		$sheetname = '工资代扣表';
		if(I('get.id')){
			$where['id'] = I('get.id');
		}
		if(I('get.name')){
			$where['name'] = I('get.name');
		}
		if(I('get.batch')){
			$where['batch'] = I('get.batch');
			$sheetname = $where['batch'].'月工资代扣表';
		}
		$where['status'] = 1;		
		$data = $daikou -> where($where) ->select();
		$this->output_to_excel($data,$sheetname);
	}
	public function download_model(){
		$url = __ROOT__."/public/model/上传模板.xls";
		header("Location:$url");
	}
	private function output_to_excel($data,$sheetname){
    $list_data = $data;
    //全部输出
    Vendor('PHPExcel.PHPExcel');
    //导入第三方库
    $phpexcel = new \PHPExcel();
    $phpexcel->getActiveSheet()->setTitle($sheetname);
    $phpexcel->getActiveSheet()
        ->setCellValue('A1','姓名')
        ->setCellValue('B1','职工编号')
        ->setCellValue('C1','金额')
        ->setCellValue('D1','备注');
    /*
     * 请在空格中设置表头信息
     */
    $j = 2;
    foreach ($list_data as $key => $key_value){
        $phpexcel->getActiveSheet()
            /*
             * 请在空格中填入数据库变量名
             */
            ->setCellValue('A'.$j,$key_value['name'])
            ->setCellValue('B'.$j,$key_value['zgbh'])
            ->setCellValue('C'.$j,$key_value['je'])
            ->setCellValue('D'.$j,$key_value['remark']);
        $j++;
    }
	    //保存文件的方法
	    $objwriter = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
	    browser_export('Excel5',"$sheetname.xls");
	    $objwriter->save('php://output');

	}
}