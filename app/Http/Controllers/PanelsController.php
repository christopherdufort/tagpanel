<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Redirect;
use Auth;
use Request;
use DB;
use App\Http\Requests;

class PanelsController extends Controller
{
    public function panels()
    {
        $locations = DB::table('tags')->select('tag_country')->groupBy('tag_country')->get();
        return view ('panels/panels')->with('locations', $locations);
    }
    /**
     * @param $country
     * @return view to display all the regions withing this country
     */
    public function regions($country)
    {
        $locations = DB::table('tags')->where('tag_country', $country)->select('tag_region','tag_country')->groupBy('tag_region')->get();
        //return $locations;
        return view ('panels/regions')->with('locations', $locations)->with('country',$country);
    }
    public function localities($country,$region)
    {
//        return $country . " + " . $region;
        $locations = DB::table('tags')->where('tag_country', $country)->where('tag_region', $region)->select('tag_city','tag_region','tag_country')->groupBy('tag_city')->get();
//        return $locations;

        return view ('panels/localities')->with('locations', $locations)->with('country',$country)->with('region',$region);
    }

    public function cities()
    {

    }
}
