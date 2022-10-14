



    

    document.getElementById('set').onclick = ()=> {
        

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://www.fast2sms.com/dev/bulkV2",
            "method": "POST",
            "headers": {
                "authorization": "vrEAPgkuLFwGz2SQKt8pXyDHYhd6boV31J9WZOTIieRxMqUN5f7P02ThOSVzXIiexmfJBk9G6swaLRDn",
            },
            "data": {
                "message": "This is a test otp 339621",
                "route": "q",
                "numbers": "9721181790",
            }
            }

        $.ajax(settings).done(function (response) {
        console.log(response);
        });

        
        console.log("done !");
    }