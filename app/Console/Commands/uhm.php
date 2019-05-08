<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class uhm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:manage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage employees data from command line';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $contents = file_get_contents("php://stdin");
        // echo $contents;

        // trim more than one spaces
        $contents = preg_replace('/\s\s+/', ' ', $contents);
        $contents = explode(" ", $contents);

        // dd($contents);

        // validate empty commands
        // if (isset($contents[0]) && isset($contents[1]) && isset($contents[2]) && isset($contents[3]) && isset($contents[4])) {
        //     if (empty($contents[0]) && empty($contents[1]) && empty($contents[2]) && empty($contents[3]) && empty($contents[4])) {
        self::executeCommand($contents);
        //     } else {
        //         echo "Incorrect commands Please check";
        //     }
        // } else {
        //         echo "Incorrect commands Please check";
        // }
        // extract commands and parameters
        // make api call and capture response
        // display the response json out
    }

    /**
    EXECUTE COMMAND
    **/
    public static function executeCommand($contents)
    {
        // validate the order of commands
        if (($contents[0] === 'SET') && ($contents[1] == 'empdata') && (!empty($contents[2])) && (!empty($contents[3])) && (!empty($contents[4]))) {
            $data = [
            'empId'     => $contents[2],
            'name'      => $contents[3],
            'ipaddress' => $contents[4]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/set', $data);
        }

        if (($contents[0] === 'GET') && ($contents[1] == 'empdata') && (!empty($contents[2]))) {
            $data = [
                'ipaddress' => $contents[2]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/set', $data);
        }

        if (($contents[0] === 'UNSET') && ($contents[1] == 'empdata') && (!empty($contents[2]))) {
            $data = [
                'ipaddress' => $contents[2]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/unset', $data);
        }

        if (($contents[0] === 'SET') && ($contents[1] == 'empwebhistory') && (!empty($contents[2])) && (!empty($contents[3]))) {
            $data = [
                'url'      => $contents[2],
                'ipaddress' => $contents[3]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/history/set', $data);
        }

        if (($contents[0] === 'GET') && ($contents[1] == 'empwebhistory') && (!empty($contents[2]))) {
            $data = [
                'ipaddress' => $contents[2]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/history/get', $data);
        }

        if (($contents[0] === 'UNSET') && ($contents[1] == 'empwebhistory') && (!empty($contents[2]))) {
            $data = [
                'ipaddress' => $contents[2]
            ];
            self::outputData($contents, 'http://localhost:8000/employee/history/unset', $data);
        }
    }

    public static function outputData($contents, $url, $data)
    {
        $client = new Client();

        $res = $client->request('POST', $url, ['form_params' => $data]);

        echo $res->getBody()->getContents();
    }
}
