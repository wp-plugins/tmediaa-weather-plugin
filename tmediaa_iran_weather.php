<?php

/*
Plugin Name: tmediaa_weather_plugin
Description: wordpress weather Widge, base on javascript.
Version: 1.0
Author: tmediaa
Author URI: tmediaa@gmail.com
License: GPLv2
*/

/********************************************/
/**********    ADD HEADER FILES     *********/
/********************************************/

function wp_css(){
	echo '<link rel="stylesheet" href="' . WP_PLUGIN_URL .'/'. dirname(plugin_basename( __FILE__ )).'/css/style.css" type="text/css" />'."\n";
	
	echo '<link rel="stylesheet" href="' . WP_PLUGIN_URL .'/'. dirname(plugin_basename( __FILE__ )).'/css/toggles.css" type="text/css" />'."\n";

	echo '<link rel="stylesheet" href="' . WP_PLUGIN_URL .'/'. dirname(plugin_basename( __FILE__ )).'/css/toggles-light.css" type="text/css" />'."\n";
    echo '<script>
        jQuery(document).ready(function(){
//////////////////////////////////////////////////////   
/*                  init  variables                */
/////////////////////////////////////////////////////         
            var refresh_selective;
            var refresh_geo;
            var wwo;
            var d ;
            var geoAPI;
            var lat_g;
            var lon_g;
            var city;
            var coordinate;
            var city_namee;
            var $j = jQuery; 
            var refresh = Number($j("#weather").attr("data-refresh"))*60000; 
                        var City_array=[
                    ["30.339167,48.304167","'. __('Abadan','tmediaa_iran_weather').'",],
                    ["38.42577,48.85931","'. __('Ab danan','tmediaa_iran_weather').'"],
                    ["38.42577,48.85931","'. __('Astara','tmediaa_iran_weather').'"],
                    ["36.470169,52.354031","'. __('Amol','tmediaa_iran_weather').'"],
                    ["36.140461,49.215149","'. __('Abhar','tmediaa_iran_weather').'"],
                    ["34.087681,49.686089","'. __('Arak','tmediaa_iran_weather').'"],
                    ["38.246471,48.295052","'. __('Ardabil','tmediaa_iran_weather').'"],
                    ["32.31,54.0175","'. __('Ardakan','tmediaa_iran_weather').'"],
                    ["37.555278,45.0725","'. __('Orumieh','tmediaa_iran_weather').'"],
                    ["33.718151,73.060547","'. __('Eslam abad qarb','tmediaa_iran_weather').'"],
                    ["35.560556,51.234722","'. __('Eslam shahr','tmediaa_iran_weather').'"],
                    ["37.076389,57.51","'. __('Esfarayen','tmediaa_iran_weather').'"],
                    ["32.65139,51.679192","'. __('Esfahan','tmediaa_iran_weather').'"],
                    ["36.231389,49.925833","'. __('Eqbalieh','tmediaa_iran_weather').'"],
                    ["36.320671,49.168468","'. __('Alvand','tmediaa_iran_weather').'"],
                    ["33.395828,49.694328","'. __('Ali Goodarz','tmediaa_iran_weather').'"],
                    ["31.31671,48.68438","'. __('Ahvaz','tmediaa_iran_weather').'"],
                    ["27.206841,60.69038","'. __('Iran Shahr','tmediaa_iran_weather').'"],
                    ["33.6375,46.422778","'. __('Ielam','tmediaa_iran_weather').'"],
                    ["33.827222,46.309722","'. __('Ievan','tmediaa_iran_weather').'"],
                    ["36.545811,52.6763","'. __('Babol','tmediaa_iran_weather').'"],
                    ["31.612778,55.410556","'. __('Bafq','tmediaa_iran_weather').'"],
                    ["35.9975,45.885278","'. __('Baneh','tmediaa_iran_weather').'"],
                    ["37.477699,57.323292","'. __('Bujnurd','tmediaa_iran_weather').'"],
                    ["29.266667,51.216667","'. __('Borazjan','tmediaa_iran_weather').'"],
                    ["33.892521,48.75629","'. __('Burujerd','tmediaa_iran_weather').'"],
                    ["31.964291,51.291801","'. __('Burujen','tmediaa_iran_weather').'"],
                    ["37.470211,49.47224","'. __('Bandar E Anzali','tmediaa_iran_weather').'"],
                    ["28.922041,50.833092","'. __('Bandar E Bushehr','tmediaa_iran_weather').'"],
                    ["36.898418,54.066811","'. __('Bandar E Torkaman','tmediaa_iran_weather').'"],
                    ["27.183333,56.266667","'. __('Bandar Abbas','tmediaa_iran_weather').'"],
                    ["29.579167,50.516944","'. __('Bandar E Genaveh','tmediaa_iran_weather').'"],
                    ["26.563542,54.882332","'. __('Bandar E Lengeh','tmediaa_iran_weather').'"],
                    ["32.880299,59.210411","'. __('Birjand','tmediaa_iran_weather').'"],
                    ["39.640221,47.920181","'. __('Pars Abad','tmediaa_iran_weather').'"],
                    ["36.069722,49.695833","'. __('Takestan','tmediaa_iran_weather').'"],
                    ["38.080978,46.290119","'. __('Tabriz','tmediaa_iran_weather').'"],
                    ["35.273889,59.219444","'. __('Torbat Heidarieh','tmediaa_iran_weather').'"],
                    ["34.548056,48.446944","'. __('Toiserkan','tmediaa_iran_weather').'"],
                    ["35.696111,51.423056","'. __('Tehran','tmediaa_iran_weather').'"],
                    ["34.774819,50.516146","'. __('Jafarieh','tmediaa_iran_weather').'"],
                    ["28.5,53.560556","'. __('Jahrom','tmediaa_iran_weather').'"],
                    ["28.678056,57.740556","'. __('Jiroft','tmediaa_iran_weather').'"],
                    ["25.291944,60.643056","'. __('Chabahar','tmediaa_iran_weather').'"],
                    ["33.48407,48.35252","'. __('Khoram Abad','tmediaa_iran_weather').'"],
                    ["36.203056,49.186944","'. __('Khoramdareh','tmediaa_iran_weather').'"],
                    ["37.625696,48.523602","'. __('Khalkhal','tmediaa_iran_weather').'"],
                    ["33.639488,50.07082","'. __('Khomein','tmediaa_iran_weather').'"],
                    ["32.700278,51.521111","'. __('Khomeini Shahr','tmediaa_iran_weather').'"],
                    ["28.654167,51.38","'. __('Khormoj','tmediaa_iran_weather').'"],
                    ["38.550278,44.952222","'. __('Khoi','tmediaa_iran_weather').'"],
                    ["36.168333,54.348056","'. __('Damqan','tmediaa_iran_weather').'"],
                    ["32.382992,48.39819","'. __('Dezful','tmediaa_iran_weather').'"],
                    ["27.440833,57.1925","'. __('Dehbarez','tmediaa_iran_weather').'"],
                    ["30.795,50.564444","'. __('Dehdasht','tmediaa_iran_weather').'"],
                    ["32.694167,47.267778","'. __('Dehloran','tmediaa_iran_weather').'"],
                    ["30.358611,50.798056","'. __('Dogonbadan','tmediaa_iran_weather').'"],
                    ["33.493333,49.075","'. __('Durud','tmediaa_iran_weather').'"],
                    ["37.280833,49.583056","'. __('Rasht','tmediaa_iran_weather').'"],
                    ["30.406667,55.993889","'. __('Rafsanjan','tmediaa_iran_weather').'"],
                    ["31.03845,61.496181","'. __('Zabol','tmediaa_iran_weather').'"],
                    ["29.496389,60.862778","'. __('Zahedan','tmediaa_iran_weather').'"],
                    ["36.67094,48.485111","'. __('Zanjan','tmediaa_iran_weather').'"],
                    ["36.563333,53.06","'. __('Sari','tmediaa_iran_weather').'"],
                    ["35.021389,50.356667","'. __('saveh','tmediaa_iran_weather').'"],
                    ["36.213718,57.670979","'. __('Sabzevar','tmediaa_iran_weather').'"],
                    ["36.241341,46.26733","'. __('Saqez','tmediaa_iran_weather').'"],
                    ["35.572269,53.396049","'. __('Semnan','tmediaa_iran_weather').'"],
                    ["35.314444,46.992222","'. __('Sanandaj','tmediaa_iran_weather').'"],
                    ["29.451944,55.681389","'. __('Sirjan','tmediaa_iran_weather').'"],
                    ["36.418056,54.976389","'. __('Shahrud','tmediaa_iran_weather').'"],
                    ["35.583333,51.433333","'. __('Shahr E Rei','tmediaa_iran_weather').'"],
                    ["32.325556,50.864444","'. __('Shahre Kord','tmediaa_iran_weather').'"],
                    ["29.616667,52.533333","'. __('Shiraz','tmediaa_iran_weather').'"],
                    ["37.398209,57.925701","'. __('Shirvan','tmediaa_iran_weather').'"],
                    ["36.907275,54.819632","'. __('Ali Abad Katool','tmediaa_iran_weather').'"],
                    ["32.256944,50.560833","'. __('Farsan','tmediaa_iran_weather').'"],
                    ["26.888359,31.316471","'. __('Ferdos','tmediaa_iran_weather').'"],
                    ["32.271667,50.98","'. __('Farokh Shahr','tmediaa_iran_weather').'"],
                    ["36.463056,52.86","'. __('Qaem Shahr','tmediaa_iran_weather').'"],
                    ["33.726667,59.184444","'. __('Qaen','tmediaa_iran_weather').'"],
                    ["36.266819,50.003811","'. __('Qazvin','tmediaa_iran_weather').'"],
                    ["34.64,50.876389","'. __('Qom','tmediaa_iran_weather').'"],
                    ["32.755556,36.616667","'. __('Qanavat','tmediaa_iran_weather').'"],
                    ["36.114722,48.591111","'. __('Qiedar','tmediaa_iran_weather').'"],
                    ["29.619444,51.654167","'. __('Kazeroon','tmediaa_iran_weather').'"],
                    ["33.98399,51.43647","'. __('Kashan','tmediaa_iran_weather').'"],
                    ["35.82711,50.98037","'. __('Karaj','tmediaa_iran_weather').'"],
                    ["30.28027,57.06702","'. __('Kerman','tmediaa_iran_weather').'"],
                    ["34.314167,47.065","'. __('Kerman Shah','tmediaa_iran_weather').'"],
                    ["34.502892,47.955711","'. __('Kangavar','tmediaa_iran_weather').'"],
                    ["34.393889,50.864167","'. __('Kahak','tmediaa_iran_weather').'"],
                    ["36.838611,54.434722","'. __('Gorgan','tmediaa_iran_weather').'"],
                    ["35.218333,52.340833","'. __('Garmsar','tmediaa_iran_weather').'"],
                    ["36.974333,56.291981","'. __('Garmeh Jajarm','tmediaa_iran_weather').'"],
                    ["37.25,55.167222","'. __('Gonbad','tmediaa_iran_weather').'"],
                    ["37.207222,50.003889","'. __('Lahijan','tmediaa_iran_weather').'"],
                    ["30.895,50.093056","'. __('Likak','tmediaa_iran_weather').'"],
                    ["33.911111,50.453056","'. __('Mahalat','tmediaa_iran_weather').'"],
                    ["35.763247,50.931529","'. __('Mohammad Shahr','tmediaa_iran_weather').'"],
                    ["37.3891667,46.2375","'. __('Maraqeh','tmediaa_iran_weather').'"],
                    ["38.425098,45.76965","'. __('Marand','tmediaa_iran_weather').'"],
                    ["29.874167,52.8025","'. __('Marv Dasht','tmediaa_iran_weather').'"],
                    ["35.526944,46.176389","'. __('Marivan','tmediaa_iran_weather').'"],
                    ["38.398889,47.681944","'. __('MeshginShahr','tmediaa_iran_weather').'"],
                    ["36.3,59.6","'. __('Mashhad','tmediaa_iran_weather').'"],
                    ["34.296944,48.823611","'. __('Malayer','tmediaa_iran_weather').'"],
                    ["36.76405,45.723789","'. __('Mahabad','tmediaa_iran_weather').'"],
                    ["36.969444,46.102778","'. __('Miando Ab','tmediaa_iran_weather').'"],
                    ["37.421111,47.715","'. __('Mianeh','tmediaa_iran_weather').'"],
                    ["32.22757,54.015331","'. __('Meibod','tmediaa_iran_weather').'"],
                    ["27.134899,57.086319","'. __('Minab','tmediaa_iran_weather').'"],
                    ["32.63393,51.3578","‌'. __('Najaf Abad','tmediaa_iran_weather').'"],
                    ["35.952222,50.6075","'. __('Nazar Abad','tmediaa_iran_weather').'"],
                    ["34.188611,48.376944","'. __('Nahavand','tmediaa_iran_weather').'"],
                    ["31.541944,60.036389","'. __('Nehbandan','tmediaa_iran_weather').'"],
                    ["36.213333,58.795833","'. __('Neishabur','tmediaa_iran_weather').'"],
                    ["34.272222,47.586111","'. __('Harsin','tmediaa_iran_weather').'"],
                    ["35.961944,50.68","'. __('Hasht Gerd','tmediaa_iran_weather').'"],
                    ["34.8,48.516667","'. __('Hamedan','tmediaa_iran_weather').'"],
                    ["30.668333,51.588056","'. __('Yasuj','tmediaa_iran_weather').'"],
                    ["31.89661,54.36068","'. __('Yazd','tmediaa_iran_weather').'"]
                    ];

//////////////////////////////////////////////////////   
/*                 show loading UI                */
/////////////////////////////////////////////////////                
            function loading(){
                $j("#loading p").text("'. __('Loading...','tmediaa_iran_weather').'");
                $j("#con").hide();
                $j("#loading").show();
            }
//////////////////////////////////////////////////////   
/*                  hide Loading  &    
                    show data fetched from server  */
/////////////////////////////////////////////////////       
            function contain(){
                
                $j("#loading").hide();
                $j("#con").show();
            }
//////////////////////////////////////////////////////   
/*                  find admin preferances         */
/////////////////////////////////////////////////////  

        //plugin type & forecast type     
            var plugin_type = $j("#weather").attr("data-plugintype");
            var forecast_type = $j("#weather").attr("data-forecasttype");

            if(plugin_type != "geo"){

                selective();
            }
            else{
                geo();
            }
         
        // initialize toggle bottn  
            
            if(plugin_type != "both"){
                $j(".toggle-light").hide();
            }

        if(plugin_type == "both"){
             $j(".toggle").toggles({
                drag: true, // can the toggle be dragged
                click: true, // can it be clicked to toggle
                text: {
                  on: "'. __('classic','tmediaa_iran_weather').'", // text for the ON position
                  off: "'. __('geo','tmediaa_iran_weather').'" // and off
                },
                on: false, // is the toggle ON on init
                animate: 250, // animation time
                transition: "ease-in-out", // animation transition,
                checkbox: null, // the checkbox to toggle (for use in forms)
                clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
                width: 65, // width used if not set in css
                height: 20, // height if not set in css
                type: "compact" // if this is set to "select" then the select style toggle will be used
              });
         }
        // toggle event
             $j(".toggle").on("toggle", function (e, active) {
                if (active) {
                    clearInterval(refresh_selective);
                    geo();
    
                } else {
                    clearInterval(refresh_geo);
                    selective();
    
                }
            });
       
//////////////////////////////////////////////////////   
/*                  find the day of week            */
/////////////////////////////////////////////////////       
            function gj(gdate){
                var weekday=new Array(7);
            weekday[0]="'. __('Sunday','tmediaa_iran_weather').'";
            weekday[1]="'. __('Monday','tmediaa_iran_weather').'";
            weekday[2]="'. __('Tuesday','tmediaa_iran_weather').'";
            weekday[3]="'. __('Wednesday','tmediaa_iran_weather').'";
            weekday[4]="'. __('Thursday','tmediaa_iran_weather').'";
            weekday[5]="'. __('Friday','tmediaa_iran_weather').'";
            weekday[6]="'. __('Saturday','tmediaa_iran_weather').'";
                gdate_split = gdate.split("-");
                
                d = new Date();
                d.setFullYear(gdate_split[0],gdate_split[1]-1,gdate_split[2]);
                return(weekday[d.getDay()]);

            }
//////////////////////////////////////////////////////   
/*             find wich icon to show               */
/////////////////////////////////////////////////////       

             function wc(code){
                if(code == "113"){
                    pic_url = "32";
                }
                   
                if(code == "116"){
                    pic_url = "34";
                }  
                if(code == "119") {
                   pic_url = "44";

                }   
                if(code == "122"){
                    pic_url = "26";
                }   
                if((code == "176")||(code == "185")||(code == "263")||(code == "266")||(code == "281")||(code == "284")||(code == "311")||(code == "353")||(code == "296")||(code == "293")){
                    pic_url = "9";
                }   
                if((code == "143")||(code == "248")){
                    pic_url = "20";
                }   
                if((code == "179")){
                    pic_url = "13";
                }   
                if((code == "371")){
                    pic_url = "14";
                }  
                if((code == "182")||(code == "317")||(code == "320")||(code == "326")||(code == "362")||(code == "365")){
                    pic_url = "5";
                }   
                if((code == "200")){
                    pic_url = "37";
                }   
                if((code == "386")||(code == "389")){
                    pic_url = "17";
                }  
                if((code == "230")){
                    pic_url = "7";
                }
                if((code == "350")){
                    pic_url = "15";
                }
                if((code == "299")||(code == "302")||(code == "314")||(code == "356")){
                    pic_url = "11";
                }
                if((code == "35")||(code == "38")){
                    pic_url = "12";
                }
                if((code == "359")){
                    pic_url = "8";
                }
                if((code == "338")||(code == "335")){
                    pic_url = "16";
                }
                if((code == "392")||(code == "395")){
                    pic_url = "48";
                }
                if((code == "260")){
                   pic_url = "49"; 
                }

        
                return pic_url;
            }
//////////////////////////////////////////////////////   
/*            core plugin function    
            connect to server and weather data     */
/////////////////////////////////////////////////////       
        function data(coordinate,city_namee){
            wwo ="http://free.worldweatheronline.com/feed/weather.ashx?q="+coordinate+"&format=json&num_of_days=5&key=53bbb260a2131108131303&callback=?";
            $j("#cityName").text(city_namee);
            $j("#cityName").attr("data-title",city_namee);
            $j.getJSON(wwo, function(data) {
                if(data.data.error){
                   $j("#loading p").text(data.data.error[0].msg);
                   $j("#loading img").hide();

                }
                else{
                       contain();
                        var i=0;
                        var gdate;   
                        // icon code init
                       code = wc(data.data.current_condition[0].weatherCode);
                       if($j("#icon").attr("src").search(".png") != -1){
                            var n=$j("#icon").attr("src").indexOf("/img/")+5;
                            var new_src = $j("#icon").attr("src").substr(0,n);
                            $j("#icon").attr("src", new_src  + code + ".png");
                        
                       }
                       else{
                            $j("#icon").attr("src", $j("#icon").attr("src")  + code + ".png");
                       }
                        //current weather data     
                       $j("#temper h3").html(data.data.current_condition[0].temp_C+ "&deg; ").text();
                       $j("#temper h3").attr("data-title",$j("#temper h3").text());
                       $j("#weti span").text(data.data.current_condition[0].humidity+"%");
                       $j("#weti span").attr("data-title",$j("#weti span").text());
                       $j("#wind span").text(data.data.current_condition[0].windspeedMiles);
                       $j("#wind span").append("Mhz");
                       $j("#wind span").attr("data-title",$j("#wind span").text());
                        //number of days to find data     
                    if($j("#weather").attr("data-forecasttype") != "current"){
                        $j.each(data.data.weather, function(arrayID,weather_group) {
                            i++;
                            gdate = weather_group.date;
                            code = wc(weather_group.weatherCode);
                            $j("#day"+i+ " h6").text(gj(gdate));
                            $j("#day"+i+ " h4").html(weather_group.tempMinC+"&deg;").text();
                            $j("#day"+i+ " h5").html(weather_group.tempMaxC+"&deg;").text();
                            // future weather icon      
                            if($j("#day"+i+ " img").attr("src").search(".png") != -1){
                                var n=$j("#day"+i+ " img").attr("src").indexOf("/img/")+5;
                                var new_src = $j("#day"+i+ " img").attr("src").substr(0,n);
                                $j("#day"+i+ " img").attr("src", new_src  + code + ".png");
                            }
                            else{
                           
                                $j("#day"+i+ " img").attr("src", $j("#day"+i+ " img").attr("src")  + code + ".png"); 
                            }     
                        });//end each 
                    }// end option if 
                    else{
                        $j("#bot").hide();
                    } // end else option  
                }//end else not error json
            }).fail(function() { 
                $j("#loading p").text("'. __('Failed to connect to server!','tmediaa_iran_weather').'");
                $j("#loading img").hide();
            });//end json
        }//end data function


//////////////////////////////////////////////////////   
/*    selective function for defined location      */
/////////////////////////////////////////////////////       
   
                function selective(){
                    
                    loading();

                    if($j("#cityName").attr("data-city")==""){
                        city = 39;
                    }
                    else{
                        city = $j("#cityName").attr("data-city");
                    }
                    if($j("#weather").attr("data-citytype") !="find"){

                        coordinate = City_array[city][0];
                        city_namee= City_array[city][1];

                    }
                    else{

                        if($j("#weather").attr("data-lat") == "" || $j("#weather").attr("data-lon") == ""){
                            
                            coordinate = City_array[city][0];
                            city_namee= City_array[city][1];
                        }
                        else{

                            coordinate = $j("#weather").attr("data-lat")+","+$j("#weather").attr("data-lon");
                            if($j("#weather").attr("data-cityname") == ""){
                                city_namee = "Here..." ;
                            }
                            else{
                                 city_namee = $j("#weather").attr("data-cityname") ;
                            }
                           
                        }
                    }
                    data(coordinate,city_namee);
                     refresh_selective = setInterval( function() 
                    {
                        data(coordinate,city_namee);
                    
                    }, refresh);//end setinterval
                }//end selective function


//////////////////////////////////////////////////////   
/*          geo function for geolocation           */
/////////////////////////////////////////////////////       
                function geo(){

                    loading();
                   
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(locationSuccess, locationError);
                    }
                    else{
                        $j("#loading p").text("'. __('Your browser does not support Geolocation!','tmediaa_iran_weather').'");
                        $j("#loading img").hide();
                    }

//////////////////////////////////////////////////////   
/*                 geo success function             */
/////////////////////////////////////////////////////       
                function locationSuccess(position) {
                    var lat_g = position.coords.latitude;
                    var lon_g = position.coords.longitude;
                    
                    
                    geoAPI ="http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat_g+","+lon_g+"&sensor=false";
                    $j.getJSON(geoAPI, function(r){
               
                        if(r.status == "OK"){
                        
                            var city_find = r.results[0].address_components[1].short_name;
                            
                            data(lat_g+","+lon_g, city_find);
                            refresh_geo = setInterval( function() 
                            {
                                data(lat_g+","+lon_g,city_find);

                            }, refresh);//end setinterval                   
                        } // end if status
                        else{
                            $j("#loading p").text(r.status);
                            $j("#loading img").hide();
                        }
                    }).fail(function() { 
                        $j("#loading p").text("'. __('Failed to connect to server','tmediaa_iran_weather').'");
                        $j("#loading img").hide();
                     });//end json
                }//end location success 

//////////////////////////////////////////////////////   
/*             geo Error function                  */
/////////////////////////////////////////////////////       
            function locationError(error){
                
                $j("#loading img").hide();
                switch(error.code) {
                    case error.TIMEOUT:
                         $j("#loading p").text("'. __('A timeout occured! Please try again!','tmediaa_iran_weather').'");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        $j("#loading p").text("'. __('We can\"t detect your location. Sorry!','tmediaa_iran_weather').'");
                        break;
                    case error.PERMISSION_DENIED:
                        $j("#loading p").text("'. __('Please allow geolocation access for this to work.','tmediaa_iran_weather').'");
                        break;
                    case error.UNKNOWN_ERROR:
                        $j("#loading p").text("'. __('An unknown error occured!','tmediaa_iran_weather').'");
                        break;
                }
            }// end locationError
        
        }//end geo function
    });//end ready 
