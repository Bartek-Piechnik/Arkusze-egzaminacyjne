<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "dane2";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);

    if (isset($_POST['Nazwa']) && isset($_POST['Cena']))
    {
        $Nazwa = $_POST['Nazwa'];
        $Cena = $_POST['Cena'];

        $polaczenie->query("INSERT INTO produkty VALUES (NULL, 1, 4, '$Nazwa', 10, '', $Cena, 'owoce.jpg')");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="../CSS/styl2.css">
</head>
<body>
    <header>
        <section id="Baner_lewy">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="Baner_prawy">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
            </ol>
        </section>
    </header>
    <main>
        <?php
            $Produkty = $polaczenie->query("SELECT p.nazwa, p.ilosc, p.opis, p.cena, p.zdjecie FROM produkty p JOIN rodzaje r ON p.Rodzaje_id = r.id WHERE p.Rodzaje_id IN (1, 2)");

            while ($Produkt = $Produkty->fetch_assoc())
            {
                echo "<section id='Blok_produktu'>";
                    echo "<img src='../Grafiki/".$Produkt['zdjecie']."' alt='Warzywniak'>";
                    echo "<h5>".$Produkt['nazwa']."</h5>";
                    echo "<p>opis: ".$Produkt['opis']."</p>";
                    echo "<p>na stanie: ".$Produkt['ilosc']."</p>";
                    echo "<h2>".$Produkt['cena']." zł</h2>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="post">
            <label for="Nazwa">Nazwa:</label> <input type="text" name="Nazwa" id="Nazwa">
            <label for="Cena">Cena:</label> <input type="number" name="Cena" id="Cena">
            <input type="submit" value="Dodaj produkt">
            Stronę wykonał: Bartek Piechnik 3Tpa
        </form>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>