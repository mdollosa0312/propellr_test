<?php

class Fibonacci {
	
	private $start = 0;
	private $add = 1;
	private $val;
	private $result;
	
	function result(int $count){
		
		if($count > 20){
			$this->result = 'Value must be from 1-20';
		} else {		
			for($x=0; $x<= $count; $x++){
				if($this->start > 0){
					$this->result .= ', ';
				}
				$this->result .= $this->start;
				
				$this->val = $this->start + $this->add;
				$this->start = $this->add;
				$this->add = $this->val;
			}
		}
		
		echo $this->result;
	}
}

$fib = new Fibonacci();
$fib->result(20);