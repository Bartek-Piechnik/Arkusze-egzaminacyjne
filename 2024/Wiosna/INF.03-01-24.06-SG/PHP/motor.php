<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "motory";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <img src="../Grafiki/motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <section id="Lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                $Wiersze = $polaczenie->query("SELECT w.nazwa, w.opis, w.poczatek, z.zrodlo FROM wycieczki w JOIN zdjecia z ON w.zdjecia_id = z.id");

                while ($Wiersz = $Wiersze->fetch_assoc())
                {
                    $Nazwa = $Wiersz['nazwa'];
                    $Poczatek = $Wiersz['poczatek'];
                    $Zrodlo = $Wiersz['zrodlo'];
                    $Opis = $Wiersz['opis'];

                    echo "<dt>".$Nazwa.", rozpoczyna się w ".$Poczatek.", <a href='../Grafiki/".$Zrodlo.".jpg'>zobacz zdjęcie</a></dt>";
                    echo "<dd>".$Opis."</dd>";
                }
            ?>
        </dl>
    </section>
    <section id="Pierwszy_prawy">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="Drugi_prawy">
        <h2>Statystyki</h2>
        <?php
            $Liczba_wpisanych_wycieczek = $polaczenie->query("SELECT COUNT(id) AS ilosc FROM wycieczki");
            $Liczba_wpisanych_wycieczek = $Liczba_wpisanych_wycieczek->fetch_assoc();
            $Liczba_wpisanych_wycieczek = $Liczba_wpisanych_wycieczek['ilosc'];

            echo "<p>Wpisanych wycieczek: ".$Liczba_wpisanych_wycieczek."</p>";
        ?>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer>
        <p>Stronę wykonał: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>