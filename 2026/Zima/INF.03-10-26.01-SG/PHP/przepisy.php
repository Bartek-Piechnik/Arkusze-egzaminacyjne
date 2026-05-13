<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "przepisy";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);

    if (isset($_GET['id']))
    {
        $ID = $_GET['id'];
    }
    else
    {
        $ID = 7;
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <aside>
        <a href="przepisy.php?id=1" id="1">Sernik</a><br>
        <a href="przepisy.php?id=2" id="2">Sałatka</a><br>
        <a href="przepisy.php?id=3" id="3">Pankejki</a><br>
        <a href="przepisy.php?id=4" id="4">Nugetsy</a><br>
        <a href="przepisy.php?id=5" id="5">Łosoś</a><br>
        <a href="przepisy.php?id=6" id="6">Kociołek</a><br>
        <a href="przepisy.php?id=7" id="7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8" id="8">Hamburgery</a><br>
        <a href="przepisy.php?id=9" id="9">Eklerki</a><br>
        <a href="przepisy.php?id=10" id="10">Churros</a><br>
        <p>Autor: Bartek Piechnik 3Tpa</p>
    </aside>
    <main>
        <?php
            $Rodzaj = $polaczenie->query("SELECT p.nazwa, r.rodzaj FROM potrawy p JOIN rodzaje r ON p.idRodzaje = r.idRodzaje WHERE p.idPotrawy = $ID");
            $Rodzaj = $Rodzaj->fetch_assoc();
            $Rodzaj = $Rodzaj['rodzaj'];

            echo "<h1>".$Rodzaj."</h1>";
        ?>

        <?php
            $Potrawa = $polaczenie->query("SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $ID");
            $Potrawa = $Potrawa->fetch_assoc();
            $Nazwa = $Potrawa['nazwa'];
            $Kalorie = $Potrawa['kalorie'];

            if ($Potrawa['trudnosc'] == 1)
            {
                $Trudnosc = "łatwe";
            }
            else if ($Potrawa['trudnosc'] == 2)
            {
                $Trudnosc = "średnie";
            }
            else if ($Potrawa['trudnosc'] == 3)
            {
                $Trudnosc = "trudne";
            }
            else
            {
                $Trudnosc = "inne";
            }

            echo "<h2>".$Nazwa."</h2>";
            echo "<p>Trudność: ".$Trudnosc.", Kalorie: ".$Kalorie."</p>";
        ?>
        <img src="../Grafiki/separator.png" alt="przepis">
        <p>Alergeny: 
            <?php
                $Tablica_alergenow = [];

                $Alergeny = $polaczenie->query("SELECT p.nazwa, a.alergen FROM potrawy p JOIN lista_alergenow la ON la.idPotrawy = p.idPotrawy JOIN alergeny a ON a.idAlergeny = la.idAlergeny WHERE la.idPotrawy = $ID");
                while ($Alergen = $Alergeny->fetch_assoc())
                {
                    $Tablica_alergenow[] = $Alergen['alergen'];
                }

                $Alergeny = implode(" ", $Tablica_alergenow);
                echo $Alergeny;
            ?>
        </p>
        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
        </ul>
        <p>
            <?php
                $Potrawa = $polaczenie->query("SELECT przepis, plik FROM potrawy WHERE idPotrawy = $ID");
                $Potrawa = $Potrawa->fetch_assoc();

                $Przepis = $Potrawa['przepis'];
                $Plik = $Potrawa['plik'];
                echo $Przepis;
            ?>
        </p>
    </main>
    <section style="background-image: url('../Grafiki/<?php echo $Plik ?>');">
        <h1>Blog Kulinarny</h1>
    </section>
    <?php $polaczenie->close() ?>
</body>
</html>