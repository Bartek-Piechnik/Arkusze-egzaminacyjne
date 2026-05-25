<?php
    $host = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "forumpsy";

    $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza_danych);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <section id="Blok_lewy">
        <img src="../Grafiki/Avatar.png" alt="Użytkownik forum">
        <?php
            $Informacje_o_uzytkowniku = $polaczenie->query("SELECT k.nick, k.postow, p.pytanie FROM konta k JOIN pytania p ON k.id = p.konta_id WHERE p.id = 1");
            $Informacje_o_uzytkowniku = $Informacje_o_uzytkowniku->fetch_assoc();

            echo "<h4>Użytkownik: ".$Informacje_o_uzytkowniku['nick']."</h4>";
            echo "<p>".$Informacje_o_uzytkowniku['postow']." postów na forum</p>";
            echo "<p>".$Informacje_o_uzytkowniku['pytanie']."</p>";
        ?>
        <video src="../Grafiki/video.mp4" controls loop></video>
    </section>
    <section id="Blok_prawy">
        <form action="index.php" method="post">
            <textarea name="Pole_wierszowe" id="Pole_wierszowe" cols="40" rows="4"></textarea>
            <input type="submit" value="Dodaj odpowiedź" name="Przycisk_dodaj_odpowiedz">
            <?php
                if (isset($_POST['Przycisk_dodaj_odpowiedz']))
                {
                    if (!empty($_POST['Pole_wierszowe']))
                    {
                        $Pole_wierszowe = $_POST['Pole_wierszowe'];
                        $polaczenie->query("INSERT INTO odpowiedzi (Pytania_id, konta_id, odpowiedz) VALUES (1, 5, '$Pole_wierszowe')");
                    }
                }
            ?>
        </form>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php
                $Odpowiedzi = $polaczenie->query("SELECT o.id, o.odpowiedz, k.nick FROM odpowiedzi o JOIN konta k ON o.konta_id = k.id WHERE o.Pytania_id = 1");

                while ($Odpowiedz = $Odpowiedzi->fetch_assoc())
                {
                    echo "<li>".$Odpowiedz['odpowiedz']." <i>".$Odpowiedz['nick']."</i><hr></li>";
                }
            ?>
        </ol>
    </section>
    <footer>Autor: Bartek Piechnik 3Tpa <a href="https://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></footer>
    <?php $polaczenie->close() ?>
</body>
</html>