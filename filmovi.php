<html>
<head>
<title>Filmovi</title>
<meta charset="UTF-8"> 
</head>
<body>
    <h2>Dodaj film</h2>
    <form action="" method="post">

        <label>Naslov</label></br>
        <input id="naslov" name="naslov" type="text"></br>
        <label>Režiser</label></br>
        <input id="cijena" name="reziser" type="text"></br>
        <label>Žanr</label></br>
        <input id="zanr" name="zanr" type="text"></br>
        <label>Godina izdanja</label></br>
        <input id="godina" name="godina" type="number"></br>

        <input name="submit" type="submit" value="Dodaj"></br>
    </form>

    <hr><hr>

    <h2>Filmovi</h2>
    <?php
        $xml = simplexml_load_file('filmovi.xml');
	    foreach($xml->Film as $film) {
            $naslov = $film->Naslov;
            $reziser = $film->Reziser;
            $zanr = $film->Zanr;
            $godina = $film->GodinaIzdanja;
		    echo "<h3>" . $naslov . "</h3>
                    <p>Režiser: " . $reziser . "</p>
                    <p>Žanr: " . $zanr . "</p>
                    <p>Godina izdanja: " . $godina . " g.</p><hr>";
		}
    
        if (isset($_POST['naslov']) and isset($_POST['reziser']) and isset($_POST['zanr']) and isset($_POST['godina'])) {
        $novi_film = $xml->addChild('Film');
        $novi_film->addChild('Naslov', $_POST['naslov']);
        $novi_film->addChild('Reziser', $_POST['reziser']);
        $novi_film->addChild('Zanr', $_POST['zanr']);
        $novi_film->addChild('GodinaIzdanja', $_POST['godina']);

        $xml->asXml('filmovi.xml');

        header("Refresh:0");
        }
    ?>

</body>
</html>