<?php


namespace App\Http\Utilities;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function getPreSignedUrl(string $name, $download=false)
    {
        if($name==null){
            return false;
        }

        $s3 = Storage::disk('s3');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $expiry = "+7 days";

        $command = $client->getCommand('GetObject', [
            'Bucket' => Config::get('filesystems.disks.s3.bucket'),
            'Key'    => $name,
            'ResponseContentDisposition' => ($download)? 'attachment':'',
        ]);

        $request = $client->createPresignedRequest($command, $expiry);

        return (string) $request->getUri();
    }

    /*
    * Comment by Sagar at 25/9/18 11:26 AM
    * This is used to maintain uniformity in returing the response
     * by using a single line method and not re-write response syntax
     * every time
    *
     * @param $statusCode | int
     * @param $statusText | string
     * @param null $data | array or null
     * @return \Illuminate\Http\JsonResponse
     */
    public static function returnResponse($statusCode, $statusText, $data=null){

        return response()->json([
            'response' => $statusText,
            'payload' => $data,
        ], $statusCode);
    }
}
