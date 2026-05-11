<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "mieszalnia";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="../Grafiki/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <img src="../Grafiki/baner.png" alt="Mieszalnia farb">
    </header>
    <form action="index.php" method="post">
        <label for="Data_odbioru_od">Data odbioru od: </label>
        <input type="date" name="Data_odbioru_od" id="Data_odbioru_od">
        <label for="Data_odbioru_do">do: </label>
        <input type="date" name="Data_odbioru_do" id="Data_odbioru_do">
        <input type="submit" value="Wyszukaj">
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
                if (!isset($_POST['Data_odbioru_od']) || !isset($_POST['Data_odbioru_do']))
                {
                    $Zamowienia = $polaczenie->query("SELECT k.Nazwisko, k.Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON z.id_klienta = k.Id ORDER BY z.data_odbioru ASC");

                    while ($Zamowienie = $Zamowienia->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>".$Zamowienie['id']."</td>";
                            echo "<td>".$Zamowienie['Nazwisko']."</td>";
                            echo "<td>".$Zamowienie['Imie']."</td>";
                            echo "<td style='background-color:#".$Zamowienie['kod_koloru'].";'>".$Zamowienie['kod_koloru']."</td>";
                            echo "<td>".$Zamowienie['pojemnosc']."</td>";
                            echo "<td>".$Zamowienie['data_odbioru']."</td>";
                        echo "</tr>";
                    }
                }
                else
                {
                    $Data_odbioru_od = $_POST['Data_odbioru_od'];
                    $Data_odbioru_do = $_POST['Data_odbioru_do'];

                    $Zamowienia = $polaczenie->query("SELECT k.Nazwisko, k.Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON z.id_klienta = k.Id WHERE z.data_odbioru BETWEEN '$Data_odbioru_od' AND '$Data_odbioru_do' ORDER BY z.data_odbioru ASC");

                    while ($Zamowienie = $Zamowienia->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>".$Zamowienie['id']."</td>";
                            echo "<td>".$Zamowienie['Nazwisko']."</td>";
                            echo "<td>".$Zamowienie['Imie']."</td>";
                            echo "<td style='background-color:#".$Zamowienie['kod_koloru'].";'>".$Zamowienie['kod_koloru']."</td>";
                            echo "<td>".$Zamowienie['pojemnosc']."</td>";
                            echo "<td>".$Zamowienie['data_odbioru']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close()?>
</body>
</html>