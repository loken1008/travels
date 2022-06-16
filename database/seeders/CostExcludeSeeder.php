<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CostExclude;

class CostExcludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $costexcludes = [
            'International airfare',
            'Lunch and evening meals in Kathmandu (and in the case of an earlier return from the mountain than the scheduled itinerary)',
            'Extra night accommodation in Kathmandu because of early arrival, late departure, and early return from the mountain (due to any reason) than the scheduled itinerary',
            'Travel and rescue insurance',
            'Personal expenses (phone calls, laundry, bar bills, battery recharge, water bottle, hot shower during the trekking, etc.)',
            'Personal trekking equipment and clothing',
            'Any donation and monuments entrance fee',
            'Tips for guides and porters',
        ];
        for ($item = 0; $item < count($costexcludes); $item++) {
            foreach ($costexcludes as $costexclude) {
                $costexclude = new CostExclude();
                $costexclude->cost_exclude = $costexcludes[$item];
                $costexclude->save();
                $item += 1;
            }
        }
    }
}