</script>';
}
function wp_js(){
	wp_enqueue_script( 'toggle-script', plugin_dir_url( __FILE__ ) . 'js/toggles.min.js', array( 'jquery' ) );		
}
add_action('wp_head', 'wp_css');
add_action( 'wp_enqueue_scripts', 'wp_js' );
?>
<?php

/********************************************/
/***********    WIDGET CLASS     ************/
/********************************************/

class tmediaa_weather_plugin extends WP_Widget{
	function __construct(){
        load_plugin_textdomain('tmediaa_iran_weather', 'wp-content/plugins/'.dirname(plugin_basename( __FILE__ )).'/lang/');
		$params= array(
			'description'=>__('This is  weather widget via 3 option for choose your location','tmediaa_iran_weather'),
			'name'=>__('tmediaa weather plugin','tmediaa_iran_weather')
			);
		parent::__construct('tmediaa_weather_plugin','',$params);
        
	}
	public function form($instance){
		extract($instance);
		?>
		<p>
            <label for=""><?php _e('choose the palce to find weather data:','tmediaa_iran_weather'); ?></label><br>
            <input type="radio" name="<?php echo $this->get_field_name('plugin_type'); ?>" value="selective" <?php if($plugin_type == "selective"){ echo 'checked';} ?> /><label for=""> <?php _e('define a location','tmediaa_iran_weather'); ?> </label><br>
            <input type="radio" name="<?php echo $this->get_field_name('plugin_type'); ?>" value="geo" <?php if($plugin_type == "geo"){ echo 'checked';} ?>/> <label for=""><?php _e('geolocation','tmediaa_iran_weather'); ?></label><br>
            <input type="radio" name="<?php echo $this->get_field_name('plugin_type'); ?>" value="both" <?php if($plugin_type == "both" || $plugin_type == ""){ echo 'checked';} ?>/> <label for=""><?php _e('use both of them','tmediaa_iran_weather'); ?></label> 

        </p>

        <p>
            <label for=""><?php _e('define wich days to forecast','tmediaa_iran_weather'); ?></label><br>
            <input type="radio" name="<?php echo $this->get_field_name('forecast_type'); ?>" value="current" <?php if($forecast_type == "current"){ echo 'checked';} ?> /> <label for=""><?php _e('current weather','tmediaa_iran_weather'); ?></label><br>
            <input type="radio" name="<?php echo $this->get_field_name('forecast_type'); ?>" value="both" <?php if($forecast_type == "both" || $forecast_type == ""){ echo 'checked';} ?>/> <label for=""><?php _e('current weather and 4 days after','tmediaa_iran_weather'); ?></label>
        </p>

		<p>
			<label for=""><?php _e('choose your location from the menu:','tmediaa_iran_weather'); ?></label><br />
           
			<select 
			id="<?php echo $this->get_field_id('selectcity');?>"
			name="<?php echo $this->get_field_name('selectcity'); ?>">
				<option value="0" <?php if($selectcity == '0') {echo ' selected';} ?>><?php _e('Abadan','tmediaa_iran_weather'); ?></option>
                <option value="1" <?php if($selectcity == '1') {echo ' selected';} ?>><?php _e('Abdanan','tmediaa_iran_weather'); ?></option> 
                <option value="4" <?php if($selectcity == '4') {echo ' selected';} ?>><?php _e('Abhar','tmediaa_iran_weather'); ?> </option>
                <option value="16" <?php if($selectcity == '16') {echo ' selected';} ?>><?php _e('Ahvaz','tmediaa_iran_weather'); ?></option>
                <option value="75"<?php if($selectcity == '75') {echo ' selected';} ?>> <?php _e('Ali abad katool','tmediaa_iran_weather'); ?></option>
                <option value="15" <?php if($selectcity == '15') {echo ' selected';} ?>><?php _e('Aligoodarz','tmediaa_iran_weather'); ?> </option>
                <option value="14" <?php if($selectcity == '14') {echo 'selected';} ?>><?php _e('Alvand','tmediaa_iran_weather'); ?></option>
                <option value="3" <?php if($selectcity == '3') {echo ' selected';} ?>><?php _e('Amol','tmediaa_iran_weather'); ?></option>
                <option value="5" <?php if($selectcity == '5') {echo ' selected';} ?>><?php _e('Arak','tmediaa_iran_weather'); ?></option>
                <option value="6" <?php if($selectcity == '6') {echo ' selected';} ?>><?php _e('Ardabil','tmediaa_iran_weather'); ?> </option>
                <option value="7" <?php if($selectcity == '7') {echo ' selected';} ?>><?php _e('Ardakan','tmediaa_iran_weather'); ?> </option>
                <option value="2" <?php if($selectcity == '2') {echo ' selected';} ?>><?php _e('Astara','tmediaa_iran_weather'); ?></option>
                 <option value="20"<?php if($selectcity == '20') {echo ' selected';} ?>><?php _e('Babol','tmediaa_iran_weather'); ?> </option>
                <option value="21"<?php if($selectcity == '21') {echo ' selected';} ?>><?php _e('Bafq','tmediaa_iran_weather'); ?> </option> 
                
                <option value="30"<?php if($selectcity == '30') {echo ' selected';} ?>><?php _e('Bandar e abas','tmediaa_iran_weather'); ?> </option>
                <option value="27"<?php if($selectcity == '27') {echo ' selected';} ?>><?php _e('Bandar e anzali','tmediaa_iran_weather'); ?>  </option>
                <option value="28"<?php if($selectcity == '28') {echo ' selected';} ?>> <?php _e('Bandar e bushehr','tmediaa_iran_weather'); ?> </option>
                <option value="31"<?php if($selectcity == '31') {echo ' selected';} ?>><?php _e('Bandar e genaveh','tmediaa_iran_weather'); ?>  </option> 
                <option value="32"<?php if($selectcity == '32') {echo ' selected';} ?>> <?php _e('Bandar e lengeh','tmediaa_iran_weather'); ?> </option>
                <option value="29"<?php if($selectcity == '29') {echo ' selected';} ?>><?php _e('Bandar e torkaman','tmediaa_iran_weather'); ?>  </option>
                <option value="22"<?php if($selectcity == '22') {echo ' selected';} ?>> <?php _e('Baneh','tmediaa_iran_weather'); ?></option>
                <option value="33"<?php if($selectcity == '33') {echo ' selected';} ?>><?php _e('Birjand','tmediaa_iran_weather'); ?> </option>
                 <option value="24"<?php if($selectcity == '24') {echo ' selected';} ?>> <?php _e('Borazjan','tmediaa_iran_weather'); ?></option>
                <option value="23"<?php if($selectcity == '23') {echo ' selected';} ?>><?php _e('Bujnurd','tmediaa_iran_weather'); ?> </option>
                <option value="26"<?php if($selectcity == '26') {echo ' selected';} ?>><?php _e('Burujen','tmediaa_iran_weather'); ?> </option>
                <option value="25"<?php if($selectcity == '25') {echo ' selected';} ?>><?php _e('Burujerd','tmediaa_iran_weather'); ?> </option>
                <option value="43"<?php if($selectcity == '43') {echo ' selected';} ?>> <?php _e('Chabahar','tmediaa_iran_weather'); ?></option>
                <option value="51"<?php if($selectcity == '51') {echo ' selected';} ?>> <?php _e('Damqan','tmediaa_iran_weather'); ?></option> 
                 <option value="53"<?php if($selectcity == '53') {echo ' selected';} ?>> <?php _e('Dehbar','tmediaa_iran_weather'); ?></option>
                <option value="54"<?php if($selectcity == '54') {echo ' selected';} ?>> <?php _e('Dehdasht','tmediaa_iran_weather'); ?></option>
                <option value="55"<?php if($selectcity == '55') {echo ' selected';} ?>><?php _e('Dehloran','tmediaa_iran_weather'); ?></option>
                <option value="52"<?php if($selectcity == '52') {echo ' selected';} ?>> <?php _e('Dezfool','tmediaa_iran_weather'); ?></option>
                                          
                <option value="56"<?php if($selectcity == '56') {echo ' selected';} ?>><?php _e('Do gonbadan','tmediaa_iran_weather'); ?> </option>
                <option value="57"<?php if($selectcity == '57') {echo ' selected';} ?>><?php _e('Durud','tmediaa_iran_weather'); ?> </option>
               <option value="18" <?php if($selectcity == '18') {echo ' selected';} ?>><?php _e('Eilam','tmediaa_iran_weather'); ?> </option>
               <option value="13" <?php if($selectcity == '13') {echo ' selected';} ?>><?php _e('Eqbalieh','tmediaa_iran_weather'); ?> </option>
               <option value="12" <?php if($selectcity == '12') {echo ' selected';} ?>><?php _e('Esfahan','tmediaa_iran_weather'); ?> </option>
               <option value="11" <?php if($selectcity == '11') {echo ' selected';} ?>><?php _e('Esfarayen','tmediaa_iran_weather'); ?> </option> 
                 <option value="9" <?php if($selectcity == '9') {echo ' selected';} ?>><?php _e('Eslam abad qarb','tmediaa_iran_weather'); ?> </option>
                <option value="10" <?php if($selectcity == '10') {echo ' selected';} ?>><?php _e('Eslam shahr','tmediaa_iran_weather'); ?> </option>
                <option value="78"<?php if($selectcity == '78') {echo ' selected';} ?>><?php _e('Farokh shahr','tmediaa_iran_weather'); ?> </option>
                <option value="76"<?php if($selectcity == '76') {echo ' selected';} ?>> <?php _e('Farsan','tmediaa_iran_weather'); ?></option>
                <option value="77"<?php if($selectcity == '77') {echo ' selected';} ?>><?php _e('Ferdos','tmediaa_iran_weather'); ?> </option>
                <option value="94"<?php if($selectcity == '94') {echo ' selected';} ?>><?php _e('Garme jajarm','tmediaa_iran_weather'); ?> </option>
                 <option value="93"<?php if($selectcity == '93') {echo ' selected';} ?>><?php _e('Garmsar','tmediaa_iran_weather'); ?> </option>
                 <option value="95"<?php if($selectcity == '95') {echo ' selected';} ?>><?php _e('Gonbad','tmediaa_iran_weather'); ?> </option>
                <option value="92"<?php if($selectcity == '92') {echo ' selected';} ?>><?php _e('Gorgan','tmediaa_iran_weather'); ?> </option>
                <option value="119"<?php if($selectcity == '119') {echo ' selected';} ?>> <?php _e('Hamadan','tmediaa_iran_weather'); ?></option>
                <option value="117"<?php if($selectcity == '117') {echo ' selected';} ?>><?php _e('Harsin','tmediaa_iran_weather'); ?> </option>
                <option value="118"<?php if($selectcity == '118') {echo ' selected';} ?>> <?php _e('Hashtgerd','tmediaa_iran_weather'); ?></option>
                <option value="19"<?php if($selectcity == '19') {echo ' selected';} ?>><?php _e('Ievan','tmediaa_iran_weather'); ?> </option>
                <option value="17" <?php if($selectcity == '17') {echo ' selected';} ?>><?php _e('Iran shahr','tmediaa_iran_weather'); ?> </option>
                <option value="41"<?php if($selectcity == '41') {echo ' selected';} ?>> <?php _e('Jahrom','tmediaa_iran_weather'); ?></option> 
               <option value="40"<?php if($selectcity == '40') {echo ' selected';} ?>><?php _e('Jafarieh','tmediaa_iran_weather'); ?> </option>
                <option value="42"<?php if($selectcity == '42') {echo ' selected';} ?>> <?php _e('Jiroft','tmediaa_iran_weather'); ?></option>
                <option value="91"<?php if($selectcity == '91') {echo ' selected';} ?>><?php _e('Kahak','tmediaa_iran_weather'); ?> </option>
                <option value="90"<?php if($selectcity == '90') {echo ' selected';} ?>><?php _e('Kangavar','tmediaa_iran_weather'); ?> </option>
                <option value="87"<?php if($selectcity == '87') {echo ' selected';} ?>> <?php _e('Karaj','tmediaa_iran_weather'); ?></option>
                <option value="86"<?php if($selectcity == '86') {echo ' selected';} ?>> <?php _e('Kashan','tmediaa_iran_weather'); ?></option>
                <option value="85"<?php if($selectcity == '85') {echo ' selected';} ?>> <?php _e('Kazeron','tmediaa_iran_weather'); ?></option>
                <option value="88"<?php if($selectcity == '88') {echo ' selected';} ?>><?php _e('Kerman','tmediaa_iran_weather'); ?> </option>
                <option value="89"<?php if($selectcity == '89') {echo ' selected';} ?>><?php _e('Kermanshah','tmediaa_iran_weather'); ?> </option>
                <option value="46"<?php if($selectcity == '46') {echo ' selected';} ?>> <?php _e('Khalkhal','tmediaa_iran_weather'); ?></option>
                 <option value="50"<?php if($selectcity == '50') {echo ' selected';} ?>><?php _e('Khoi','tmediaa_iran_weather'); ?> </option>
                <option value="47"<?php if($selectcity == '47') {echo ' selected';} ?>> <?php _e('Khomein','tmediaa_iran_weather'); ?></option>
                <option value="48"<?php if($selectcity == '48') {echo ' selected';} ?>><?php _e('Khomeini shahr','tmediaa_iran_weather'); ?> </option>
                <option value="44"<?php if($selectcity == '44') {echo ' selected';} ?>><?php _e('Khoram abad','tmediaa_iran_weather'); ?> </option>
                <option value="45"<?php if($selectcity == '45') {echo ' selected';} ?>><?php _e('Khoram Dareh','tmediaa_iran_weather'); ?> </option>
               <option value="49"<?php if($selectcity == '49') {echo ' selected';} ?>><?php _e('Khurmoj','tmediaa_iran_weather'); ?> </option>
                <option value="96"<?php if($selectcity == '96') {echo ' selected';} ?>> <?php _e('Lahijan','tmediaa_iran_weather'); ?></option>
                <option value="97"<?php if($selectcity == '97') {echo ' selected';} ?>> <?php _e('Likak','tmediaa_iran_weather'); ?></option> 
                <option value="106"<?php if($selectcity == '106') {echo ' selected';} ?>><?php _e('Malayer','tmediaa_iran_weather'); ?> </option>
                <option value="98"<?php if($selectcity == '98') {echo ' selected';} ?>> <?php _e('Mahalat','tmediaa_iran_weather'); ?></option>
                <option value="107"<?php if($selectcity == '107') {echo ' selected';} ?>> <?php _e('Mahabad','tmediaa_iran_weather'); ?></option>
                <option value="101"<?php if($selectcity == '101') {echo ' selected';} ?>><?php _e('Marand','tmediaa_iran_weather'); ?> </option>
                <option value="100"<?php if($selectcity == '100') {echo ' selected';} ?>> <?php _e('Maraqeh','tmediaa_iran_weather'); ?></option>
                <option value="103"<?php if($selectcity == '103') {echo ' selected';} ?>><?php _e('Marivan','tmediaa_iran_weather'); ?> </option>
                <option value="102"<?php if($selectcity == '102') {echo ' selected';} ?>><?php _e('Marv dasht','tmediaa_iran_weather'); ?> </option>
                <option value="105"<?php if($selectcity == '105') {echo ' selected';} ?>> <?php _e('Mashhad','tmediaa_iran_weather'); ?></option>
                 <option value="110"<?php if($selectcity == '110') {echo ' selected';} ?>><?php _e('Meibod','tmediaa_iran_weather'); ?> </option>
                 <option value="104"<?php if($selectcity == '104') {echo ' selected';} ?>>‌<?php _e('Meshgin shahr','tmediaa_iran_weather'); ?> </option>
                <option value="108"<?php if($selectcity == '108') {echo ' selected';} ?>> <?php _e('Miando ab','tmediaa_iran_weather'); ?></option>
                <option value="109"<?php if($selectcity == '109') {echo ' selected';} ?>> <?php _e('Mianeh','tmediaa_iran_weather'); ?></option>
                <option value="111"<?php if($selectcity == '111') {echo ' selected';} ?>> <?php _e('Minab','tmediaa_iran_weather'); ?></option>
                <option value="99"<?php if($selectcity == '99') {echo ' selected';} ?>> <?php _e('Mohamad shahr','tmediaa_iran_weather'); ?></option>
                <option value="114"<?php if($selectcity == '114') {echo ' selected';} ?>><?php _e('Nahavand','tmediaa_iran_weather'); ?> </option>
                <option value="112"<?php if($selectcity == '112') {echo ' selected';} ?>> ‌<?php _e('Najaf Abad','tmediaa_iran_weather'); ?></option>
                <option value="113"<?php if($selectcity == '113') {echo ' selected';} ?>><?php _e('Nazar Abad','tmediaa_iran_weather'); ?> </option>
                <option value="115"<?php if($selectcity == '115') {echo ' selected';} ?>><?php _e('Nehbandan','tmediaa_iran_weather'); ?> </option>
                <option value="116"<?php if($selectcity == '116') {echo ' selected';} ?>> <?php _e('Neishabur','tmediaa_iran_weather'); ?></option>
                <option value="8" <?php if($selectcity == '8') {echo ' selected';} ?>><?php _e('Orumie','tmediaa_iran_weather'); ?></option>
                 <option value="34"<?php if($selectcity == '34') {echo ' selected';} ?>><?php _e('Pars abad','tmediaa_iran_weather'); ?>  </option>
                <option value="79"<?php if($selectcity == '79') {echo ' selected';} ?>> <?php _e('Qaem shahr','tmediaa_iran_weather'); ?>‌</option>
                <option value="80"<?php if($selectcity == '80') {echo ' selected';} ?>><?php _e('Qaen','tmediaa_iran_weather'); ?> </option>
                <option value="83"<?php if($selectcity == '83') {echo ' selected';} ?>> <?php _e('Qanavat','tmediaa_iran_weather'); ?></option>
                <option value="81"<?php if($selectcity == '81') {echo ' selected';} ?>> <?php _e('Qazvin','tmediaa_iran_weather'); ?></option>
                <option value="84"<?php if($selectcity == '84') {echo ' selected';} ?>><?php _e('Qidar','tmediaa_iran_weather'); ?> </option> 
                <option value="82"<?php if($selectcity == '82') {echo ' selected';} ?>><?php _e('Qom','tmediaa_iran_weather'); ?> </option>
                <option value="59"<?php if($selectcity == '59') {echo ' selected';} ?>><?php _e('Rafsanjan','tmediaa_iran_weather'); ?> </option>
                <option value="58"<?php if($selectcity == '58') {echo ' selected';} ?>><?php _e('Rasht','tmediaa_iran_weather'); ?> </option>
                <option value="65"<?php if($selectcity == '65') {echo ' selected';} ?>><?php _e('Sabzevar','tmediaa_iran_weather'); ?> </option>
                <option value="68"<?php if($selectcity == '68') {echo ' selected';} ?>> <?php _e('Sanandaj','tmediaa_iran_weather'); ?></option>
                <option value="66"<?php if($selectcity == '66') {echo ' selected';} ?>> <?php _e('Saqez','tmediaa_iran_weather'); ?></option>
                 <option value="63"<?php if($selectcity == '63') {echo ' selected';} ?>> <?php _e('Sari','tmediaa_iran_weather'); ?></option>
                <option value="64"<?php if($selectcity == '64') {echo ' selected';} ?>><?php _e('Saveh','tmediaa_iran_weather'); ?> </option>
                <option value="67"<?php if($selectcity == '67') {echo ' selected';} ?>><?php _e('Semnan','tmediaa_iran_weather'); ?> </option>
                <option value="72"<?php if($selectcity == '72') {echo ' selected';} ?>><?php _e('Shahre kord','tmediaa_iran_weather'); ?> </option>
                <option value="71"<?php if($selectcity == '71') {echo ' selected';} ?>> <?php _e('Shahr e rei','tmediaa_iran_weather'); ?></option> 
                <option value="70"<?php if($selectcity == '70') {echo ' selected';} ?>><?php _e('Shahrud','tmediaa_iran_weather'); ?> </option>
                <option value="73"<?php if($selectcity == '73') {echo ' selected';} ?>><?php _e('Shiraz','tmediaa_iran_weather'); ?> </option>
                <option value="74"<?php if($selectcity == '74') {echo ' selected';} ?>> <?php _e('Shirvan','tmediaa_iran_weather'); ?></option>
                <option value="69"<?php if($selectcity == '69') {echo ' selected';} ?>> <?php _e('Sirjan','tmediaa_iran_weather'); ?></option>
                <option value="36"<?php if($selectcity == '36') {echo ' selected';} ?>><?php _e('Tabriz','tmediaa_iran_weather'); ?> </option>
                <option value="35"<?php if($selectcity == '35') {echo ' selected';} ?>><?php _e('Takestan','tmediaa_iran_weather'); ?> </option>
                <option value="39"<?php if($selectcity == '39') {echo ' selected';} ?>> <?php _e('Tehran','tmediaa_iran_weather'); ?></option>
                <option value="38"<?php if($selectcity == '38') {echo ' selected';} ?>> <?php _e('Toiserkan','tmediaa_iran_weather'); ?></option>
                <option value="37"<?php if($selectcity == '37') {echo ' selected';} ?>><?php _e('Torbat heidarie','tmediaa_iran_weather'); ?>  </option>
                <option value="120"<?php if($selectcity == '120') {echo ' selected';} ?>><?php _e('Yasuj','tmediaa_iran_weather'); ?> </option>
                <option value="121"<?php if($selectcity == '121') {echo ' selected';} ?>><?php _e('Yazd','tmediaa_iran_weather'); ?> </option>
                <option value="60"<?php if($selectcity == '60') {echo ' selected';} ?>><?php _e('Zabol','tmediaa_iran_weather'); ?> </option>
                <option value="61"<?php if($selectcity == '61') {echo ' selected';} ?>><?php _e('Zahedan','tmediaa_iran_weather'); ?> </option> 
                <option value="62"<?php if($selectcity == '62') {echo ' selected';} ?>><?php _e('Zanjan','tmediaa_iran_weather'); ?> </option>
    
			</select>
            </p>
            <p>
            <input type="checkbox" name="<?php echo $this->get_field_name('city_type'); ?>" value="find" <?php if($city_type == "find"){ echo 'checked';} ?> /> <label for=""><?php _e('define prefered location','tmediaa_iran_weather'); ?></label><br>
            
            <label for="">::Latitude</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('lat');?>"
            name="<?php echo $this->get_field_name('lat'); ?>" value="<?php echo $lat?>"/><br />
            <label for="">::Longitude</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('lon');?>"
            name="<?php echo $this->get_field_name('lon'); ?>" value="<?php echo $lon?>"/><br />
            <label for="">::<?php _e('location name','tmediaa_iran_weather'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('city_name');?>"
            name="<?php echo $this->get_field_name('city_name'); ?>" value="<?php echo $city_name?>"/>
		</p>
        <p>
       
            <label for=""><?php _e('time to refresh the data ','tmediaa_iran_weather'); ?></label>
            <select id="<?php echo $this->get_field_id('refresh');?>"
            name="<?php echo $this->get_field_name('refresh'); ?>">
                <option value="5" <?php if($refresh == ""){echo 'selected';} ?>><?php _e('minute 5','tmediaa_iran_weather'); ?></option>
                <option value="10"><?php _e('minute 10','tmediaa_iran_weather'); ?></option>
                <option value="30"><?php _e('minute30','tmediaa_iran_weather'); ?></option>
                <option value="60"> <?php _e('1 hour','tmediaa_iran_weather'); ?></option>
                <option value="120"><?php _e('2 hour','tmediaa_iran_weather'); ?></option>
            </select>
        </p>
                
		
	<?php
	}
	public function widget($args, $instance){
		?>
		
			<?php
		extract($instance);
		
		?>

		<div id="weather" data-pluginType="<?php echo $plugin_type ?>" data-forecastType="<?php echo $forecast_type ?>"   data-refresh="<?php echo $refresh?>" data-citytype="<?php echo $city_type ?>" data-lat="<?php echo $lat ?>" data-lon="<?php echo $lon ?>" data-cityname="<?php echo $city_name ?>">
            <div id="loading">
                <p><?php _e('loading...','tmediaa_iran_weather'); ?></p>
                <img  src='<?php echo plugin_dir_url( __FILE__ )."img/loading.gif" ?>' alt="">
             </div>
            <div id="con">
                <div id="top" style="direction: ltr;">
                    <h1 id="cityName" data-title="" data-city="<?php echo $selectcity ?>"></h1>
                    <div class="toggle-light">
						<div class="toggle"></div>
					</div>
					<div class="clear"></div>
                </div>
                
                <div id="mid">

                    <img id="icon" src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt="">
                    <div id="temper"><h3 data-title=""></h3></div>
                    <div id="detail">
                        <div id="weti"><span data-title=""></span><h6>:H</h6></div>
                        <div id="wind"><span data-title=""></span><h6>:W</h6></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="clear"></div>
                <div id="bot">
                    
                    <div id="day1"><h6></h6><img src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt=""><h5></h5><h4></h4></div>
                    <div id="day2"><h6></h6><img src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt=""><h5></h5><h4></h4></div>
                    <div id="day3"><h6></h6><img src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt=""><h5></h5><h4></h4></div>
                    <div id="day4"><h6></h6><img src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt=""><h5></h5><h4></h4></div>
                    <div id="day5"><h6></h6><img src='<?php echo plugin_dir_url( __FILE__ )."img/" ?>' alt=""><h5></h5><h4></h4></div>
                    
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <?php
	}

}
add_action('widgets_init','tmediaa_weather_plugin_register');
function tmediaa_weather_plugin_register(){
	register_widget('tmediaa_weather_plugin');
}

?>