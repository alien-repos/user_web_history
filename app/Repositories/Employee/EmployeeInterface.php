<?php

namespace App\Repositories\Employee;

interface EmployeeInterface {

    public function setEmployee($empId, $name, $ipaddress);

    public function getEmployee($empId);

    public function unsetEmployee($empId);
}