<?

class ratio {
	var $history = Array();

	function ratio($history) {
		if (!$history||!is_array($history)) {
			echo "ratio클래스 생성파라미터 에러";
			exit;
		}
		$this->history = $history;
	}

	function getRatio($today) {
		foreach ($this->history as $day => $array_ratio) {
			if (($day <= $today) && ($day > $getRatioDay)) {
				$getRatioDay = $day;
				$getRatio = $array_ratio;
			}
		}

		if (!$getRatio) {
			echo $today." 설정된 이율이 없습니다.";
			exit;
		}

		return $getRatio;
	}
}

class interest {
	var $ratio;

	function interest($ratio_history) {
		$this->ratio = new ratio($ratio_history);
	}

	function getInterest($balance, $return_date, $last_trade_date, $end_date) {
		$start_date = $last_trade_date;
		for ($ymd = $start_date;$ymd < $end_date;$ymd = $this->AddDate($ymd, 1)) {
			if ($return_date <= $ymd) {
				$field = "D";
				$value[4]++;
				if (!$value[3]) $value[3] = $ymd;
			} else {
				$field = "N";
				$value[2]++;
				if (!$value[1]) $value[1] = $ymd;
			}

			$ratio = $this->ratio->getRatio($ymd);
			$array_ratio_days_type[$field][$ratio[$field]]++;

			$leap_sw = date("L", date2unixtime($ymd));
			if ($leap_sw == '1') {
				$arb[$field][$ratio[$field]][366]++;
			} else {
				$arb[$field][$ratio[$field]][365]++;
			}
		}

		if (sizeof($array_ratio_days_type)) {
			foreach ($array_ratio_days_type as $field => $array_ratio_days) {
				$subinterest = 0;
				foreach ($array_ratio_days as $ratio => $days) {
					//echo $ratio, "\t", $days, "\t", $arb[$field][$ratio][365], "\t", $arb[$field][$ratio][366], "<br>";
					//$subinterest += $this->getTermInterest($balance, $days, $ratio);
					$subinterest += $this->getTermInterest2($balance, $days, $ratio, $arb[$field][$ratio][365], $arb[$field][$ratio][366]);
				}

				if ($field == "N") {
					$value[5] += $subinterest;
				} else if ($field == "D") {
					$value[6] += $subinterest;
				}
			}
		}
		$value[5] = floor($value[5]);
		$value[6] = floor($value[6]);
		$value[0] = $value[5] + $value[6];

		return $value;
	}

	function getTermInterest($balance, $days, $ratio) {
		$ija = $balance * $days * $ratio / 36500;
		return $ija;
	}

	function getTermInterest2($balance, $days, $ratio, $days_365, $days_366) {
		$ija = ($balance * $days_365 * $ratio / 36500) + 
			   ($balance * $days_366 * $ratio / 36600);
		return $ija;
	}

	function AddDate($today, $cnt) {
		$ymd = explode("-", $today);
		return date("Y-m-d", (mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0])+(86400*$cnt)));
	}
}

class contract_day {
	var $history = Array();

	function contract_day($history) {
		if (!$history || !is_array($history)) {
			echo "contract_day클래스 생성파라미터 에러";
			exit;
		}
		$this->history = $history;
	}

	function getContractDay($today) {
		foreach ($this->history as $day => $contract_day) {
//			echo ":", $day, ":", $contract_day, ":<br>";
			if (($day <= $today)&&($temp_day <= $day)) {
				$temp_day = $day;
				$getContractDay = $contract_day;
			}
		}

		if (!$getContractDay) {
			echo $today." 설정된 약정일이 없습니다.";
			exit;
		}

		return $getContractDay;
	}
}

class return_date {
	var $return_date;
	var $holiday = Array();
//계약일과 휴가 입력
	function return_date($return_date, $holiday) {
		$this->return_date = $return_date;
		$this->holiday = $holiday;
	}

	function getReturnDate() {
		return $this->return_date;
	}

