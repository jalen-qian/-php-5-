<?php

class bubblesort
{
    var $arry;
    var $maxSize;
    var $mElement = 0;
    public function BubbleSort($maxSize)
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
     * 执行冒泡排序.
     */
    public function bubble()
    {
        for ($out = $this->mElement - 1; $out > 1; --$out) {
            for ($in = 0; $in < $out; ++$in) {
                if ($this->arry[$in] > $this->arry[$in + 1]) {
                    $this->swap($in, $in + 1);
                }
            }
        }
    }
}

//下面是测试代码（本来应该将测试代码写到单独的文件中，但是为了方便查看，这里先写到这里）
$bubbleSort = new BubbleSort(10);
$bubbleSort->add(12);
$bubbleSort->add(44);
$bubbleSort->add(10);
$bubbleSort->add(4);
$bubbleSort->add(35);
$bubbleSort->add(456);
$bubbleSort->add(34);
$bubbleSort->add(78);
$bubbleSort->add(24);
$bubbleSort->add(56);
$bubbleSort->display();
$bubbleSort->bubble(); //执行冒泡排序
$bubbleSort->display();
