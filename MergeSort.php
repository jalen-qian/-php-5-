<?php
/**
 * User: jalen（钱文军）
 * E-mail: qianwenjun@yaochufa.com
 * Date: 2016/11/28
 * Time: 14:51
 * 五大排序算法之归并排序
 * 归并排序：将两个有序的序列归并为一个有序的序列。
 * 这两个有序的序列又可以分为各自的两部份，通过归并排序，依次类推，直到分成最小的单个元素序列（递归思想），
 * 归并排序的基本条件：单个元素的数组是有序的。
 */
class MergeSort
{
	var $arry;
	var $maxSize;
	var $mElement = 0;
	//定义一个work数组，归并时会利用这个work数组来调整元素的位置
	var $work;

	public function MergeSort($maxSize)
	{
		$this->arry = array($maxSize); //分配空间
		$this->maxSize = $maxSize;
		$this->work = array($maxSize);//为work数组分配空间
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

	public function rectMergeSort(){
		$first = 0;
		$second = 14;
		$this->mMergeSort($first,$second);
	}
	/**
	 * 执行归并排序
	 * @param $lower 归并的部分首个元素下标
	 * @param $upper 归并的部分最后一个元素下标
	 */
	public function mMergeSort($lower,$upper){
		if($lower == $upper){
			return;//当前数组只含有一个元素，不执行
		}else{
			$middle = (int)(($lower + $upper)/2);//将当前数组分为两个部分
			$this->mMergeSort($lower,$middle);//先排序左边的部分
			$this->mMergeSort($middle + 1,$upper);//再排序右边的部分
			//执行归并
			$this->merge($lower,$middle+1,$upper);
		}
	}

	/**
	 * 执行归并，将两个有序的数组归并为一个有序的数组
	 * @param $firstLower 第一个有序数组的首元素下标
	 * @param $secondLower 第二个有序数组的首元素下标
	 * @param $secondUpper 第二个有序数组的尾元素下标
	 */
	public function merge($firstLower,$secondLower,$secondUpper){
		//中间值，第一个元素的尾元素下标
		$firstUpper = $secondLower - 1;
		$count = $secondUpper - $firstLower + 1;//所有的元素个数
		$indexFirst = $firstLower;//第一个数组的下标
		$indexSecond = $secondLower;//第二个数组的下标
		$indexWork = $indexFirst;//work数组的下标
		//当两个数组的下标都没有超过范围时,归并
		while($indexFirst <= $firstUpper && $indexSecond <= $secondUpper){
		   	if($this->arry[$indexFirst] < $this->arry[$indexSecond]){
				$this->work[$indexWork] = $this->arry[$indexFirst];
				$indexWork ++;
				$indexFirst ++;
			}else{
				$this->work[$indexWork] = $this->arry[$indexSecond];
				$indexWork ++;
				$indexSecond ++;
			}
		}
		//当第一个数组的下标超过了范围，而第二个数组的下标没有超过范围时，将第二个数组中的元素直接拷贝到工作数组末尾
		while($indexFirst > $firstUpper && $indexSecond <= $secondUpper){
			$this->work[$indexWork] = $this->arry[$indexSecond];
			$indexWork ++;
			$indexSecond ++;
		}

		//当第一个数组的下标没有超过范围，而第二个数组的下标超过范围时，将第一个数组中的元素直接拷贝到工作数组末尾
		while($indexFirst <= $firstUpper && $indexSecond > $secondUpper){
			$this->work[$indexWork] = $this->arry[$indexFirst];
			$indexWork ++;
			$indexFirst ++;
		}
		//最后，将work中归并好的元素依次拷贝到arry中
		for($i = 0; $i < $count; $i++){
			$this->arry[$firstLower + $i] = $this->work[$firstLower + $i];
		}
	}


}

//下面是测试代码（按照规范应该将测试代码写到单独的文件中，但是为了方便查看，这里先写到这里）
$mergeSort = new MergeSort(15);
$mergeSort->add(10);
$mergeSort->add(45);
$mergeSort->add(5);
$mergeSort->add(28);
$mergeSort->add(37);
$mergeSort->add(7);
$mergeSort->add(59);
$mergeSort->add(34);
$mergeSort->add(79);
$mergeSort->add(63);
$mergeSort->add(45);
$mergeSort->add(99);
$mergeSort->add(454);
$mergeSort->add(3);
$mergeSort->add(67);
echo '排序前<br>';
$mergeSort->display();
$mergeSort->rectMergeSort();
echo '排序后<br>';
$mergeSort->display();
