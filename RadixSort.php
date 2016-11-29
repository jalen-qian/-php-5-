<?php
/**
 * User: qianwenjun
 * e-mail: qianwenjun@yaochufa.com
 * Date: 2016/11/28
 * Time: 22:28.
 */
 class RadixSort
 {
     public $arry;
     public $maxSize;
     public $mElement = 0;
     //基数排序需要的二维数组
     public $tempArr;

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
         for ($i = 0; $i < $this->mElement; $i++) {
             echo $this->arry[$i];
             echo ' ';
         }
         echo '<br>';
     }

     /**
      * RadixSort constructor.
      *
      * @param $maxSize
      *
      * @return int
      * 构造器
      */
     public function RadixSort($maxSize)
     {
         $this->maxSize = $maxSize;
         $this->arry = array($maxSize);
        //给二维数组分配空间
        $this->tempArr = array();
         for ($i = 0; $i < 10; $i++) {
             $this->tempArr[$i] = array();
         }
     }

     /**
      * 根据传入的数，得到基数排序需要循环的次数
      * $maxNum 这个函数应该传入的是数组中的最大数.
      */
     public function getLoopTimes($maxNum)
     {
         $count = 1;
         $temp = floor($maxNum / 10);
         while ($temp != 0) {
             $count++;
             $temp = floor($temp / 10);
         }
         return $count;
     }

     /**
      * 获取数组的最大值
      * @return int|mixed] 数组的最大值
      */
     public function getMaxNum()
     {
         $max = 0;
         $length = count($this->arry);
         for ($i = 0; $i < $length; $i++) {
             if ($max < $this->arry[$i]) {
                 $max = $this->arry[$i];
             }
         }
         return $max;
     }

	 /**
      * 进行基数排序.
      * @param $loop 当前排序是第几轮循环
      */
     public function rSort($loop)
     {
         //求得当前循环次数对应的个，十，百..的值
         //比如，$loop = 1 则 $tempNum = 1
         //     $loop = 2 则 $tempNum = 10 依次类推
         $tempNum = (int) pow(10, $loop - 1);
         for ($i = 0; $i < $this->mElement; $i++) {
             //求出某位上的数字
             $row_index = ($this -> arry[$i] / $tempNum) % 10;
             for ($j = 0; $j < $this->mElement; $j++) {
                 if ($this->tempArr[$row_index][$j] == null) {
                     $this->tempArr[$row_index][$j] = $this->arry[$i];
                     break;
                 }
             }
         }

         $k = 0;
         for ($i = 0; $i < 10; $i++) {
             for ($j = 0; $j < $this->mElement; $j++) {
                 if ($this->tempArr[$i][$j] != null) {
                     $this->arry[$k] = $this->tempArr[$i][$j];
					 $k++;
                     $tempArr[$i][$j] = null;
                 }
             }
         }
     }
     /**
      * 基数排序.
      */
     public function mRadixSort()
     {
         $max = $this->getMaxNum();
         $loop = $this->getLoopTimes($max);
         //对每一位进行桶分配（1 表示个位，$loop 表示最高位）
         for ($i = 1; $i <= $loop; $i++) {
             $this->rSort($i);
         }
     }
 }

//下面是测试代码（按照规范应该将测试代码写到单独的文件中，但是为了方便查看，这里先写到这里）
$radixSort = new RadixSort(15);
$radixSort->add(10);
$radixSort->add(45);
$radixSort->add(5);
$radixSort->add(28);
$radixSort->add(37);
$radixSort->add(7);
$radixSort->add(5989);
$radixSort->add(34);
$radixSort->add(79);
$radixSort->add(6356);
$radixSort->add(45);
$radixSort->add(99);
$radixSort->add(454);
$radixSort->add(3);
$radixSort->add(67);
echo '排序前<br>';
$radixSort->display();
$radixSort->mRadixSort();
echo '排序后<br>';
$radixSort->display();
