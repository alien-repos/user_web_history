<?php

namespace App\Http\Controllers;

Use Exception;
use Illuminate\Http\Request;
use App\Repositories\Employee\EmployeeInterface as EmployeeInterface;

class EmployeeController extends Controller
{
	private $employee;
	private $request;

    public function __construct(EmployeeInterface $employee, Request $request)
    {
        $this->employee = $employee;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setEmployee()
    {
    	try {
            
            $this->employee->setEmployee($this->request->empId, $this->request->name, $this->request->ipaddress);

            return json_encode(['status' => true, 'message' => 'Added a new Employee']);
        } catch(Exception $e) {
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployee($empId)
    {
    	try {
        	$result = $this->employee->getEmployee($empId);

            return json_encode(['status' => true, 'message' => $result]);
        } catch(Exception $e) {
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unsetEmployee($empId)
    {
    	try {
        	$this->employee->unsetEmployee($empId);

            return json_encode(['status' => true, 'message' => 'Employee is unset']);
        } catch(Exception $e) {
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}