<?php

namespace App\Repositories\Employee;

use App\Repositories\Employee\EmployeeInterface as EmployeeInterface;
use App\Employee;

class EmployeeRepository implements EmployeeInterface
{
    public $employee;

    public function __construct(Employee $employee) {
	    $this->employee = $employee;
    }

    public function setEmployee($empId, $name, $ipaddress)
    {
		// dd($empId, $name, $ipaddress);
        $this->employee->emp_id = $empId;
        $this->employee->emp_name = $name;
        $this->employee->ip_address = $ipaddress;
        $this->employee->save();
    }

    public function getEmployee($empId)
    {
    	$result = $this->employee->where('emp_id', $empId)->first();
    	
    	return ($result === null) ? 'Employee Not Found' : $result->toArray();
    }

    public function unsetEmployee($empId)
    {
        $this->employee->where('emp_id', $empId)->delete();
    }
}
