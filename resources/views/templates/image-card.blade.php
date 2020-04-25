<div class="col-md-3 s3-card-column" id="{{$key}}" >
    <div class="card">
    <a href="{{$url}}" target="_blank">
        <img src="{{$url}}" id="card-image">
    </a>
    <div class="card-btn-container">
        <div class="row">
            <div class="col-md-12" data-toggle="tooltip" title="{{$file}}">
                <p>File type : {{(isset($path_info['extension']) ? $path_info['extension'] : "Unknown file type")}}</p>
            </div>
        </div>
        <div id="left-btn">
            <button type="button" onclick="downloadNdelete('{{$file}}', '{{$key}}')"
                    class="cursor-pointer btn-warning btn">Download & Delete</button>
        </div>
        <div id="right-btn">
            <button type="button" onclick="deleteImg('{{$file}}', '{{$key}}')"
                    class="cursor-pointer btn-warning btn">Just Delete</button>
        </div>
    </div>
</div>
</div>
