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
}
