<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use App\Charts\PieChart;

class IndexController extends Controller
{
    public function index(){
        //Get Json Data
        $path = storage_path().'/json/data.json';
        $json_decode = json_decode(file_get_contents($path), true);

        //Collect Json Data
        $collection = collect($json_decode['result']);

                //Task 1
        //Count by Gender with sort Key Ascending
        $gender = $collection->countBy('gender')->sortKeys();

        //Mapping gender
        $genders = $gender->map(function ($item, $key) {
            return (object) array(
                'id'    => $key,
                'label' => config('data.gender')[$key],
                'count' => $item
            );
        });

        //Task 2
        //Collect Master Profession
        $masterProfession = collect(config('data.profession'));
        $profession = array();


        foreach ($genders as $key => $value) {
            //Set Value to 0 Master Profession
            $master = $masterProfession->map(function($item, $key){
                return 0;
            });

            //Replace value profession with data json
            $data = $master->replace($collection->where('gender', $value->id)->countBy('profession')->all());
            $profession[$value->id] = $data;
        }

        //Task 3
        $labels = collect(config('data.city'))->values();
        $dataset = $collection->countBy('city')->sortKeys()->values();
        $chart = new PieChart;
        $chart->labels($labels);
        $chart->dataset('Statistik berdasarkan Kota', 'pie', $dataset);
        $chart->minimalist(true);
        $chart->displayLegend(true);
        $chart->title('', 14, '#666', true, "'Roboto','Helvetica Neue','Helvetica','Arial',sans-serif");

        //Task 4
        //Filter collection with education id beetween 5 and 7
        $person = $collection->whereBetween('education', [5, 7])->sortBy('name');

        //Collect Master Education
        $masterEducation = collect(config('data.education'));

        $person = $person->map(function ($item, $key) use ($masterEducation) {
            return (object)[
                'id' => $item['education'],
                'name' => Str::title($item['name']),
                'education' => $masterEducation[$item['education']]
            ];
        });

        return view('index', [
            'gender' => $gender,
            'genders' => $genders,
            'master_profession' => $masterProfession,
            'profession' => $profession,
            'chart' => $chart,
            'persons' => $person
        ]);
    }



}
