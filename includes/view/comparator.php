<?php
?>
<script>
    var types = {
        {
            "id" :0 ,
            "name": "univ"
        },
        {
            "id" :1 ,
            "name": "mat"
        },
    };

    function createSchoolSelectView(schoolTypes) {
        var select = document.getElementById("school-type-select");
        select.innerHTML = "<option selected>Choisissez le type d'école</option>\n";
        schoolTypes.forEach(function (element) {

        })
    }
</script>
<h6>Type d'école</h6>
<select class="custom-select" id="school-type-select">
    <option selected>Choisissez le type d'école</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>
<h6>Première école</h6>
<select class="custom-select school-name-select">
    <option selected>Choisissez une école</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>
<table class="table table-hover table-sm">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td class="table-success" >Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>