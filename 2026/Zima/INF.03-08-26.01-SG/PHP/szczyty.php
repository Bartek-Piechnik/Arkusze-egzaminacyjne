<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "korona";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korona gór polskich</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <section id="Blok_naglowkowy_1">
            <img src="../Grafiki/logo.png" alt="Logo">
        </section>
        <section id="Blok_naglowkowy_2">
            <h1>Korona Gór Polskich</h1>
        </section>
    </header>
    <main>
        <?php
            if (isset($_GET['id_szczytu']))
            {
                $id_szczytu = $_GET['id_szczytu'];

                $Szczyt = $polaczenie->query("SELECT s.plik, s.nazwa, s.wysokosc, s.pasmo, o.opis FROM szczyty s JOIN opis o ON s.id = o.szczyty_id WHERE s.id = $id_szczytu");
                $Szczyt = $Szczyt->fetch_assoc();

                echo "<img src='../Grafiki/".$Szczyt['plik']."' alt='szczyt'>";
                echo "<h2>".$Szczyt['nazwa']."</h2>";
                echo "<h3>wysokość: ".$Szczyt['wysokosc']." metrów n.p.m.</h3>";
                echo "<h3>pasmo górskie: ".$Szczyt['pasmo']."</h3>";
                echo "<p>".$Szczyt['opis']."</p>";
            }
        ?>
    </main>
    <section id="Blok_sekcji">
        <?php
            $Pliki_i_nazwy = $polaczenie->query("SELECT plik, nazwa FROM szczyty LIMIT 10");

            while ($Plik_i_nazwa = $Pliki_i_nazwy->fetch_assoc())
            {
                echo "<img src='../Grafiki/".$Plik_i_nazwa['plik']."' alt='".$Plik_i_nazwa['nazwa']."' class='miniatury'>";
            }
        ?>
    </section>
    <footer>
        <section id="Blok_stopki_1">
            <h3>Kontakt</h3>
            <ul>
                <li>Zadzwoń do nas: 111 222 333</li>
                <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
            </ul>
        </section>
        <section id="Blok_stopki_2">
            <h3>&copy Wykonane przez: Bartek Piechnik 3Tpa</h3>
        </section>
    </footer>
    <?php $polaczenie->close(); ?>
</body>
</html>