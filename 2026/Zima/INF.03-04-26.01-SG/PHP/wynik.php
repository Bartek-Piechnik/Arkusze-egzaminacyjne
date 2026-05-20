<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "matura";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
        <img src="../Grafiki/ma.jpg" alt="Matura">
        <img src="../Grafiki/tu.jpg" alt="Matura">
        <img src="../Grafiki/ra.jpg" alt="Matura">
    </aside>
    <section id="Pierwszy_blok_sekcji">
        <?php
            $Id = $_GET['id'];
            $Imie = $_GET['imie'];
            $Nazwisko = $_GET['nazwisko'];

            echo "<h2>".$Imie." ".$Nazwisko."</h2>";

            $Egzaminy = $polaczenie->query("SELECT a.rok, a.sesja, a.przedmiot, w.punkty FROM arkusz a JOIN wynik w ON a.symbol = w.symbol WHERE w.maturzysta_id = $Id");

            while ($Egzamin = $Egzaminy->fetch_assoc())
            {
                echo "<h3>".$Egzamin['rok']." ".$Egzamin['sesja']."</h3>";
                echo "<p>".$Egzamin['przedmiot'].": ".$Egzamin['punkty']."</p>";
            }
        ?>
    </section>
    <section id="Drugi_blok_sekcji">
        <section class="Blok_wewnatrz_drugiej_sekcji">
            <h4>Przedmioty</h4>
            <?php
                $Przedmioty = $polaczenie->query("SELECT DISTINCT przedmiot FROM arkusz");
                
                while ($Przedmiot = $Przedmioty->fetch_assoc())
                {
                    echo $Przedmiot['przedmiot']." ";
                }
            ?>
        </section>
        <section class="Blok_wewnatrz_drugiej_sekcji">
            <h4>Lata</h4>
            <?php
                $Lata = $polaczenie->query("SELECT MIN(rok) AS 'Najstarszy arkusz', MAX(rok) AS 'Najmłodszy arkusz' FROM arkusz");
                $Lata = $Lata->fetch_assoc();

                echo $Lata['Najstarszy arkusz']." - ".$Lata['Najmłodszy arkusz'];
            ?>
        </section>
        <section class="Blok_wewnatrz_drugiej_sekcji">
            <h4>Najlepszy wynik</h4>
            <?php
                $Najlepszy_wynik = $polaczenie->query("SELECT m.id, AVG(punkty) AS 'Wynik' FROM maturzysta m JOIN wynik w ON m.id = w.maturzysta_id GROUP BY m.id ORDER BY AVG(punkty) DESC LIMIT 1;");
                $Najlepszy_wynik = $Najlepszy_wynik->fetch_assoc();

                echo $Najlepszy_wynik['Wynik']."%";
            ?>
        </section>
        <section class="Blok_wewnatrz_drugiej_sekcji">
            <h4>Najgorszy wynik</h4>
            <?php
                $Najgorszy_wynik = $polaczenie->query("SELECT m.id, AVG(punkty) AS 'Wynik' FROM maturzysta m JOIN wynik w ON m.id = w.maturzysta_id GROUP BY m.id ORDER BY AVG(punkty) ASC LIMIT 1;");
                $Najgorszy_wynik = $Najgorszy_wynik->fetch_assoc();

                echo $Najgorszy_wynik['Wynik']."%";
            ?>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>