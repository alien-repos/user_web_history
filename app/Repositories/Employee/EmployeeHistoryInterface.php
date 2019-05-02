<?php

namespace App\Repositories\Employee;

interface EmployeeHistoryInterface {

    public function setEmployeeHistory($ipaddress, $url, $date);

    public function getEmployeeHistory($ipaddress);

    public function unsetEmployeeHistory($ipaddress);
}