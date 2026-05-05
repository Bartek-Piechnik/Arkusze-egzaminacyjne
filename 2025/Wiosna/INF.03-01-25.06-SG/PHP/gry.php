<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "gry";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <main>
        <section id="Sekcja_lewa">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <?php
                    $Wiersze = $polaczenie->query("SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5");

                    while ($Wiersz = $Wiersze->fetch_assoc())
                    {
                        $Nazwa = $Wiersz['nazwa'];
                        $Punkty = $Wiersz['punkty'];

                        echo "<li>".$Nazwa." "."<span id='Punkty'>".$Punkty."</span></li>";
                    }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>Bartek Piechnik 3Tpa</p>
        </section>
        <section id="Sekcja_srodkowa">
            <?php
                $Wiersze = $polaczenie->query("SELECT id, nazwa, zdjecie FROM gry");

                while ($Wiersz = $Wiersze->fetch_assoc())
                {
                    $Id = $Wiersz['id'];
                    $Nazwa = $Wiersz['nazwa'];
                    $Zdjecie = $Wiersz['zdjecie'];

                    echo "<section id='Blok'>";
                        echo "<img src='../Grafiki/".$Zdjecie."' alt='".$Nazwa."' title='".$Id."'>";
                        echo "<p>".$Nazwa."</p>";
                    echo "</section>";
                }
            ?>
        </section>
        <section id="Sekcja_prawa">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="post">
                <label for="nazwa">
                    <p>nazwa</p> <input type="text" name="nazwa" id="nazwa">
                </label>
                <label for="opis">
                    <p>opis</p> <input type="text" name="opis" id="opis">
                </label>
                <label for="cena">
                    <p>cena</p> <input type="text" name="cena" id="cena">
                </label>
                <label for="zdjecie">
                    <p>zdjęcie</p> <input type="text" name="zdjecie" id="zdjecie">
                </label>
                <input type="submit" value="DODAJ">
            </form>
            <?php
                if (isset($_POST['nazwa']))
                {
                    $Nazwa = $_POST['nazwa'];
                    $Opis = $_POST['opis'];
                    $Cena = $_POST['cena'];
                    $Zdjecie = $_POST['zdjecie'];

                    $Wynik = $polaczenie->query("INSERT INTO gry (nazwa, opis, punkty, cena, zdjecie) VALUES ('$Nazwa', '$Opis', 0, $Cena, '$Zdjecie')");
                }
            ?>
        </section>
    </main>
    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="id" id="id">
            <input type="submit" value="Pokaż opis">
        </form>
        <?php
            if (isset($_POST['id']))
            {
                $Id = $_POST['id'];
                $Wiersz = $polaczenie->query("SELECT nazwa, SUBSTRING(opis, 1, 100) AS pierwsze_100_znakow, punkty, cena FROM gry WHERE id = $Id");
                $Wiersz = $Wiersz->fetch_assoc();

                echo "<h2>".$Wiersz['nazwa'].", ".$Wiersz['punkty']." punktów, ".$Wiersz['cena']." zł</h2>";
                echo "<p>".$Wiersz['pierwsze_100_znakow']."</p>";
            }
        ?>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>