	function setReturnDateSettle($today, $total_return_money, $settle_schedule) {
		$return_date_tmp = "";
		$schedule_money = 0;

		if (sizeof($settle_schedule)>0) {
			ksort($settle_schedule);
			foreach( $settle_schedule as $key => $value ) {
				if ($total_return_money>=$schedule_money) {
					$return_date_tmp = $key;
				}
				$schedule_money+= $value;
			}
		} else {
			$return_date_tmp = $today;
		}

		if (!$this->return_date || $return_date_tmp>$today) {
			$this->return_date = $return_date_tmp;
		}
	}

	function setReturnDate($contract_day, $today, $rack_money) {
		if ($rack_money < 10000) {
		//if ($rack_money == 0) {
			if (!$this->return_date || $this->return_date <= $this->AddDate($today, 10)) {
			//if (!$this->return_date || $this->return_date <= $this->AddDate($today, 7)) {
				$contract_day = sprintf("%02d", $contract_day);
				//$today = $this->AddDate($today, 8);
				$today = $this->AddDate($today, 11);
				while (true) {
					if (substr($today, -2) == $contract_day) {
						break;
					}

					if ($contract_day >= "28") {
						$ymd = explode("-", $today);
						if ($contract_day == "31" && $today == date("Y-m-t", mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0]))) {
							break;
						}

						if ($contract_day>$ymd[2] && $today == date("Y-m-t", mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0]))) {
							break;
						}

					}
					$today = $this->AddDate($today, 1);
				}

				while($this->checkHoliday($today)) {
					$today = $this->AddDate($today, 1);
				}
				$this->return_date = $today;
			}
		}
	}

	function AddDate($today, $cnt) {
		$ymd = explode("-", $today);
		return date("Y-m-d", (mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0])+(86400 * $cnt)));
	}

	function checkHoliday($today) {
		$ymds = explode("-", $today);
		if(!date("w", mktime(0, 0, 0, $ymds[1], $ymds[2], $ymds[0]))) return true;

		if (sizeof($this->holiday)) {
			if(in_array($today, $this->holiday)) return true;
		}

		return false;
	}
}

class member {
	var $contract_day;
	var $interest;
	var $balance;
	var $return_date;
	var $rack_money;
	var $miss_money;
	var $over_money;
	var $settle_interest;
	var $last_trade_date;
	var $settle_date = false;
	var $settle_schedule;

	function member($contract, $ratio, $balance, $return_date, $rack_money, $miss_money, $last_trade_date, $holiday, $over_money=0, $settle_interest=0, $settle_date="", $settle_schedule=Array()) {
		$this->contract_day = new contract_day($contract);
		$this->interest = new interest($ratio);
		$this->balance = $balance;
		$this->return_date = new return_date($return_date, $holiday);
		$this->rack_money = $rack_money;
		$this->miss_money = $miss_money;
		$this->last_trade_date = $last_trade_date;
		$this->over_money = $over_money;
		$this->settle_interest = $settle_interest;
		$this->settle_date = $settle_date;
		$this->settle_schedule = $settle_schedule;
	}

