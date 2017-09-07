<?php
namespace Msu\Controller;
use Vendor\PHPMailer;
class WebController extends RootController
{
    public $userName = null;
    public function _initialize(){
        parent::_initialize();
        $this->userName = $_SESSION['name'];
        $this->userName = iconv('utf-8','gbk',$this->userName);
    }
    public function index(){
        $this->display();
    }
	public function web_list()
	{
        $web = D('WebView');
        $count = $web -> count();
        $Page = new \Think\Page($count,25);
        $show = $Page->show();
        $data = $web->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('data',$data);
        $this -> assign('name',$this->userName);
        $this -> assign('show',$show);
		$this -> display('web_list','gbk');
    }
    //网站缴费
    public function web_pay(){
        $record['start_time'] = strtotime(I('post.startdate'));
        $record['end_time'] = strtotime(I('post.enddate'));
        $record['edit_time'] = time();
        $record['money'] = I('post.money');
        $record['dns'] = I('post.dns');
        $record['user'] = $_SESSION['name'];
        if($record['start_time'] > $record['end_time']){
            $this->ajaxReturn('开始时间不得大于结束时间','eval');
        }
        $pay_record = D('WebPayRecord');
        if(!$pay_record->create($record)){
            $this->ajaxReturn($pay_record->getError(),'eval');
        }else{
            $pay_record->add($record);
        }
        $WebMoney = D('WebMoney');
        $web = I('post.');
        $web['user'] = $this->userName;
        $result = $WebMoney->where(array('domin'=>$web['dns']))->save($web);
        if($result){
            $this->ajaxReturn('success','eval');
        }else{
            $this->ajaxReturn('缴费失败，请重试','eval');
        }
    }
    //编辑资料
    public function edit()
    {
        $dnsname = I('get.dnsname');
        $dns = D('DnsList');
        $data = $dns->where(array('dnsname'=>$dnsname))->find();
        $this -> assign('data',$data);
        $this -> assign('name',$this->userName);
		$this -> display('edit','gbk');
    }
    //提交修改
    private function edit_post(){
        $data = $_POST;
        $DnsList = D('DnsList');
        $data['xxxgr'] = $this->userName;
        $data['xxxgrq'] = date('Y-m-d H:i:s');
        if(!$DnsList->create($data)){
            $this->ajaxReturn($DnsList->getError(),'eval');
        }else{
            $res = $DnsList->where(array('dnsname'=>$data['dnsname']))->save($data);
        }
        if($res){
            $this->ajaxReturn('success','eval');
        }else{
            $this->ajaxReturn('提交修改失败','eval');
        }
    }
    public function payRecord(){
        $dnsname = I('get.dnsname/s');
        if(empty($dnsname)){
            $this->error('错误的请求！');
        }
        $data = M('webpay_record')->where(array('dns'=>$dnsname))->select();
        foreach ($data as $key => $value) {
            $data[$key]['start_time'] = date('Y-m-d',$data[$key]['start_time']);
            $data[$key]['end_time'] = date('Y-m-d',$data[$key]['end_time']);
            $data[$key]['edit_time'] = date('Y-m-d H:i:s',$data[$key]['edit_time']);
        }

        $this->assign('data',$data);
        $this->display();
    }
    private function send_mail(){
        dump($this -> think_send_mail('916413446@qq.com','lrhest','济南大学网站欠费提醒','123'));
    }
	 /**
     * 系统邮件发送函数
     * @param string $to    接收邮件者邮箱
     * @param string $name  接收邮件者名称
     * @param string $subject 邮件主题 
     * @param string $body    邮件内容
     * @param string $attachment 附件列表
     * @return boolean 
     */
    function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
        $config = C('THINK_EMAIL');
        vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
        vendor('PHPMailer.class#smtp');
        $mail             = new \PHPMailer(); //PHPMailer对象
        $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $mail->IsSMTP();  // 设定使用SMTP服务
        $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
        //$mail->SMTPSecure = 'ssl';                 // 使用安全协议
        $mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器
        $mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
        $mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
        $mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
        $mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
        $replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
        $replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
        $mail->AddReplyTo($replyEmail, $replyName);
        $mail->Subject    = $subject;
        $mail->MsgHTML($body);
        $mail->AddAddress($to, $name);
        if(is_array($attachment)){ // 添加附件
            foreach ($attachment as $file){
                is_file($file) && $mail->AddAttachment($file);
            }
        }
        return $mail->Send() ? true : $mail->ErrorInfo;
    }
}
?>