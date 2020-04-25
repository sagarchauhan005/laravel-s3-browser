<?php

namespace App\Http\Controllers;

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
}
