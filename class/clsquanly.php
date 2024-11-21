<?php
class quanly extends database
{

    public function danhsachduan($id='')
    {
        if($id)
            $sql="select * from duan where idsp='$id'";
        else
            $sql="select * from duan";
        return $this->xuatdulieu($sql);
    }

    public function xoaduan($id)
    {
        $sql="delete from duan where idsp='$id'";
        return $this->xoadulieu($sql);
    }
    public function selectcongty($value='')
    {
        $str='';
        $sql="select * from congty";
        $arr=$this->xuatdulieu($sql);
        for($i=0;$i<count($arr);$i++)
        {
            if($arr[$i]["idcty"]==$value)
                $str.='<option selected value="'.$arr[$i]["idcty"].'">'.$arr[$i]["tencty"].'</option>';
            else
            $str.='<option value="'.$arr[$i]["idcty"].'">'.$arr[$i]["tencty"].'</option>';
        }
        return $str;
    }
    public function themduan($sql)
    {
        return $this->themdulieu($sql);
    }
    public function suaduan($sql)
    {
        return $this->suadulieu($sql);
    }


}



?>