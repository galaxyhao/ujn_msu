<?php
namespace Msu\Model;
use Think\Model;

class WebPayRecordModel extends Model{
    protected $trueTableName = 'msu_webpay_record';

    protected $_validate = array(
        array('start_time','require','开始时间不能为空'),
        array('end_time','require','结束时间不能为空'),
        array('money','require','缴费金额不能为空')
    );
}