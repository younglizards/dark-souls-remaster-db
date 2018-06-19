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
                items.push( "<tr>"
                +"<td>"+val["name"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["atk"]["physical"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["atk"]["magic"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["atk"]["fire"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["atk"]["lightning"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["atk"]["bonus"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["def"]["physical"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["def"]["magic"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["def"]["fire"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["def"]["lightning"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["def"]["stab"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["effects"]["poison"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["effects"]["bleed"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["effects"]["divine"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["effects"]["occult"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["req"]["strength"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["req"]["dexterity"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["req"]["intelligence"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["req"]["faith"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["scale"]["strength"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["scale"]["dexterity"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["scale"]["intelligence"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["scale"]["faith"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["durability"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["weight"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["attackTypes"]+"</td>"
                +"<td>"+val["obtained"]+"</td>"
                +"<td style=\"text-align: center;\">"+val["aotaOnly"]+"</td>"
                +"</tr>" );
                console.log(val);
            });

            items.sort();
            
            $("#weapons-table").append(items.join(""));
            //getWeaponInfo();
        });
    });
    </script>
</head>
<body>

    <table id="weapons-table">
        <tr>
            <th></th>
            <th colspan=5>ATK</th>
            <th colspan=5>DEF</th>
            <th colspan=4>Effects</th>
            <th colspan=4>Requirements</th>
            <th colspan=4>Scale</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Physical</th>
            <th>Magic</th>
            <th>Fire</th>
            <th>Lightning</th>
            <th>Bonus</th>

            <th>Physical</th>
            <th>Magic</th>
            <th>Fire</th>
            <th>Lightning</th>
            <th>Stab</th>

            <th>Poison</th>
            <th>Bleed</th>
            <th>Divine</th>
            <th>Occult</th>

            <th>STR</th>
            <th>DEX</th>
            <th>INT</th>
            <th>FAI</th>

            <th>STR</th>
            <th>DEX</th>
            <th>INT</th>
            <th>FAI</th>

            <th>Durability</th>
            <th>Weight</th>
            <th>Attack type</th>
            <th>Location</th>
            <th>DLC</th>
        </tr>
    </table>

</body>
</html>