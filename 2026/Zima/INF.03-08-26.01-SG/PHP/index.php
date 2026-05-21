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
            $Szczyty = $polaczenie->query("SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC");

            while ($Szczyt = $Szczyty->fetch_assoc())
            {
                echo "<span><a href='szczyty.php?id_szczytu=".$Szczyt['id']."'>".$Szczyt['nazwa']."</a></span>";
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