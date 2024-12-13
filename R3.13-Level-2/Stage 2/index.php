<?php  // "Front Controller"


require_once("model.php");



/*  function renderAmiibo
    $amiibo: an Amiibo object (see model.php)
    returned value: a string which is the template-card.html.inc formated using the Amiibo object
*/
function renderAmiibo($amiibo)
{
    $template = file_get_contents("template-card.html.inc");
    $search = ["{{title}}", "{{subtitle}}", "{{description}}", "{{price}}", "{{image}}"];
    $replace = [$amiibo->getName(), $amiibo->getManufacturer(), $amiibo->getDescription(), $amiibo->getPrice(), $amiibo->getImage()];
    return str_replace( $search, $replace, $template);
}

$content = "";
foreach ($data as $amiibo) {
    $content = $content . renderAmiibo($amiibo);
}


?>
<!DOCTYPE>
<html lang="fr">

    <head>
        <title>R3.DWeb-DI.13 - POO</title>
        <link href="https://fonts.googleapis.com/css?family=
        Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
        <link href="./style.css" , rel="stylesheet">
    </head>

    <body>
        <section>

            <div class="nine">
                <h1>Zelda - Breath Of The Wild<span>Amiibo</span></h1>
            </div>
        
            <div class="flex-container">
                <?php echo $content; ?>
            </div>

        </section>
    </body>

</html>