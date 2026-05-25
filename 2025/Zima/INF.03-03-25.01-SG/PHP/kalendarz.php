<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "kalendarz";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section id="Blok_napisu">
        <p>
            <?php
                $Dzisiejsza_data = date('m-d');
                $Imiona = $polaczenie->query("SELECT imiona FROM imieniny WHERE data LIKE '$Dzisiejsza_data'");
                $Imiona = $Imiona->fetch_assoc();

                $Dni_tygodnia = ["Sunday" => "niedziela", "Monday" => "poniedziałek", "Tuesday" => "wtorek", "Wednesday" => "środa", "Thursday" => "czwartek", "Friday" => "piątek", "Saturday" => "sobota"];
                $Dzien_tygodnia = $Dni_tygodnia[date("l")];

                echo "Dzisiaj jest ".$Dzien_tygodnia.", ".date("d-m-Y").", imieniny: ".$Imiona['imiona'];
            ?>
        </p>
    </section>
    <section id="Blok_lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section id="Blok_srodkowy">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="post">
            <input type="date" name="Data_z_formularza" id="Data_z_formularza" min="2024-01-01" max="2024-12-31" value="2024-01-01" required>
            <input type="submit" value="wyślij">
        </form>
        <?php
            if (isset($_POST['Data_z_formularza']))
            {
                $Data_z_formularza = $_POST['Data_z_formularza'];
                $Data = new DateTime($Data_z_formularza);
                $Data = $Data->format('m-d');

                $Imiona = $polaczenie->query("SELECT imiona FROM imieniny WHERE data LIKE '$Data'");
                $Imie = $Imiona->fetch_assoc();
                echo "Dnia ".$Data_z_formularza." są imieniny: ".$Imie['imiona'];
            }
        ?>
    </section>
    <section id="Blok_prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="../Grafiki/kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
            </li>
            <li>księżycowy
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </li>
        </ol>
    </section>
    <footer>
        <p>Stronę opracował(a): Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>