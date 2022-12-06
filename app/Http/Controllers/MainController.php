<?php

namespace App\Http\Controllers;

use App\Models\AnnouncedPuResult;
use App\Models\Lga;
use App\Models\Party;
use App\Models\PollingUnit;
use App\Models\State;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MainController extends Controller
{

    public function index(){
        return view('home');
    }


    public function pollingunit(){


        $polling_unit = AnnouncedPuResult::where('polling_unit_uniqueid', '12')
        ->first()->party_score;

        $party = AnnouncedPuResult::where('polling_unit_uniqueid', '12')
        ->first()->party_abbreviation;

        return view('pollingunit', compact('polling_unit', 'party'));


    }

    public function summedtotal(){



        $polling_unit = PollingUnit::select('polling_unit_id')
        ->where('lga_id', '1')
        ->get();

        $get_poll_unit = $polling_unit->pluck('polling_unit_id');


        $one_id = $get_poll_unit[0];
        $one = AnnouncedPuResult::where('polling_unit_uniqueid', $one_id )
        ->sum('party_score');

        $two_id = $get_poll_unit[1];
        $two = AnnouncedPuResult::where('polling_unit_uniqueid', $two_id )
        ->sum('party_score');

        $three_id = $get_poll_unit[2];
        $three = AnnouncedPuResult::where('polling_unit_uniqueid', $three_id )
        ->sum('party_score');

        $four_id = $get_poll_unit[3];
        $four = AnnouncedPuResult::where('polling_unit_uniqueid', $four_id )
        ->sum('party_score');


        $one_unit_name = PollingUnit::where([
            'polling_unit_id' => $one_id,
            'lga_id' => 1,

            ])->first()->polling_unit_name;




        $two_unit_name = PollingUnit::where('polling_unit_id', 5)
        ->where('lga_id',1)
        ->first()->polling_unit_name;

        $three_unit_name = PollingUnit::where('polling_unit_id', $three_id)
        ->where('lga_id',1)
        ->first()->polling_unit_name;


        $four_unit_name = PollingUnit::where('polling_unit_id', $four_id)
        ->where('lga_id',1)
        ->first()->polling_unit_name;



        $sum = $one + $two + $three + $four;





        $get_lga_id = PollingUnit::where('polling_unit_id', '8')
        ->first()->lga_id;

        $get_lga = Lga::where('lga_id', $get_lga_id)
        ->first()->lga_name;




        return view('summedtotal', compact('sum', 'get_lga', 'one_unit_name', 'one', 'two_unit_name', 'two', 'three_unit_name', 'three', 'four_unit_name', 'four'));
    }



    public function store(){


        $state= State::where('state_id', '25')
        ->get();

        $party= Party::all();

        $polling_unit = AnnouncedPuResult::orderBy('result_id', 'DESC')
        ->where('entered_by_user', 'Adejimi Tolulope')
        ->paginate(10);


        return view('store', compact('state', 'party', 'polling_unit'));

    }

    public function fetchlga(Request $request)
    {
        $state_id = $request->state_id;

        $data['lga'] = Lga::where('state_id', $state_id)
        ->get(["lga_name", "lga_id"]);

        return response()->json($data);
    }


    public function fetchpollingunit(Request $request)
    {
        $data['pollingunit'] = PollingUnit::where("lga_id",$request->lga_id)->get(["polling_unit_name", "polling_unit_id"]);
        return response()->json($data);
    }

    public function store_now(Request $request){


        $date = date("Y-m-d");

       $polling_unit_uniqueid =  $request->polling_unit_id;
       $lgas =  $request->lgas;
       $party_abbreviation =  $request->party_abbriviation;
       $party_score =  $request->party_score;


       $polling_name = PollingUnit::where('polling_unit_id',$polling_unit_uniqueid)
       ->where('lga_id', $lgas)
       ->first()->polling_unit_name;




       $store = new AnnouncedPuResult();
       $store->polling_unit_uniqueid = $polling_unit_uniqueid;
       $store->polling_unit_name = $polling_name;
       $store->party_abbreviation = $party_abbreviation;
       $store->party_score = $party_score;
       $store->entered_by_user = 'Adejimi Tolulope';
       $store->date_entered = $date;
       $store->save();

       return back()->with('message', 'Result has been successfully Stored');








    }


}
