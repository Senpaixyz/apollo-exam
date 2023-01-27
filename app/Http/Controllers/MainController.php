<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BreakdownModel;
use App\Models\RandomModel;

class MainController extends Controller
{
    
    public function __construct(){
        $this->minimum = 5;
        $this->maximum = 10;

        $this->names = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha',
        );

        $this->alphanumeric = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $this->seed = 1;
    }

    public function index(Request $request){

        $this->generateData(); // generate data

        $randomData = (object)$this->retrieveRandomData();


        $this->hideData(); // set flag to false after show

        return view('index',compact('randomData'));
    }


    private function generateData(){
        srand(\Carbon\Carbon::now()->valueOf());
        $randomNameRange = rand($this->minimum,$this->maximum);
        $randomCharRange = rand($this->minimum,$this->maximum);

        for($i = 0 ; $i < $randomNameRange; $i++){
            $name = $this->names[rand ( 0 , count($this->names) -1)];

            $randomData = RandomModel::create([
                'value' => $name,
                'flag'  => true
            ]);

            for($j = 0 ; $j < $randomCharRange; $j++){
                $chars =  substr(str_shuffle($this->alphanumeric), 0, 5);

                $breakdownData = BreakdownModel::create([
                    'value'     => $chars,
                    'random_id' => $randomData->id
                ]);

            }
        }


    }
    private function retrieveRandomData(){
        $random = RandomModel::with(['breakdown'])->where('flag',true)->get();
        return $random;
    }
    private function hideData(){
        RandomModel::where('flag',true)->update([
            'flag'  => false
        ]);
    }


}
