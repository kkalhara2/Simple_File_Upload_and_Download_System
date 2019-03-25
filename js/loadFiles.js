$("#submitSearch").click(function () {
    // 1
    var httpRequest;

    httpRequest = new XMLHttpRequest();

    // 2

    httpRequest.onreadystatechange = function () {
        if(httpRequest.readyState === 4 || httpRequest.status === 200){
            $("#files").append(httpRequest.responseText);
        }
    };

    // 3
    httpRequest.open('POST','downloadProcess.php',true);
    // 4

    // 5

    httpRequest.send();
});