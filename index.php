<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Souls Database - 0.1A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/weapons.js"></script>
    <script>
    $(document).ready(function() {
        var items = [];
        var objects = [];
        $("#weapons-select").change(getWeaponInfo);
        
        function getWeaponInfo() {
            var itemSelected = $("#weapons-select").val();
            $("#container").html("Name: " + objects[itemSelected]["name"] + "<br>" + 
            "Durability: " + objects[itemSelected]["durability"]);
        }
        
        $.getJSON( "js/weapons.js", function( data ) {
            $.each( data, function( key, val ) {
                objects.push({name: val["name"], durability: val["durability"]});
                items.push( "<option value='" + key + "'>" + val["name"] + "</option>" );
            });
            
            $("#weapons-select").append(items.join(""));
            getWeaponInfo();
        });
    });
    </script>
</head>
<body>

    <select id="weapons-select"></select><br><br>
    <div id="container"></div>

</body>
</html>