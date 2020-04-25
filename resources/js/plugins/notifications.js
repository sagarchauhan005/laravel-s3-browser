/*
* Comment by Sagar at 26/7/19 6:56 PM
*  Shows dummy default layout notify
*/
function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit, allowDismiss = true) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }

    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            z_index: 2000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
}

/*
* Comment by Sagar at 26/7/19 6:56 PM
*  Shows Veu template notification
*/

function showVeuNotification(notif_type='pg_new_request',text, placementFrom, placementAlign,  timer=2000, notf_target='#',  allowDismiss = true,
                              animateEnter = 'animated fadeInDown', animateExit = 'animated fadeOutUp') {
    if (text === null || text === '') { text = 'A notification just came in but something went wrong'; }

    $.notify({
            message: text
        },
        {
            type: 'bg-black',
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: timer,
            z_index: 2000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template :  '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + ' notification-toast" role="alert">\n' +
                '                    <div class="col-xs-12">\n' +
                '                       <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color:#000;top:2px;">×</button></div>\n' +
                '                        <div class="veu-notify-alert '+notif_type+' pull-right ">\n' +
                '                          <a href="'+notf_target+'">\n'+
                '                            <div class="pull-right" style="width:220px;text-align: left; padding-left:10px; ">\n' +
                '                                <p class="veu-title-1 col-black margin-0" style="display: inline-flex">'+text+'</p><br>\n' +
                '                                <p class="veu-title-1 col-black font-weight-300 text-left veu-a-tag-text"></p>\n' +
                '                                <p class="veu-caption m-t--8 col-grey font-weight-normal text-left">just now</p>\n' +
                '                            </div></a>\n' +
                '                        </div>\n' +
                '                </div>'
        });
}

function notificationRead(id, target) {

    if(id!=null){
        $.ajax({
            type: 'POST',
            url: '/mark-notif-read',
            data: {'notif_id' : id},
            headers: {
                'progress':false,   // hides the loader progress bar above
            },
            success: function (data) {
                new jsHelper().consoleLog("Ajax Response : " + JSON.stringify(data, null, 2));
                // act on the result
            },
            error: function (reject) {
                //handle error
                showNotification('bg-red', reject.responseJSON.response, "top", "right");
            }
        });

        //window.location.href = target;
    }
}