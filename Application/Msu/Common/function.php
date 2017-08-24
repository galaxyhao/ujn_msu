<?php

//use PHPExcel_IOFactory;

function outputexcel(){
    $dir = dirname(__FILE__);
    //得到当前的目录
    $database = M('TABLE');
    //将TABLE 换成实际的表
    $list_data = $database->select();
    //数据库全部输出
    Vendor('PHPExcel.PHPExcel');
    //导入第三方库
    $phpexcel = new \PHPExcel();
    $phpexcel->getActiveSheet()->setTitle("sheet_name");
    $phpexcel->getActiveSheet()
        ->setCellValue('A1','')
        ->setCellValue('B1','')
        ->setCellValue('C1','')
        ->setCellValue('D1','')
        ->setCellValue('E1','')
        ->setCellValue('F1','')
        ->setCellValue('G1','')
        ->setCellValue('H1','')
        ->setCellValue('I1','');
    /*
     * 请在空格中设置表头信息
     */
    $j = 2;
    foreach ($list_data as $key => $key_value){
        $phpexcel->getActiveSheet()
            /*
             * 请在空格中填入数据库变量名
             */
            ->setCellValue('A'.$j,$key_value[''])
            ->setCellValue('B'.$j,$key_value[''])
            ->setCellValue('C'.$j,$key_value[''])
            ->setCellValue('D'.$j,$key_value[''])
            ->setCellValue('E'.$j,$key_value[''])
            ->setCellValue('F'.$j,$key_value[''])
            ->setCellValue('G'.$j,$key_value[''])
            ->setCellValue('H'.$j,$key_value[''])
            ->setCellValue('I'.$j,$key_value['']);
        $j++;
    }
    //保存文件的方法
    $objwriter = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
    $this->browser_export('Excel5','test.xls');
    $objwriter->save('php://output');

}

/**
 * @method 使用的时候加上盘符就可以啦
 * $dir = dirname(__FILE__);
 * $file = $dir./sss.xls;
 * @param $file
 * @return array
 */

function import_excel($file){
    // 判断文件是什么格式
    $type = pathinfo($file);
    $type = strtolower($type["extension"]);
    $type=$type==='csv' ? $type : 'Excel5';
    ini_set('max_execution_time', '0');
    Vendor('PHPExcel.PHPExcel');
    // 判断使用哪种格式
    $objReader = PHPExcel_IOFactory::createReader($type);
    $objPHPExcel = $objReader->load($file);
    $sheet = $objPHPExcel->getSheet(0);
    // 取得总行数
    $highestRow = $sheet->getHighestRow();
    // 取得总列数
    $highestColumn = $sheet->getHighestColumn();
    //循环读取excel文件,读取一条,插入一条
    $data=array();
    //从第一行开始读取数据
    for($j=1;$j<=$highestRow;$j++){
        //从A列读取数据
        for($k='A';$k<=$highestColumn;$k++){
            // 读取单元格
            $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
        }
    }
    //返回数组操作
    return $data;
}

function browser_export($type, $filename)
{
    ob_end_clean();
    //必须否则会出现Excel乱码
    if ($type=='Excel5'){
        header('Content-Type: application/vnd.ms-excel');
    }else{
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
}