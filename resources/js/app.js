require('./bootstrap');

function deleteImg(key, index) {

    $("#"+index).hide();
    $.ajax({
        type: 'GET',
        url: '/delete-s3-img',
        data: {'key':key},
        success: function (data) {
        },
        error: function (reject) {
            //handle error
            showNotification('bg-red', "Unable to delete", "top", "right");
        }
    });
}

function downloadNdelete(key, index) {

    $.ajax({
        type: 'GET',
        url: '/download-s3-image',
        data: {'key':key},
        success: function (data) {
            deleteImg(key, index);
            //new jsHelper().consoleLog("Data"+JSON.stringify(data, null,2));
            window.location.href=data.payload;
            // act on the result
        },
        error: function (reject) {
            //handle error
            showNotification('bg-red', "Unable to download image", "top", "right");
        }
    });

}
