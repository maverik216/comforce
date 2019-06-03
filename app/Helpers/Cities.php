<?php
//app/Helpers/Cities.php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Cities {
    /**
     * @param int $state_id State-id
     * 
     * @return string
     */
    public static function get_cities($state_id) {
        $cities = DB::table('cities')->where('state_id', $state_id)->get();
        $return = array();
        foreach($cities as $city){
            $return[] = array('id' => $city->id, 'name' =>$city->name);
        }
             
        return json_encode($return);
    }
}