<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CostInclude;

class CostIncludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $costincludes = [
            'Airport pick up drop service',
            'All land transportation as per itinerary',
            "2 night's hotel accommodation at Kathmandu in a deluxe hotel on a BB basis",
            'Guesthouse/tented accommodation according to given itinerary (sharing in a 2-bed room) and 3 meals (Breakfast, lunch, Dinner) during the trek',
            'Domestic air ticket (Kathmandu-Lukla-Kathmandu)',
            ' Domestic airport Tax',
            'Farewell dinner before the day of your departure from Nepal.',
            ' An experienced English-speaking trek leader (trekking guide), assistant trek leader (4 trekkers: 1 assistant guide), and Sherpa porters to carry luggage (2 trekkers: 1 porter) including their salary, insurance, equipment, flight, food, and lodging.',
            ' Down jacket, for a seasonal sleeping bag, Mountain Guide treks & Expedition kit bag/duffel bag, trekking map (down jacket and sleeping bag are to be returned after trip completion)',
            ' All necessary paperwork and permits (National Park permit, TIMS) ',
            ' A comprehensive medical kit.',
        ];
        for ($item = 0; $item < count($costincludes); $item++) {
            foreach ($costincludes as $costinclude) {
                $costinclude = new CostInclude();
                $costinclude->cost_include = $costincludes[$item];
                $costinclude->save();
                $item += 1;
            }
        }
    }
}
