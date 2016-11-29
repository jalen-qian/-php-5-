<?php
/**
 * User: jalen （钱文军）
 * Date: 2016/11/28
 * Time: 13:57
 * 五种排序算法之插入排序的实现
 * 插入排序：一个数组左边是已排序序列，右边是无序序列，不断地将右边无序序列的元素依次插入
 * 到左边有序序列的合适位置，直到整个数组序列都是有序的为止。
 */
class InsertSort
{
    var $arry;
    var $maxSize;
    var $mElement = 0;

    public function InsertSort($maxSize)
    {
        $this->arry = array($maxSize); //分配空间
        $this->maxSize = $maxSize;
    }

    /**
     * 添加一个数到数组中.
     */
    public function add($int)
    {
        if ($this->mElement >= $this->maxSize) {
            return;
        }
        $this->arry[$this->mElement] = $int;
        ++$this->mElement;
    }

    /**
     * 打印输出当前的数组.
     */
    public function display()
    {
        for ($i = 0; $i < $this->mElement; ++$i) {
            echo $this->arry[$i];
            echo ' ';
        }
        echo '<br>';
    }

    /**
     * 交换.
     */
    public function swap($a, $b)
    {
        $temp = $this->arry[$a];
        $this->arry[$a] = $this->arry[$b];
        $this->arry[$b] = $temp;
    }

    /**
     * 执行插入排序.
     */
    public function sort()
    {
        for ($out = 1; $out < $this->mElement; $out++) {
            //先保存需要被删除的元素(这个元素将会被插入到前面有序序列中,而它原来的位置会被覆盖掉)
            $temp = $this->arry[$out];
            //将要插入位置之后的有序元素全部向后移动一位
            $in = $out;
            while ($in > 0 && $this->arry[$in - 1] >= $temp) {
                $this->arry[$in] = $this->arry[$in - 1];
                --$in;
            }
            //最后将保存的元素插入到$in的位置
            $this->arry[$in] = $temp;
        }
    }
}
//下面是测试代码（按照规范应该将测试代码写到单独的文件中，但是为了方便查看，这里先写到这里）
$insertSort = new InsertSort(10);
$insertSort->add(12);
$insertSort->add(44);
$insertSort->add(10);
$insertSort->add(4);
$insertSort->add(35);
$insertSort->add(456);
$insertSort->add(34);
$insertSort->add(78);
$insertSort->add(24);
$insertSort->add(56);
$insertSort->display();
$insertSort->sort(); //执行选择排序排序
$insertSort->display();
