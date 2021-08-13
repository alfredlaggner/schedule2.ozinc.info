<?php

namespace App\Console\Commands;

use App\StockInventory;
use Illuminate\Console\Command;

class getStockInventory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odoo:stock_inventory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get inventory master model';

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
     * @return int
     */
    public function handle()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $stock_inventory = $odoo
            ->where('date', '>=', date('Y-m-d', strtotime("- 1 year")))
            ->fields(
                'id',
                'inventory_date',
                'display_name',
                'product_id',
                'state',
                'date',
                'total_qty',
                'line_ids',
                'partner_id'
            )
            ->get('stock.inventory');
         //   dd(count($stock_inventory->toarray()));
        for ($i = 0; $i < count($stock_inventory); $i++) {
/*            if (!is_array($stock_inventory[$i]['line_ids'])) {
                dd($stock_inventory[$i]['line_ids']);
                $line_ids = $stock_inventory[$i]['line_ids'][0];
            } else {
                $line_ids = $stock_inventory[$i]['line_ids'];
            }*/
            StockInventory::updateOrCreate(
                [
                    'ext_id' => $stock_inventory[$i]['id']
                ],
                [
                    'product_name' => $stock_inventory[$i]['product_id'][1],
                    'product_id' => $stock_inventory[$i]['product_id'][0],
                    'inventory_date' => $stock_inventory[$i]['date'],
                    'state' => $stock_inventory[$i]['state'],
                    'total_qty' => $stock_inventory[$i]['total_qty'],
              //      'line_ids' => $line_ids,
              //      'partner_id' => $stock_inventory[$i]['partner_id'][0],
                ]
            );
            $this->info($i);
        }
        $this->info(date_format(date_create(), 'Y-m-d H:i:s'));

        return 0;
    }
}
