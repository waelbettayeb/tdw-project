function authenticate() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file
    var username = $("#username")[0].value;
    var pwd = $("#password")[0].value;
    var url = "./handlers/connect-handler.php";

    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "username=" + username + "&password=" + pwd;
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                if(return_data){
                    location.reload();
                }
                else
                    alert("Wrong username or password");
            }
        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
function disconnect() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file

    var url = "./handlers/disconnect-handler.php";

    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "disconnect=true";
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                location.reload();
            }
        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
$(document).ready(function() {
    $("#connect-btn").click(function(){
        authenticate();})
    $("#disconnect-btn").click(function(){
        disconnect();})
});

