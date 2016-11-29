<?php
/**
 * User: jalen
 * Date: 2016/11/28
 * Time: 13:27
 * 选择排序的实现
 */
class SelectSort
{
	var $arry;
	var $maxSize;
	var $mElement = 0;

	public function SelectSort($maxSize)
	{
		$this->arry = array($maxSize);//分配空间
		$this->maxSize = $maxSize;
	}

	/**
	 * 添加一个数到数组中
	 */
	public function add($int)
	{
		if ($this->mElement >= $this->maxSize) {
			return;
		}
		$this->arry[$this->mElement] = $int;
		$this->mElement++;
	}

	/**
	 * 打印输出当前的数组
	 */
	public function display()
	{
		for ($i = 0; $i < $this->mElement; $i++) {
			echo $this->arry[$i];
			echo " ";
		}
		echo "<br>";
	}

	/**
	 * 交换
	 */
	public function swap($a, $b)
	{
		$temp = $this->arry[$a];
		$this->arry[$a] = $this->arry[$b];
		$this->arry[$b] = $temp;
	}

	/**
	 * 执行选择排序
	 */
	public function sort()
	{
		for ($out = 0; $out < $this->mElement; $out++) {
			$min = $out;
			for ($in = $out + 1; $in < $this->mElement; $in++) {
				//记录最小的那个值
				if ($this->arry[$in] < $this->arry[$min]) {
					$min = $in;
				}
			}
			if ($min != $out) {//如果记录的那个值不是当前循环最初的那个值，则交换
				$this->swap($out, $min);
			}
		}
	}
}
	//下面是测试代码（本来应该将测试代码写到单独的文件中，但是为了方便查看，这里先写到这里）
   $selectSort = new SelectSort(10);
   $selectSort->add(12);
   $selectSort->add(44);
   $selectSort->add(10);
   $selectSort->add(4);
   $selectSort->add(35);
   $selectSort->add(456);
   $selectSort->add(34);
   $selectSort->add(78);
   $selectSort->add(24);
   $selectSort->add(56);
   $selectSort->display();
   $selectSort->sort();//执行选择排序排序
   $selectSort->display();