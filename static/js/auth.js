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
function comment() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file
    var content = document.getElementById("comment-content").value;
    var school_id =  (document.getElementById("comment-btn")).getAttribute("data-schoolId");
    var url = "./handlers/comment-handler.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "content="+ content+"&school_id="+school_id;
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
var sArray;
function getSchoolsBytype() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file
    var url = "./handlers/getSchoolByType.php";

    var type_id = document.getElementById("school-type-select").value;  
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "type_id="+ type_id;
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                var array = JSON.parse(return_data);
                var select = document.getElementsByClassName("school-name-select"); 
                select[0].innerHTML="";
                var i = 0;
                array.forEach(element => {
                    select[0].innerHTML+="<option data-index = \""+i+"\"value=\""+element[0]+"\">"+element[1]+"</option>";
                    i++;
                });
                select[1].innerHTML = select[0].innerHTML;
            }
            sArray = array;
            return array;
        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}

function createComparatorTable(){
    var tbody = document.getElementById("tbody-compare");
    var select = document.getElementsByClassName("school-name-select");
    tbody.innerHTML = "";
    nArray = sArray.filter(element => {
        return ((element[0]== select[1].value)||(element[0]== select[0].value))
    });
    elem1 = nArray[0];
    elem2 = nArray[1];
    console.log(elem1);
    var i = 1;
    var k = elem1[i];
    var j = elem2[i];
    if(k>j)
    tbody.innerHTML+="<tr><td class=\"table-success\">"+k+"</td><td>"+j+"</td></tr>";
    else if (j>k)    
    tbody.innerHTML+="<tr><td>"+k+"</td><td class=\"table-success\">"+j+"</td></tr>";
    else
    tbody.innerHTML+="<tr><td>"+k+"</td><td>"+j+"</td></tr>";
    var i = 4;
    var k = elem1[i];
    var j = elem2[i];
    if(k>j)
    tbody.innerHTML+="<tr><td class=\"table-success\">"+k+"</td><td>"+j+"</td></tr>";
    else if (j>k)    
    tbody.innerHTML+="<tr><td>"+k+"</td><td class=\"table-success\">"+j+"</td></tr>";
    else
    tbody.innerHTML+="<tr><td>"+k+"</td><td>"+j+"</td></tr>";
    var i = 5;
    var k = elem1[i];
    var j = elem2[i];
    if(k>j)
    tbody.innerHTML+="<tr><td class=\"table-success\">"+k+"</td><td>"+j+"</td></tr>";
    else if (j>k)    
    tbody.innerHTML+="<tr><td>"+k+"</td><td class=\"table-success\">"+j+"</td></tr>";
    else
    tbody.innerHTML+="<tr><td>"+k+"</td><td>"+j+"</td></tr>";
    var i = 6;
    var k = elem1[i];
    var j = elem2[i];
    if(k>j)
    tbody.innerHTML+="<tr><td class=\"table-success\">"+k+"</td><td>"+j+"</td></tr>";
    else if (j>k)    
    tbody.innerHTML+="<tr><td>"+k+"</td><td class=\"table-success\">"+j+"</td></tr>";
    else
    tbody.innerHTML+="<tr><td>"+k+"</td><td>"+j+"</td></tr>";

}
$(document).ready(function() {
    $("#connect-btn").click(function(){
        authenticate();})
    $("#disconnect-btn").click(function(){
        disconnect();})
    $("#comment-btn").click(function(){
        comment();})
    $("#school-type-select").change(function(){
        getSchoolsBytype();
    })
    $(".school-name-select").change(function(){
        createComparatorTable();
    })
});

