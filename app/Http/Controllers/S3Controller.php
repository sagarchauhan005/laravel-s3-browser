<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Helper;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    public static function index(Request $request){

        $res=[];
        try{
            $page = ($request->has('page')) ? $request->get('page') : 1;
            $files = Storage::disk('s3')->allFiles();
            $per_page = (env('ONLY_IMAGE_RESULT')) ? env('IMAGE_PAGINATION_COUNT') : env('DEFAULT_PAGINATION_COUNT');
            $slice_start = $per_page*$page;
            $sliced_array =  array_slice($files, $slice_start, $per_page);
            $res = new LengthAwarePaginator($sliced_array,sizeof($files), $per_page);
        }catch (\Exception $exception){
           Log::info("Something went wrong : ".$exception->getMessage());
        }

        return view('pages/index')->with('files',$res);
    }

    public static function deleteImg(Request $request){
        $key = $request->get('key');
        $del = Storage::disk('s3')->delete($key);
        if($del){
            return Helper::returnResponse(200,"deleted");
        }

        return Helper::returnResponse(400, 'unable to delete');
    }

    public static function downloadImg(Request $request){
        $key = $request->get('key');
        $down = Helper::getPreSignedUrl($key, true);
        if($down){
            return Helper::returnResponse(200,"downloaded", $down);
        }

        return Helper::returnResponse(400, 'unable to download');
    }
}
