<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "pogoda";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <section id="Blok_naglowkowy_1">
            <img src="../Grafiki/slonce.png" alt="Słonecznie">
        </section>
        <section id="Blok_naglowkowy_2">
            <h1>Pogoda w Europie</h1>
        </section>
    </header>
    <main>
        <section id="Blok_sekcji_lewej">
            <h2>Temperatury w lipcu</h2>
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Kraj</th>
                    <th>Temperatura</th>
                    <th>Pogoda</th>
                </tr>
                <?php
                    $Temperatury_dla_miejscowosci = $polaczenie->query("SELECT m.nazwa, m.kraj, p.temperatura FROM miejscowosc m JOIN pomiary p ON m.id = p.id_miejscowosc WHERE p.id_miesiac = 7");

                    while ($Temperatura_dla_miejscowosci = $Temperatury_dla_miejscowosci->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>".$Temperatura_dla_miejscowosci['nazwa']."</td>";
                            echo "<td>".$Temperatura_dla_miejscowosci['kraj']."</td>";
                            echo "<td>".$Temperatura_dla_miejscowosci['temperatura']."</td>";
                            if ($Temperatura_dla_miejscowosci['temperatura'] > 30)
                            {
                                echo "<td><img src='../Grafiki/slonce.png' alt=''></td>";
                            }
                            else if ($Temperatura_dla_miejscowosci['temperatura'] < 26)
                            {
                                echo "<td><img src='../Grafiki/deszcz.png' alt=''></td>";
                            }
                            else
                            {
                                echo "<td><img src='../Grafiki/chmury.png' alt=''></td>";
                            }
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="Blok_sekcji_prawej">
            <h2>Średnie temperatury w roku</h2>
            <a href="index.php?id_miesiac=1">Styczeń</a>
            <a href="index.php?id_miesiac=2">Luty</a>
            <a href="index.php?id_miesiac=3">Marzec</a>
            <a href="index.php?id_miesiac=4">Kwiecień</a>
            <a href="index.php?id_miesiac=5">Maj</a>
            <a href="index.php?id_miesiac=6">Czerwiec</a>
            <a href="index.php?id_miesiac=7">Lipiec</a>
            <a href="index.php?id_miesiac=8">Sierpień</a>
            <a href="index.php?id_miesiac=9">Wrzesień</a>
            <a href="index.php?id_miesiac=10">Październik</a>
            <a href="index.php?id_miesiac=11">Listopad</a>
            <a href="index.php?id_miesiac=12">Grudzień</a>
            <p>Średnia temperatura dla wybranego miesiąca wynosi</p>
            <?php
                if (isset($_GET['id_miesiac']))
                {
                    $id_miesiac = $_GET['id_miesiac'];
                    $Srednia_temperatura = $polaczenie->query("SELECT ROUND(AVG(temperatura), 2) FROM pomiary WHERE id_miesiac = $id_miesiac");
                    $Srednia_temperatura = $Srednia_temperatura->fetch_assoc();
                    $Srednia_temperatura = $Srednia_temperatura['ROUND(AVG(temperatura), 2)'];

                    echo "<h3>".$Srednia_temperatura." stopni</h3>";
                }
            ?>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>