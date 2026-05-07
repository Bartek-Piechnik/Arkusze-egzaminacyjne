<?php
    header('refresh: 10');
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "opony";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <main>
        <aside>
            <?php
                $Opony = $polaczenie->query("SELECT * FROM opony ORDER BY cena ASC LIMIT 10");

                while ($Opona = $Opony->fetch_assoc())
                {
                    $Sezon = $Opona['sezon'];
                    $Producent = $Opona['producent'];
                    $Model = $Opona['model'];
                    $Cena = $Opona['cena'];

                    echo "<section class='opona'>";
                        if ($Sezon == "letnia")
                        {
                            echo "<img src='../Grafiki/lato.png' alt=''>";
                        }
                        else if ($Sezon == 'zimowa')
                        {
                            echo "<img src='../Grafiki/zima.png' alt=''>";
                        }
                        else if ($Sezon == 'uniwersalna')
                        {
                            echo "<img src='../Grafiki/uniwer.png' alt=''>";
                        }
                        echo "<h4>Opona: ".$Producent." ".$Model."</h4>";
                        echo "<h3>Cena: ".$Cena."</h3>";
                    echo "</section>";
                }
            ?>
            <p><a href="https://opona.pl/">więcej ofert</a></p>
        </aside>
        <section id="Sekcja_1">
            <img src="../Grafiki/opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <?php
                $Opona = $polaczenie->query("SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9");
                $Opona = $Opona->fetch_assoc();

                $Producent = $Opona['producent'];
                $Model = $Opona['model'];
                $Sezon = $Opona['sezon'];
                $Cena = $Opona['cena'];

                echo "<h2>".$Producent." model ".$Model."</h2>";
                echo "<h2>Sezon: ".$Sezon."</h2>";
                echo "<h2>Tylko ".$Cena." zł!</h2>";
            ?>
        </section>
        <section id="Sekcja_2">
            <h2>Najnowsze zamówienie</h2>
            <?php
                $Zamowienie = $polaczenie->query("SELECT z.id_zam, z.ilosc, o.model, o.cena FROM zamowienie z JOIN opony o ON z.nr_kat = o.nr_kat ORDER BY RAND() LIMIT 1");
                $Zamowienie = $Zamowienie->fetch_assoc();

                $Id_zam = $Zamowienie['id_zam'];
                $Ilosc = $Zamowienie['ilosc'];
                $Model = $Zamowienie['model'];
                $Cena = $Zamowienie['cena'];
                $Wartosc = $Ilosc * $Cena;

                echo "<h2>".$Id_zam." ".$Ilosc." sztuki modelu ".$Model."</h2>";
                echo "<h2>Wartość zamówienia ".$Wartosc." zł</h2>";
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>