	function ReceiptOfMoney($today, $money, $total_money=0,$type) {
		$interest_info = $this->interest->getInterest($this->balance, $this->return_date->getReturnDate(), $this->last_trade_date, $today);

		$value[2] = $interest = $interest_info[5];
		$value[3] = $delay_interest = $interest_info[6];
		$value[4] = $interest_info[1];
		$value[5] = ($interest_info[2]) ? $interest_info[2] : 0 ;
		$value[6] = $interest_info[3];
		$value[7] = ($interest_info[4]) ? $interest_info[4] : 0 ;

		if ($this->balance == 0) {
			$value[5] = 0;
			$value[7] = 0;
		}
	
		if ($type != "30") {
			if ($this->miss_money) {
				if ($money > $this->miss_money) {
					$money -= $this->miss_money;
					$value[8] = $this->miss_money;
					$this->miss_money = 0;
				} else {
					$this->miss_money -= $money;
					$value[8] = $money;
					$money = 0;
				}
			} else {
				$value[8] = 0;
			}

			if ($this->rack_money) {
				if ($money > $this->rack_money) {
					$money -= $this->rack_money;
					$value[9] = $this->rack_money;
					$this->rack_money = 0;
				} else {
					$this->rack_money -= $money;
					$value[9] = $money;
					$money = 0;
				}
			} else {
				$value[9] = 0;
			}

			if ($delay_interest) {
				if ($money > $delay_interest) {
					$money -= $delay_interest;
					$value[10] = $delay_interest;
					$delay_interest = 0;
				} else {
					$delay_interest -= $money;
					$value[10] = $money;
					$money = 0;
				}
			} else {
				$value[10] = 0;
			}

			if ($interest) {
				if ($money > $interest) {
					$money -= $interest;
					$value[11] = $interest;
					$interest = 0;
				} else {
					$interest -= $money;
					$value[11] = $money;
					$money = 0;
				}
			} else {
				$value[11] = 0;
			}

			if ($this->settle_interest) {
				if ($money > $this->settle_interest) {
					$money -= $this->settle_interest;
					$value[12] = $this->settle_interest;
					$this->settle_interest = 0;
				} else {
					$this->settle_interest -= $money;
					$value[12] = $money;
					$money = 0;
				}
			} else {
				$value[12] = 0;
			}
		}

		if ($money > 0) {
			if ($money > $this->balance) {
				$value[1] = $this->balance;
				$this->over_money += ( $money - $this->balance );
				$this->balance = 0;
			} else {
				$value[1] = $money;
				$this->over_money = 0;
				$this->balance -= $money;
			}
			$money = 0;
		} else {
			$value[1] = 0;
		}

		if ($type != "30") {
			$this->rack_money = $this->rack_money + $delay_interest + $interest + $this->miss_money;
			$this->miss_money = 0;
		} else {
			$this->miss_money = $this->rack_money + $delay_interest + $interest + $this->miss_money;
			$this->rack_money = 0;
		}
		$value[0] = $value[8] + $value[9] + $value[10] + $value[11] + $value[12];

//		echo ":", $this->settle_date, ":", $this->settle_schedule, ":", $type, ":", $today, ":<br>";

		if ($this->settle_date && $this->settle_schedule) {
			$this->return_date->setReturnDateSettle($today, $total_money, $this->settle_schedule);
		} else {
			if ($type != "30") {
				$this->return_date->setReturnDate($this->contract_day->getContractDay($today), $today, $this->rack_money);
			} else {
				$this->return_date->setReturnDate($this->contract_day->getContractDay($today), $today, $this->miss_money);
			}
		}
		$this->last_trade_date = $today;

		return $value;
	}

	function OutOfMoney($today, $money, $setReturnDateFlag=true, $miss_money=0, $no_interest_term=0) {
		if ($this->over_money>0) {
			if ($this->over_money > $money) {
				$this->over_money -= $money;
				return true;
			} else {
				$money -= $this->over_money;
				$this->over_money = 0;
			}
		}

		$interest_info = $this->interest->getInterest($this->balance, $this->return_date->getReturnDate(), $this->last_trade_date, $today);
		$interest = $interest_info[0];
		$total_interest = $interest + $this->rack_money + $this->miss_money + $this->settle_interest ;

		$this->miss_money = $total_interest + $miss_money;
		$this->rack_money = 0;
		$this->settle_interest = 0;

		if ($this->balance==0) {
			$setReturnDateFlag = true;
		}
		$this->balance += $money;

		global $REMOTE_ADDR;

		if ($setReturnDateFlag) {
			if ($no_interest_term > 0) {
				$trade_date = $this->return_date->AddDate($today, $no_interest_term);
			} else {
				$trade_date = $today;
			}
			$this->return_date->setReturnDate($this->contract_day->getContractDay($trade_date), $trade_date, 0);
		}
		$this->last_trade_date = $today;

		return true;
	}

	function SettleMember($today, $add_interest=0, $settle_schedule=Array()) {
		$this->settle_date = $today;
		$this->settle_schedule = $settle_schedule;

		$interest_info = $this->interest->getInterest($this->balance, $this->return_date->getReturnDate(), $this->last_trade_date, $today);
		$interest = $interest_info[0];
		$total_interest = $interest + $this->rack_money + $this->miss_money + $this->settle_interest ;

		$this->rack_money = 0;
		$this->miss_money = 0;
		$this->settle_interest = $total_interest + $add_interest;

		$this->return_date->setReturnDate($this->contract_day->getContractDay($today), $today, 0);

		return true;
	}

}

?>