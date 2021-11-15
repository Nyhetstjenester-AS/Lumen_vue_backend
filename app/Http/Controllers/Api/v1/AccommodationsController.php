<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\SimbaseApiRequest;
use App\Components\simBaseAuth;

class AccommodationsController extends Controller
{
  public function returnAccommodationsData(Request $request){
    $return = array();
    $sim = new simBaseAuth;
    $return = $sim->callFunction('f_api_return_accommodations_data');
    return response($return,200);
  }

  public function saveAccommodationsData(Request $request){
    $response = array();
    $return = array();
    $response['acc_id'] = ($request->acc_id) ? $request->acc_id : '';
    $response['number'] = ($request->number) ? $request->number : '';
    $response['room type'] = ($request->room_type) ? $request->room_type : '';
    $mktime = ($request->check_in) ? $request->check_in : 0;
    $check_in = trim((int)$mktime/86400000);
    $response['chek in'] = $check_in ? $check_in : '0';
    $response['nights'] = ($request->nights) ? $request->nights : '';
    $sim = new simBaseAuth;
    $return = $sim->callFunction('f_api_save_accommodations_data',$response);
    return response($return,200);
  }

}
