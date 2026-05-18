<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylizacja paznokci</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <aside>
        <img src="../Grafiki/manicure.jpg" alt="Stylizacja paznokci">
    </aside>
    <main>
        <header>
            <h1>Twoje wymarzone paznokcie</h1>
        </header>
        <nav>
            <button type="submit" id="Przycisk_1">Kolor</button>
            <button type="submit" id="Przycisk_2">Kształt</button>
            <button type="submit" id="Przycisk_3">Wzór</button>
        </nav>
        <section id="Sekcja_1">
            <h2>Kolor</h2>
            <img src="../Grafiki/kolory.png" alt="Kolory paznokci">
            <br>
            <input type="color" name="" id="" value="#FF0000">
        </section>
        <section id="Sekcja_2">
            <h2>Kształt</h2>
            <img src="../Grafiki/ksztalt.png" alt="Kształty paznokci">
            <br>
            <select name="" id="">
                <option value="">migdał</option>
                <option value="">zaokrąglony</option>
                <option value="">kwadratowy</option>
                <option value="">balerina</option>
                <option value="">zaokrąglony kwadrat</option>
            </select>
        </section>
        <section id="Sekcja_3">
            <h2>Wzór</h2>
            <?php
                for ($i = 1; $i <= 10; $i++)
                {
                    echo "<img src='../Grafiki/$i.jpg' alt='' class='wzory' title='$i'>";
                }
            ?>
            <br>
            <input type="number" name="" id="" min="1" max="10">
        </section>
    </main>
    <footer>
        <p>Autor strony: <i>Bartek Piechnik 3Tpa</i></p>
    </footer>
    <script>
        var Przycisk_1 = document.getElementById('Przycisk_1');
        var Przycisk_2 = document.getElementById('Przycisk_2');
        var Przycisk_3 = document.getElementById('Przycisk_3');

        var Sekcja_1 = document.getElementById('Sekcja_1');
        var Sekcja_2 = document.getElementById('Sekcja_2');
        var Sekcja_3 = document.getElementById('Sekcja_3');

        Przycisk_1.addEventListener("mouseover", function () {
            Sekcja_1.style.display = "block";
            Sekcja_2.style.display = "none";
            Sekcja_3.style.display = "none";

            Przycisk_1.style.backgroundColor = "Salmon";
            Przycisk_2.style.backgroundColor = "Crimson";
            Przycisk_3.style.backgroundColor = "Crimson";
        });

        Przycisk_2.addEventListener("mouseover", function () {
            Sekcja_1.style.display = "none";
            Sekcja_2.style.display = "block";
            Sekcja_3.style.display = "none";

            Przycisk_1.style.backgroundColor = "Crimson";
            Przycisk_2.style.backgroundColor = "Salmon";
            Przycisk_3.style.backgroundColor = "Crimson";
        });

        Przycisk_3.addEventListener("mouseover", function () {
            Sekcja_1.style.display = "none";
            Sekcja_2.style.display = "none";
            Sekcja_3.style.display = "block";

            Przycisk_1.style.backgroundColor = "Crimson";
            Przycisk_2.style.backgroundColor = "Crimson";
            Przycisk_3.style.backgroundColor = "Salmon";
        });
    </script>
</body>
</html>