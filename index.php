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
        var headerWidths = [];
        var positions = [];
        var onTop = true;
        var i = 0;
        var j = 0;
        var filaDeAbajo = false;
        var posicionTop = 0;
        
        // TODO intentar cogiendo los offset de las celdas, en lugar de la de los headers al inicio (al menos para la izq)
        $(window).scroll(function(event) {
            var scrollTop = $(window).scrollTop();
            if(scrollTop > 0 && onTop == true) {
                $("th").each(function() {
                    $(this).css("position", "fixed");
                    $(this).width(headerWidths[j]);
                    $(this).css("left", positions[j].left);
                    if(j < 6 && filaDeAbajo == false) {
                        switch(j) {
                            case 0:
                                break;
                            case 1:
                                $(this).width(headerWidths[1]+headerWidths[2]+headerWidths[3]+headerWidths[4]+headerWidths[5]+headerWidths[6]);
                                $(this).css("left", positions[1].left);
                                break;
                            case 2:
                                $(this).width(headerWidths[6]+headerWidths[7]+headerWidths[8]+headerWidths[9]+headerWidths[10]+headerWidths[11]);
                                $(this).css("left", positions[6].left);
                                break;
                            case 3:
                                $(this).width(headerWidths[11]+headerWidths[12]+headerWidths[13]+headerWidths[14]+headerWidths[15]);
                                $(this).css("left", positions[11].left);
                                break;
                            case 4:
                                $(this).width(headerWidths[16]+headerWidths[17]+headerWidths[18]+headerWidths[19]+headerWidths[20]);
                                $(this).css("left", positions[15].left);
                                break;
                            case 5:
                                $(this).width(headerWidths[16]+headerWidths[17]+headerWidths[18]+headerWidths[19]+headerWidths[20]);
                                $(this).css("left", positions[19].left);
                                break;
                            default:
                                break;
                        }
                    }
                    if(j > 5 && filaDeAbajo == false) {
                        posicionTop = 15;
                        filaDeAbajo = true;
                        j = 0;
                    }
                    $(this).css("top", posicionTop);
                    $(this).css("backgroundColor", "#000");
                    j++;
                });
                onTop = false;
                j = 0;
            } else if(scrollTop == 0 && onTop == false) {
                $("th").each(function() {
                    $(this).css("position", "relative");
                    $(this).css("top", 0);
                    $(this).css("left",0);
                    $(this).css("backgroundColor", "transparent");
                });
                onTop = true;
                j = 0;
                filaDeAbajo = false;
                posicionTop = 0;
            }
        });
        
        $.getJSON( "js/weapons.js", function( data ) {
            $.each( data, function( key, val ) {
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
            });

            items.sort();
            
            $("#weapons-table").append(items.join(""));

            // asociamos el width de las primeras 28 celdas
            $("td").each(function(index) {
                if(i < 28) {
                    headerWidths.push($(this).width());
                    positions.push($(this).offset());
                    $(this).width(headerWidths[i]);
                } else {
                    return false;
                }
                i++;
            });
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