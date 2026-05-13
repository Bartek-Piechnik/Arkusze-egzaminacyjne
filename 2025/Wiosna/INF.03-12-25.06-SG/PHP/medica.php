<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "medica";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Medica</title>
    <link rel="shortcut icon" href="../Grafiki/obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
            $Abonamenty = $polaczenie->query("SELECT nazwa, cena, opis FROM abonamenty");
            
            while ($Abonament = $Abonamenty->fetch_assoc())
            {
                echo "<h3>Pakiet ".$Abonament['nazwa']." - cena ".$Abonament['cena']." zł</h3>";
                echo "<p>".$Abonament['opis']."</p>";
            }
        ?>
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section>
            <h2>Standardowy</h2>
            <ul>
                <?php
                    $Cechy = $polaczenie->query("SELECT a.nazwa, c.cecha FROM abonamenty a JOIN szczegolyabonamentu sa ON a.id = sa.Abonamenty_id JOIN cechy c ON c.id = sa.Cechy_id WHERE a.id = 1");

                    while ($Cecha = $Cechy->fetch_assoc())
                    {
                        echo "<li>".$Cecha['cecha']."</li>";
                    }
                ?>
            </ul>
        </section>
        <section>
            <h2>Premium</h2>
            <ul>
                <?php
                    $Cechy = $polaczenie->query("SELECT a.nazwa, c.cecha FROM abonamenty a JOIN szczegolyabonamentu sa ON a.id = sa.Abonamenty_id JOIN cechy c ON c.id = sa.Cechy_id WHERE a.id = 2");

                    while ($Cecha = $Cechy->fetch_assoc())
                    {
                        echo "<li>".$Cecha['cecha']."</li>";
                    }
                ?>
            </ul>
        </section>
        <section>
            <h2>Dziecko</h2>
            <ul>
                <?php
                    $Cechy = $polaczenie->query("SELECT a.nazwa, c.cecha FROM abonamenty a JOIN szczegolyabonamentu sa ON a.id = sa.Abonamenty_id JOIN cechy c ON c.id = sa.Cechy_id WHERE a.id = 3");

                    while ($Cecha = $Cechy->fetch_assoc())
                    {
                        echo "<li>".$Cecha['cecha']."</li>";
                    }
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>
            <img src="../Grafiki/obraz2.png" alt="przychodnia">
            Stronę przygotował: Bartek Piechnik 3Tpa
        </p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>