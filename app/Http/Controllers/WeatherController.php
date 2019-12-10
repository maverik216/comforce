<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    private $url;
    private $appId;
    private $consumer;
    private $secret;
    private function secure()
    {
       
        $this->url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
        $this->appId = 'eQVaNM58';
        $this->consumer = 'dj0yJmk9eVpQN01YZDk1UEV5JmQ9WVdrOVpWRldZVTVOTlRnbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PTc3';
        $this->secret = '2032ee03cad0ca4dd37c8e01bb1f1811dfe13f2e';
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
       


        $lat = '0';
        $lon = '0';
        $city = "Waiting";
        $humidity = 0;
        $temp = 0;
        $date = Carbon::now();

        $weathers = Weather::all();

        return view('weather', compact('city','date','temp','humidity','lat','lon','weathers'));
    }


    public function store(Request $request)
    {
        
        $response = $this->sendCurl($request->city);

        $lat = $response->location->lat; 
        $lon = $response->location->long; 
        $city = $response->location->city; 
        $humidity = $response->current_observation->atmosphere->humidity; 
        $temp = $response->current_observation->condition->temperature; 
         
        $date = Carbon::now();


        // var_dump($_REQUEST);exit;
        $weather = new Weather();
        $weather->city = $city;
        $weather->humidity = $humidity;
        $weather->temp = $temp;
        $weather->lon = $lon;
        $weather->lat = $lat;
        $weather->date = $date;

        $weather->save();

        
        return redirect()->route('weather.edit',$weather->id);
        //return view('weather',compact('city','date','temp','humidity','lat','lon','weathers'));
    }

    
    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $weather = Weather::findOrFail($id);

        $lat = $weather->lat;
        $lon = $weather->lon;
        $city = $weather->city;
        $humidity = $weather->humidity;
        $temp = $weather->temp;
        $date = $weather->date;
        
        $weathers = Weather::all();

        // var_dump($lat);exit;
        return view('weather', compact('city','date','temp','humidity','lat','lon','weathers'));
    }

    public function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }
    public function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value) {
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        }
        $r .= implode(', ', $values);
        return $r;
    }
    public function sendCurl($city)
    {
        $this->secure();
        $url = $this->url;
        $app_id = $this->appId;
        $consumer_key = $this->consumer;
        $consumer_secret = $this->secret;

        $query = array(
            'location' => $city,
            'format' => 'json',
        );
        $oauth = array(
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => uniqid(mt_rand(1, 1000)),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );
        $base_info = $this->buildBaseString($url, 'GET', array_merge($query, $oauth));
        $composite_key = rawurlencode($consumer_secret) . '&';
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;
        $header = array(
            $this->buildAuthorizationHeader($oauth),
            'X-Yahoo-App-Id: ' . $app_id
        );
        $options = array(
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url . '?' . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);
        //print_r($response);
        return $return_data = json_decode($response);
        // echo "<pre>";
        // print_r($return_data); 
        // echo "</pre>"; exit;
    }

}
