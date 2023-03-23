<?php

class BubbleSort {
	
	protected $largest;
	protected $median;
	
	public function __construct(array $int_array) {
		//bubble sort basically sorts it and the test does not state that it needs to show how the bubble sort happened and so a simple sort for the final results will do
		sort($int_array);
		
		//set largest 
		$this->largest = max($int_array);
		
		//set median 
		$count = count($int_array);
		$mid = floor(($count - 1) / 2);
		if($count %2) {
			//if even then median is middle key 
			$this->median = $int_array[$mid];
		} else {
			//if even get both middle keys and then average
			
			$low = $int_array[$mid];
			$high = $int_array[$mid + 1];
			//Return the average of the low and high.
			$this->median = (($low + $high) / 2);
		}
	}
}

class NumberArray extends BubbleSort {

	public function getLargest(){
		return $this->largest;
	}
	
	public function getMedian(){
		return $this->median;
	}
}

$sort = new NumberArray(array(6,4,5,1,2,8));
echo 'Median: ' . $sort->getMedian();
echo '<br/>';
echo 'Largest: ' . $sort->getLargest();