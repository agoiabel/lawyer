<?php

namespace App\Classes;

class EndDate 
{
	/**
	 * Handle the process of getting end_date
	 * 
	 * @param  $start_date 
	 * @param  $number_of_daysr 
	 * @return 
	 */
	public function handle($start_date, $number_of_days, $user)
	{
        $today = \Carbon\Carbon::parse($start_date);
        $tmpDate = $today->addDay($number_of_days - 1)->format('Y-m-d');

		$i = 1;
		$nextBusinessDay = date('Y-m-d', strtotime($tmpDate . ' +' . $i . ' Weekday'));

		$holidays = $this->getHolidaysFrom();

		while (in_array($nextBusinessDay, $holidays)) {
		    $i++;
		    $nextBusinessDay = date('Y-m-d', strtotime($tmpDate . ' +' . $i . ' Weekday'));
		}

		return $nextBusinessDay;
	}

	/**
	 * Get individual holidays
	 * 
	 * @return ['2020-11-16', '2020-11-17']
	 */
	protected function getHolidaysFrom()
	{
		$holidays = [];

		foreach (\App\CourtHoliday::where('state', $this->state)->where('year', \App\CourtHoliday::CURRENT_YEAR)->get() as $key => $holiday) {
			if (is_null($holiday->start_date)) {
				$holidays[] = $holiday->end_date->format('Y-m-d');
				continue;
			}
			foreach (\Carbon\CarbonPeriod::create($holiday->start_date->format('Y-m-d'), $holiday->end_date->format('Y-m-d')) as $key => $date) {
				$holidays[] = $date->format('Y-m-d');
			};
		}

		return $holidays;
	}
}