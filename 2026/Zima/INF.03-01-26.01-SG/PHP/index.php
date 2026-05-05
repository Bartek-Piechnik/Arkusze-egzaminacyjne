<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "samochody";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="Sekcja_lewa">
            <table>
                <?php
                    $Wiersze = $polaczenie->query("SELECT p.marka, p.model, p.cena, k.nazwa, k.doplata FROM pojazdy p JOIN kolory k ON p.kolor = k.id WHERE p.model = 'alfa'");

                    while ($Wiersz = $Wiersze->fetch_assoc())
                    {
                        $Marka = $Wiersz['marka'];
                        $Model = $Wiersz['model'];
                        $Kolor = $Wiersz['nazwa'];

                        $Cena = $Wiersz['cena'];
                        $Doplata = $Wiersz['doplata'];

                        echo "<tr>";
                            echo "<td>".$Marka."</td>";
                            echo "<td>".$Model."</td>";
                            echo "<td>".$Kolor."</td>";
                            echo "<td>".$Cena + $Doplata."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="Sekcja_srodkowa">
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $Wiersze = $polaczenie->query("SELECT marka, model, cena FROM pojazdy ORDER BY Rand() LIMIT 2");
                    $Numer = 1;

                    while ($Wiersz = $Wiersze->fetch_assoc()) 
                    {
                        $Marka = $Wiersz['marka'];
                        $Model = $Wiersz['model'];
                        $Cena = $Wiersz['cena'];

                        echo "<tr>";
                            echo "<td colspan='3'>";
                                echo "<img src='../Grafiki/a".$Numer.".jpg' alt='Konfiguracja ".$Numer."'>";
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>Marka</td>";
                            echo "<td>".$Marka."</td>";
                            echo "<td rowspan='2'>".$Cena."</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>Model</td>";
                            echo "<td>".$Model."</td>";
                        echo "</tr>";
                        
                        $Numer++;
                    }
                ?>
                </table>
        </section>
        <section id="Sekcja_prawa">
            <h3>111 222 444</h3>
            <img src="../Grafiki/a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>