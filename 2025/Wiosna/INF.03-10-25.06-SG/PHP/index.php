<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "szkolenia";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    <main>
        <section id="Sekcja_lewa">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $Kursy = $polaczenie->query("SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC");

                    while ($Kurs = $Kursy->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td><img src='../Grafiki/".$Kurs['kod'].".jpg' alt='kurs'></td>";
                            echo "<td>".$Kurs['nazwa']."</td>";
                            echo "<td>".$Kurs['cena']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="Sekcja_prawa">
            <h2>Zapisy na kursy</h2>
            <form action="index.php" method="post">
                <label for="Imie">Imię</label><br>
                <input type="text" name="Imie" id="Imie"><br>
                <label for="Nazwisko">Nazwisko</label><br>
                <input type="text" name="Nazwisko" id="Nazwisko"><br>
                <label for="Wiek">Wiek</label><br>
                <input type="number" name="Wiek" id="Wiek"><br>
                <label for="Rodzaj_kursu">Rodzaj kursu</label><br>
                <select name="Rodzaj_kursu" id="Rodzaj_kursu">
                    <?php
                        $Nazwy_kursow = $polaczenie->query("SELECT nazwa FROM kursy");

                        while ($Nazwa_kursu = $Nazwy_kursow->fetch_assoc())
                        {
                            echo "<option value='".$Nazwa_kursu['nazwa']."'>".$Nazwa_kursu['nazwa']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Dodaj dane" name="Przycisk_dodaj_dane">
            </form>
            <?php
                if (isset($_POST['Przycisk_dodaj_dane']))
                {
                    if (!empty($_POST['Imie']) && !empty($_POST['Nazwisko']) && !empty($_POST['Wiek']))
                    {
                        $Imie = $_POST['Imie'];
                        $Nazwisko = $_POST['Nazwisko'];
                        $Wiek = $_POST['Wiek'];

                        $Wynik = $polaczenie->query("INSERT INTO uczestnicy (imie, nazwisko, wiek) VALUES ('$Imie', '$Nazwisko', $Wiek)");

                        echo "<p>Dane uczestnika ".$Imie." ".$Nazwisko." zostały dodane</p>";
                    }
                    else
                    {
                        echo "<p>Wprowadź wszystkie dane</p>";
                    }
                }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Bartek Piechnik 3Tpa</p>
    </footer>
    <?php $polaczenie->close() ?>
</body>
</html>