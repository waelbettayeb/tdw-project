
/************************
 *
 * @param username
 * @param pwd
 */
function authenticate(username, pwd) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file
    var username = $("#user-name-input")[0].value;
    var pwd = $("#user-pwd-input")[0].value;
    var url = "./dir/auth.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "username=" + username + "&password=" + pwd;
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                if(return_data){
                    $('#login-error-message').hide();
                    $("#form-container").show();
                    $("#login-btn")[0].innerText = "Disconnect";
                    $('#login-btn')[0].onclick = disconnect;
                    $("#login-inputs-container").hide();
                    // $('#addFormationSubmit').click(function ( ){
                    //     addFormation($(".inputs")[0].value, $(".inputs")[1].value,
                    //         $(".inputs")[2].value, $(".inputs")[3].value, $("#slct-type-formation").val());
                    // });
                }
                else
                    $('#login-error-message').show();
            }
        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
function disconnect() {
    var hr = new XMLHttpRequest();


    var url = "./dir/disconnect.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "disconnect=" + true ;
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                $("#form-container").hide();
                $("#login-btn")[0].innerText = "Login";
                $('#login-btn')[0].onclick = authenticate;
                $('#login-error-message').hide();
                $("#login-inputs-container").show();
            }
        }
    }
    hr.send(vars);
}
function addFormation(formation, h, htt, perc, type) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/add-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "formation=" + formation + "&volume_horaire=" + h + "&price=" + htt +
        "&percentage=" + perc + "&type=" + type;
    console.log(vars);
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();
}
function addTypeFormation(type) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/add-type-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "type=" + type;
    console.log(vars);
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();
}
function addTypeFormation(type) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/add-type-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "type=" + type;
    console.log(vars);
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();
}
function deleteTypeFormation(type) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/delete-type-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "id=" + type;
    console.log(vars);
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();
}

function editFormation(id ,formation, h, htt, perc) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/update-type-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "formation_id=" + id + "&formation=" + formation + "&volume_horaire=" + h + "&price=" + htt
        + "&percentage=" + perc;
    console.log(vars);
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        console.log(hr.responseText);
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
function editTypeFormation() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/edit-type-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "type_id=" +$('#slct-type-formation')[0].value + "&name=" + $("#edit-type-formation")[0].innerText;
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();
}
function deleteFormation(id) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./dir/delete-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "formation_id=" + id;
    console.log(vars);
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        console.log(hr.responseText);
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    loadFormations();

}
function loadFormations() {
    var hr = new XMLHttpRequest();
    var url = "./dir/get-editableformations-rows.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                $("#pricing-table-body")[0].innerHTML = return_data;
                $(".edit-btn").click(function(){
                    line = this.parentNode.parentNode;
                    formation_name = line.children[1].innerText;
                    volHor = line.children[2].innerText;
                    htt = line.children[3].innerText;
                    taxe = line.children[4].innerText;

                    editFormation(this.id, formation_name , volHor, htt, taxe);
                });
                $(".delete-btn").click(function(){
                    deleteFormation(this.id);
                })
            }
        }
    }
    loadTypesFormation();
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
}
function loadTypesFormation() {
    var hr = new XMLHttpRequest();
    var url = "./dir/get-types-formation.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {
                $("#slct-type-formation")[0].innerHTML = return_data;
            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
}

function setTheme(id) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./requestHandler.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var vars = "theme=" + id;
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        console.log(hr.responseText);
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            if (hr.DONE) {

            }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
$(document).ready(function () {
    $('#theme-1-btn').click(function () {
        setTheme(1);
    });
    $('#theme-2-btn').click(function () {
        setTheme(0);
    });
    loadFormations();
    $('#login-btn').click(function () {
        authenticate();
    });
    $('#addFormationSubmit').click(function () {
        addFormation($(".inputs")[0].value, $(".inputs")[1].value,
            $(".inputs")[2].value, $(".inputs")[3].value, $("#slct-type-formation").val());
        loadFormations();
    });
    $('#add-type-formation-submit').click(function () {
        addTypeFormation($('#input-type-formation')[0].value);
        loadFormations();
    });
    $('#deleteTypeFormationSubmit').click(function () {
        deleteTypeFormation($('#slct-type-formation')[0].value);
    });
    $('#edit-type-formationSubmit').click(function () {
        editTypeFormation();
        loadFormations();
    });
});
