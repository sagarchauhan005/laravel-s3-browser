@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('templates.project-info')
        <div class="row preview-container">
            @if(sizeof($files)>0)
                @foreach($files as $key =>$file)
                    @php $url = \App\Http\Utilities\Helper::getPreSignedUrl($file); $path_info = pathinfo($file); @endphp
                    @if(strpos($file,'/') && (preg_match('/jpeg|jpg|png|gif/i', $file))/* || is_numeric($file)*/)
                            @include('templates.image-card')
                    @else
                        @if(!env('ONLY_IMAGE_RESULT'))
                            @include('templates.non-image-card')
                        @endif
                    @endif
                @endforeach
            @else
                <div class="alert alert-danger">
                    <strong>Ooops!</strong> Something went wrong. Unable to fetch files from S3.
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                {{$files->links()}}
            </div>
        </div>
    </div>
@endsection
