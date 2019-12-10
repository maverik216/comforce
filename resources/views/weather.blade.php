<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style>
  @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
  @import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");

  body {
    font-family: 'Montserrat', sans-serif;
    background: #112233;
  }

  h1 {
    margin-top: 20px;
    font-size: 35px;
    font-weight: 400;
    color: #fff;
  }

  table{
    color: #fff;
  }
  .map {
    height: 370px;
    width: 100%;
    background: #fff;
    box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
  }
  .weather-card {
    margin: 60px auto;
    height: 370px;

    background: #fff;
    box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
  }

  .weather-card .top {
    position: relative;
    height: 370px;
    width: 100%;
    overflow: hidden;
    background: url("http://www.graciaviva.cat/png/big/16/162541_clouds-background-tumblr.jpg") no-repeat;
    background-size: cover;
    background-position: center center;
    text-align: center;
  }

  .weather-card .top .wrapper {
    padding: 30px;
    position: relative;
    z-index: 1;
  }

  .weather-card .top .wrapper .mynav {
    height: 20px;
  }

  .weather-card .top .wrapper .mynav .lnr {
    color: #fff;
    font-size: 20px;
  }

  .weather-card .top .wrapper .mynav .lnr-chevron-left {
    display: inline-block;
    float: left;
  }

  .weather-card .top .wrapper .mynav .lnr-cog {
    display: inline-block;
    float: right;
  }

  .weather-card .top .wrapper .heading {
    margin-top: 20px;
    font-size: 35px;
    font-weight: 400;
    color: #fff;
  }

  .weather-card .top .wrapper .location {
    margin-top: 20px;
    font-size: 21px;
    font-weight: 400;
    color: #fff;
  }

  .weather-card .top .wrapper .temp {
    margin-top: 20px;
  }

  .weather-card .top .wrapper .temp a {
    text-decoration: none;
    color: #fff;
  }

  .weather-card .top .wrapper .temp a .temp-type {
    font-size: 85px;
  }

  .weather-card .top .wrapper .temp .temp-value {
    display: inline-block;
    font-size: 85px;
    font-weight: 600;
    color: #fff;
  }

  .weather-card .top .wrapper .temp .deg {
    display: inline-block;
    font-size: 35px;
    font-weight: 600;
    color: #fff;
    vertical-align: top;
    margin-top: 10px;
  }

  .weather-card .top:after {
    content: "";
    height: 100%;
    width: 100%;
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
  }

  .weather-card .bottom {
    padding: 0 30px;
    background: #fff;
  }

  .weather-card .bottom .wrapper .forecast {
    overflow: hidden;
    margin: 0;
    font-size: 0;
    padding: 0;
    padding-top: 20px;
    max-height: 155px;
  }

  .weather-card .bottom .wrapper .forecast a {
    text-decoration: none;
    color: #000;
  }

  .weather-card .bottom .wrapper .forecast .go-up {
    text-align: center;
    display: block;
    font-size: 25px;
    margin-bottom: 10px;
  }

  .weather-card .bottom .wrapper .forecast li {
    display: block;
    font-size: 25px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.25);
    line-height: 1em;
    margin-bottom: 30px;
  }

  .weather-card .bottom .wrapper .forecast li .date {
    display: inline-block;
  }

  .weather-card .bottom .wrapper .forecast li .condition {
    display: inline-block;
    vertical-align: middle;
    float: right;
    font-size: 25px;
  }

  .weather-card .bottom .wrapper .forecast li .condition .temp {
    display: inline-block;
    vertical-align: top;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    font-weight: 400;
    padding-top: 2px;
  }

  .weather-card .bottom .wrapper .forecast li .condition .temp .deg {
    display: inline-block;
    font-size: 10px;
    font-weight: 600;
    margin-left: 3px;
    vertical-align: top;
  }

  .weather-card .bottom .wrapper .forecast li .condition .temp .temp-type {
    font-size: 20px;
  }

  .weather-card .bottom .wrapper .forecast li.active {
    color: rgba(0, 0, 0, 0.8);
  }

  .weather-card.rain .top {
    background: url("http://img.freepik.com/free-vector/girl-with-umbrella_1325-5.jpg?size=338&ext=jpg") no-repeat;
    background-size: cover;
    background-position: center center;
  }


  .wrap-drop {
    background: #e7ded5;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, .2);
    cursor: pointer;
    margin: 0 auto;
    max-width: 225px;
    padding: 1rem;
    position: relative;
    width: 75%;
    z-index: 3;
  }

  .wrap-drop::after {
    border-color: #695d52 transparent;
    border-style: solid;
    border-width: 10px 10px 0;
    content: "";
    height: 0;
    margin-top: -4px;
    position: absolute;
    right: 1rem;
    top: 50%;
    width: 0;
  }

  .wrap-drop .drop {
    background: #e7ded5;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, .2);
    display: none;
    left: 0;
    list-style: none;
    margin-top: 0;
    opacity: 0;
    padding-left: 0;
    pointer-events: none;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 2;
  }

  .wrap-drop .drop li a {
    color: #695d52;
    display: block;
    padding: 1rem;
    text-decoration: none;
  }

  .wrap-drop span {
    color: #928579;
  }

  .wrap-drop .drop li:hover a {
    background-color: #695d52;
    color: #e7ded5;
  }

  .wrap-drop.active::after {
    border-width: 0 10px 10px;
  }

  .wrap-drop.active .drop {
    display: block;
    opacity: 1;
    pointer-events: auto;
  }
