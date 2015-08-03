<?php

/*
 * Created by aaron
 * Date: 14-11-07
 */

class Code 
{ 
    //�����ֵ� 
    private $dic = array( 
	0=>'0',    1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8',     
	9=>'9', 10=>'A',  11=>'B', 12=>'C'
    ); 
    public function encodeID($int, $format=8) 
	{ 
        $dics = $this->dic; 
        $dnum = 13; //������ 
        $arr = array (); 
        $loop = true; 
        while ($loop)
		{ 
            $arr[] = $dics[bcmod($int, $dnum)]; 
            $int = bcdiv($int, $dnum, 0); 
            if ($int == '0') 
			{ 
                $loop = false; 
            } 
        } 
        if (count($arr) < $format)
		{
		$arr = array_pad($arr, $format, $dics[0]); 
		}
        return implode('', array_reverse($arr)); 
    } 
    public function decodeID($ids) { 
        $dics = $this->dic; 
        $dnum = 13; //������ 
        //��ֵ���� 
        $dedic = array_flip($dics); 
        //ȥ�� 
        $id = ltrim($ids, $dics[0]); 
        //��ת 
        $id = strrev($id); 
        $v = 0; 
        for ($i = 0, $j = strlen($id); $i < $j; $i++) { 
            $v = bcadd(bcmul($dedic[$id { 
			$i } 
            ], bcpow($dnum, $i, 0), 0), $v, 0); 
        } 
        return $v; 
    } 
	
} 
?>