<?php

namespace App\Repositories\Employee;

use App\Repositories\Employee\EmployeeHistoryInterface as EmployeeHistoryInterface;
use App\EmployeeHistory;

class EmployeeHistoryRepository implements EmployeeHistoryInterface
{
    public $employeeHistory;

    public function __construct(EmployeeHistory $employeeHistory) {
	    $this->employeeHistory = $employeeHistory;
    }

    public function setEmployeeHistory($ipaddress, $url, $date)
    {
		// dd($ipaddress, $url, $date);
        $this->employeeHistory->ip_address = $ipaddress;
        $this->employeeHistory->url = $url;
        $this->employeeHistory->date = date('Y-m-d', strtotime($date));
        $this->employeeHistory->created_at = date('Y-m-d H:i:s');

        $this->employeeHistory->save();
    }

    public function getEmployeeHistory($ipaddress)
    {
    	$result = $this->employeeHistory->where('ip_address', $ipaddress)->get();
    	
    	return ($result === null) ? 'Employee History Not Found' : $result->toArray();
    }

    public function unsetEmployeeHistory($ipaddress)
    {
        $this->employeeHistory->where('ip_address', $ipaddress)->delete();
    }
}
