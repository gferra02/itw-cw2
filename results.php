<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Results | Ginestra Ferraro | Coursework 2 - IWT</title>
    <meta charset="utf-8">
    <meta author="Ginestra Ferraro">
    <meta description="Results - Second coursework for Internet and Web Technologies module.">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="wrapper">
            <h2>Ginestra Ferraro <small>MSc CS / Part-time 2017-18</small></h2>
            <h1>IWT - Coursework 2 / Results</h1>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <p><a class="button" a href="index.html">< Back</a></p>
            <?php
                if(!empty($_GET['country'])) {
                    foreach ($_GET['country'] as $country_selected) {
                        print "<p>".$country_selected."</p>";
                    }
                } else {
                    print "<p>You need to select at least one country for me to give you something!</p>";
                }

                // How to count
                $count = count($_GET['country']);

                print "<p>No. of countries selected: ".$count;


                if ($year >= 1901 && $year <= 2017) {
                  $url = 'http://api.nobelprize.org/v1/prize.json?year=' . $year;
                  $string = file_get_contents($url);

                  # Read the JSON output into an associative array
                  $result  = json_decode($string, true);

                  print "<p>In $year, the prizes were awarded as follows:</p><ul>\n";
                  # Find out how many prizes are listed
                  $num_prizes = count($result['prizes']);

                  for ($i = 0; $i < $num_prizes; $i++) {

                    # Print out the category
                    $cat = $result['prizes'][$i]['category'];
                    print "<li>in $cat to <ul>\n";

                    # Find out how many winners in this category
                    $num_winners = count($result['prizes'][$i]['laureates']);

                    for ($j = 0; $j < $num_winners; $j++) {

                      # Print out the names
                      $firstname = $result['prizes'][$i]['laureates'][$j]['firstname'];
                      $surname = $result['prizes'][$i]['laureates'][$j]['surname'];
                      print "<li>$firstname $surname </li>\n";

                    }
                    print "</ul></li>\n";
                  }
                  print "</ul>";
                }
                else {
                  print "<p>Year value out of range; years range from 1901 to 2017</p>";
                }
            ?>

            <p><a class="button" a href="index.html">< Back</a></p>
        </div>
    </main>
</body>
</html>