</style>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="heading">Query the weather of the cities</h1>
    </div>
  </div>
  {!! Form::open(['id' => 'form1', 'method' => 'POST', 'route' => ['weather.store']]) !!}
  {!! Form::hidden('city', 'N/A', ['class' => 'form-control ', 'id' => 'city']) !!}
  <div class="row">
    <div class="col-12">
      <div class="wrap-drop" id="cities">
        <span>Select City</span>
        <ul class="drop">
          <li class="selected"><a>Select City</a></li>
          <li><a data-value="miami" href="#">Miami</a></li>
          <li><a data-value="orlando" href="#">Orlando</a></li>
          <li><a data-value="newyork" href="#">New York</a></li>
        </ul>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="row">
    <div class="col-4">
      <div class="weather-card one">
        <div class="top">
          <div class="wrapper">
            
            <h1 class="heading">{{$city}}, EEUU</h1>
            <h3 class="location">Humidity: {{$humidity}}</h3>
            <p class="temp">
              <span class="temp-value">{{$temp}}</span>
              <span class="deg">0</span>
              <a href="javascript:;"><span class="temp-type">C</span></a>
            </p>
          </div>
        </div>
        <div class="bottom">
          <div class="wrapper">
            <ul class="forecast">
              <a href="javascript:;"><span class="lnr lnr-chevron-up go-up"></span></a>
              <li class="active">
                <span class="date">Yesterday</span>
                <span class="lnr lnr-sun condition">
                  <span class="temp">23<span class="deg">0</span><span class="temp-type">C</span></span>
                </span>
              </li>
              <li>
                <span class="date">Tomorrow</span>
                <span class="lnr lnr-cloud condition">
                  <span class="temp">21<span class="deg">0</span><span class="temp-type">C</span></span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-8">
      <div class="weather-card">
      <div id="map"></div>
                    <style>
                     #map {
                       width: 100%;
                       height: 372px;
                       background-color: grey;
                     }
                   </style>
                   <script>
                     function initMap() {
                       var uluru = {lat: {{ $lat }}, lng: {{ $lon }}};
                       var map = new google.maps.Map(document.getElementById('map'), {
                         zoom: 12,
                         center: uluru,
                         scrollwheel: false
                       });
                       var marker = new google.maps.Marker({
                         position: uluru,
                         map: map
                       });
                     }
                   </script>
                   <script async defer
                   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcIid-c1snnPHBFS2zBwMN3JrUkm8FVHw&callback=initMap&sensor=false">
                   </script>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <h1 class="heading">History</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">

        <!--Table-->
        <table class="table">

<!--Table head-->
<thead>
  <tr>
    <th>#</th>
    <th class="th-sm">Place</th>
    <th class="th-sm">Date</th>
    <th class="th-sm">View</th>
  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
  @if (count($weathers) > 0)
  @foreach ($weathers as $weather)
  <tr data-entry-id="{{ $weather->id }}">

    <th  scope="row">{{ $weather->id }}</th>
    <td>{{ $weather->city }}</td>
    <td>{{ $weather->date }}</td>
    <td>
    <a href="{{ route('weather.edit',[$weather->id]) }}" class=""><i class="fa fa-mail-forward"></i></a>
    </td>

  </tr>
  @endforeach
  @else
  <tr>
    <td colspan="4">@lang('global.app_no_entries_in_table')</td>
  </tr>
  @endif
  
</tbody>
<!--Table body-->

</table>
<!--Table-->

      </div>
    </div>
  </div>
</div>
<script>
  function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.drop li');
    this.val = '';
    this.index = -1;
    this.initEvents();
  }

  DropDown.prototype = {
    initEvents: function() {
      var obj = this;
      obj.dd.on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active');
      });
      obj.opts.on('click', function() {
        var opt = $(this);
        obj.val = opt.text();
        obj.index = opt.index();
        obj.placeholder.text(obj.val);
        opt.siblings().removeClass('selected');
        opt.filter(':contains("' + obj.val + '")').addClass('selected');
      }).change();
    },
    getValue: function() {
      return this.val;
    },
    getIndex: function() {
      return this.index;
    }
  };

  $(function() {
    // create new variable for each menu
    var dd1 = new DropDown($('#cities'));
    // var dd2 = new DropDown($('#other-gases'));
    $(document).click(function() {
      // close menu on document click
      $('.wrap-drop').removeClass('active');
  
    });

    $("#cities a").click(function(){
        var city = $(this).attr('data-value')
        $("#city").val(city);
        $("#form1").submit();

    })
    
  });
</script>