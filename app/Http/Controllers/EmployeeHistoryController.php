<?php

namespace App\Http\Controllers;

Use Exception;
use Illuminate\Http\Request;
use App\Repositories\Employee\EmployeeHistoryInterface as EmployeeHistoryInterface;

class EmployeeHistoryController extends Controller
{
	private $employeeHistory;
	private $request;

    public function __construct(EmployeeHistoryInterface $employeeHistory, Request $request)
    {
        $this->employeeHistory = $employeeHistory;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setEmployeeHistory()
    {
    	try {
            
            $this->employeeHistory->setEmployeeHistory($this->request->ipaddress, $this->request->url, $this->request->date);

            return json_encode(['status' => true, 'message' => 'Added a new Employee visited URL']);
        } catch(Exception $e) {
            // dd($e);
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployeeHistory($ipaddress)
    {
    	try {
        	$result = $this->employeeHistory->getEmployeeHistory($ipaddress);

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
    public function unsetEmployeeHistory($ipaddress)
    {
    	try {
        	$this->employeeHistory->unsetEmployeeHistory($ipaddress);

            return json_encode(['status' => true, 'message' => 'Employee history is unset']);
        } catch(Exception $e) {
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}