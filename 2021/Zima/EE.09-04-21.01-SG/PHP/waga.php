<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "egzamin";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="../CSS/styl4.css">
</head>
<body>
    <header>
        <h2>Oblicz wskaźnik BMI</h2>
    </header>
    <section id="Logo">
        <img src="../Grafiki/wzor.png" alt="liczymy BMI">
    </section>
    <section id="Blok_lewy">
        <img src="../Grafiki/rys1.png" alt="zrzuć kalorie!">
    </section>
    <section id="Blok_prawy">
        <h1>Podaj dane</h1>
        <form action="waga.php" method="post">
            <label for="Waga">Waga:</label><br>
            <input type="number" name="Waga" id="Waga"><br>
            <label for="Wzrost_cm">Wzrost [cm]:</label><br>
            <input type="number" name="Wzrost_cm" id="Wzrost_cm"><br>
            <input type="submit" value="Licz BMI i zapisz wynik" name="Przycisk_licz_BMI_i_zapisz_wynik">
        </form>
        <?php
            if (isset($_POST['Przycisk_licz_BMI_i_zapisz_wynik']))
            {
                if (!empty($_POST['Waga']) && !empty($_POST['Wzrost_cm']))
                {
                    $Waga = $_POST['Waga'];
                    $Wzrost_cm = $_POST['Wzrost_cm'];

                    $Wskaznik_BMI = $Waga / ($Wzrost_cm * $Wzrost_cm) * 10000;

                    echo "<p>Twoja waga: ".$Waga."; Twój wzrost: ".$Wzrost_cm." <br> BMI wynosi: ".$Wskaznik_BMI."</p>";

                    if ($Wskaznik_BMI < 18) 
                    {
                        $Przedzial_BMI = 1;
                    }
                    else if ($Wskaznik_BMI >= 19 && $Wskaznik_BMI <= 25) 
                    {
                        $Przedzial_BMI = 2;
                    }
                    else if ($Wskaznik_BMI >= 26 && $Wskaznik_BMI <= 30)
                    {
                        $Przedzial_BMI = 3;
                    }
                    else if ($Wskaznik_BMI > 30) 
                    {
                        $Przedzial_BMI = 4;
                    }  

                    $Data_pomiaru = date("Y-m-d");
                    $Wynik = $polaczenie->query("INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($Przedzial_BMI, '$Data_pomiaru', $Wskaznik_BMI)");
                }
            }
        ?>
    </section>
    <main>
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od…</th>
            </tr>
            <?php
                $Informacje_o_BMI = $polaczenie->query("SELECT id, informacja, wart_min FROM bmi");

                while ($Informacja_o_BMI = $Informacje_o_BMI->fetch_assoc())
                {
                    echo "<tr>";
                        echo "<td>".$Informacja_o_BMI['id']."</td>";
                        echo "<td>".$Informacja_o_BMI['informacja']."</td>";
                        echo "<td>".$Informacja_o_BMI['wart_min']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
    <footer>Autor: Bartek Piechnik 3Tpa <a href="../Baza/kw2.png">Wynik działania kwerendy 2</a></footer>
    <?php $polaczenie->close() ?>
</body>
</html>