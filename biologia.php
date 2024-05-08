<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Szkoła Podstawowa</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="banner">
            <h1> Oceny uczniów: biologia </h1>
        </div>
        <div id="left">
            <h3> Uczeń: 
                <?php 
                    $baza = mysqli_connect('localhost','root','');
                    if (mysqli_connect_error()) {
                        exit();
                    }
                    mysqli_select_db($baza, 'szkola');
                    mysqli_query($baza, "SET CHARACTER SET UTF8");
                                    
                    $sql = "SELECT uczen.imie, uczen.nazwisko FROM uczen WHERE uczen.id = 1;";
                    $wynik = mysqli_query($baza, $sql);
                                    
                    if (mysqli_num_rows($wynik) > 0) {
                        while($wiersz = mysqli_fetch_assoc($wynik)) {
                        echo $wiersz["imie"] . $wiersz["nazwisko"];
                    }
                    } else {
                        echo "Brak wyników";
                    }
                    mysqli_close($baza);
                ?>
            </h3>
            <p> Najwyższa ocena z biologii: 
                <?php 
                    $baza = mysqli_connect('localhost','root','');
                    if (mysqli_connect_error()) {
                        exit();
                    }
                    mysqli_select_db($baza, 'szkola');
                    mysqli_query($baza, "SET CHARACTER SET UTF8");
                                    
                    $sql = "SELECT MAX(ocena.ocena) AS 'Najwyzsza_Ocena' FROM uczen INNER JOIN ocena ON ocena.uczen_id = uczen.id WHERE uczen.id = 1;";
                    $wynik = mysqli_query($baza, $sql);
                                    
                    if (mysqli_num_rows($wynik) > 0) {
                        while($wiersz = mysqli_fetch_assoc($wynik)) {
                        echo $wiersz["Najwyzsza_Ocena"];
                    }
                    } else {
                        echo "Brak wyników";
                    }
                    mysqli_close($baza);
                ?>
            </p>
        </div>
        <div id="right">
            <h3> Nazwiska i numery PESEL uczniów: </h3>
            <ul>
                <?php
                    $baza = mysqli_connect('localhost','root','');
                    if (mysqli_connect_error()) {
                        exit();
                    }
                    mysqli_select_db($baza, 'szkola');
                    mysqli_query($baza, "SET CHARACTER SET UTF8");
                                    
                    $sql = "SELECT uczen.nazwisko, uczen.PESEL FROM uczen;";
                    $wynik = mysqli_query($baza, $sql);
                                    
                    if (mysqli_num_rows($wynik) > 0) {
                        while($wiersz = mysqli_fetch_assoc($wynik)) {
                        echo "<li>" . $wiersz["nazwisko"] . " " . $wiersz["PESEL"] . "</li>";
                    }
                    } else {
                        echo "Brak wyników";
                    }
                    mysqli_close($baza);
                ?>
            </ul>
        </div>
        <footer>
            <h2> Szkoła Podstawowa </h2>
            <p> Stronę opracował: Mateusz Lubański </p>
        </footer>
    </body>
</html>