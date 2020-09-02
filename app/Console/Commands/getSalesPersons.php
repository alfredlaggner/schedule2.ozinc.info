<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SalesPerson;
use App\Driver;
use App\User;

class getSalesPersons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odoo:salespersons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $users = $odoo
            ->where('x_studio_function', '!=', '')
            ->where('id', '!=', 110)
            ->where('id', '!=', 111)
            ->fields(
                'id',
                'name',
                'email',
                'date_order',
                'phone',
                'x_studio_function',
                'x_studio_1099'
            )
            ->get('res.users');
// dd($users);
        for ($i = 0; $i < count($users); $i++) {

            $phone = "";
            if ($users[$i]['phone']) {
                if (substr($users[$i]['phone'], 0, 1) != '1') {
                    $phone = "1" . trim($users[$i]['phone']);
                } else {
                    $phone = $users[$i]['phone'];
                }
            }


        }
        $phone = "";
        for ($i = 0; $i < count($users); $i++) {
            $name = trim($users[$i]['name']);
            $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $first_name = trim(preg_replace('#' . $last_name . '#', '', $name));

            $phone = "";
            if ($users[$i]['phone']) {

                if (substr($users[$i]['phone'], 0, 1) != '1') {
                    $phone = "1" . trim($users[$i]['phone']);
                } else {
                    $phone = $users[$i]['phone'];
                }
            }
            $this->info($first_name);

            User::updateOrCreate(
                ['email' => $users[$i]['email']],
                [
                    'name' => $users[$i]['name'],
                    'sales_person_id' => $users[$i]['id'],
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone_number' => $phone,
                    'user_type' => $users[$i]['x_studio_function'],
                    'is_ten_ninety' => $users[$i]['x_studio_1099'] == 'true' ? 1 : 0,
                ]
            );

            /*
                            Driver::updateOrCreate(
                                ['name' => $users[$i]['name']],
                                [
                                    'sales_person_id' => $users[$i]['id'],
                                    'email' => $users[$i]['email'],
                                    'first_name' => $first_name,
                                    'last_name' => $last_name,
                                    'phone_number' => $phone
                                ]
                            );*/
        }
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['x_studio_function'] == 'salesperson') {
                $name = trim($users[$i]['name']);
                $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
                $first_name = trim(preg_replace('#' . $last_name . '#', '', $name));

                $phone = "";
                if ($users[$i]['phone']) {

                    if (substr($users[$i]['phone'], 0, 1) != '1') {
                        $phone = "1" . trim($users[$i]['phone']);
                    } else {
                        $phone = $users[$i]['phone'];
                    }
                }
                $this->info($first_name);

                SalesPerson::updateOrCreate(
                    ['email' => $users[$i]['email']],
                    [
                        'name' => $users[$i]['name'],
                        'sales_person_id' => $users[$i]['id'],
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'phone_number' => $phone,
                        'user_type' => $users[$i]['x_studio_function'],
                        'is_ten_ninety' => $users[$i]['x_studio_1099'] == 'true' ? 1 : 0,
                        'is_salesperson' => true

                    ]
                );
            }
        }


        $this->info(date_format(date_create(), 'Y-m-d H:i:s'));

    }

}
