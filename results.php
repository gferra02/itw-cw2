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
                /* Settings */
                // Base URL
                $base_url = __DIR__ . "/json/";

                // Count how many Countries have been selected
                $country_count = count($_GET['country']);

                print "<p>No. of countries selected: " . $country_count . "</p>";
                if(!empty($_GET['country'])) {
                    $i = 1; // Using this var to check last elements in array

                    print "<p><strong>Countries selected: </strong>";

                    // Count how many properties have been selected
                    $property_count = count($_GET['property']);

                    print "No. of properties selected: " . $property_count . ", ";

                    if ($property_count > 0 && $property_count < 6) {

                        foreach ($_GET['property'] as $property_selected) {
                          print "Property selected: " . $property_selected . ", Countries selected: ";
                        }
                    } else {
                        // Basic error checking
                        print "<p class=\"error\">Please select between 1 and 5 properties.</p>";
                    }

                    // Path to json levels

/*
                    switch ($property_selected) {
                      // Land boundaries, Coastline, Elevation
                      case "Land boundaries":
                      case "Coastline":
                      case "Elevation":
                        $path_to_data = "$result['Geography']";
                        break;

                      // Population, Median age
                      case "Population":
                      case "Median age":
                        $path_to_data = "$result['People and Society']";
                        break;

                      // Government type
                      case "Government type":
                        $path_to_data = "$result['Government']";
                        break;

                      // GDP - per capita (PPP), Unemployment rate, Exports, Imports
                      case "GDP - per capita (PPP)":
                      case "Unemployment rate":
                      case "Exports":
                      case "Imports":
                        $path_to_data = "$result['Economy']";
                        break;
                    }

                    echo "$path_to_data: " . $path_to_data;
*/
                    foreach ($_GET['country'] as $country_selected) {
                        if ($i != $country_count) {
                          print $country_selected . ", ";
                        } else {
                          // Fullstop after the last element.
                          print $country_selected . ".";
                        }

                        $i++;

                        switch ($country_selected) {
                            case "France":
                                $url[i] = $base_url . "fr.json";
                                $string = file_get_contents($url[i]);
                                # Read the JSON output into an associative array
                                $result  = json_decode($string, true);

                                print "<div><h2>Try this</h2>";
                                print_r($result['Geography']['Land boundaries']);
                                print "<h2>The End</h2></div>";
                                # Find out how many land boundaries details
                                $num_geo = count($result['Geography']);
                                $num_land = count($result['Geography']['Land boundaries']);

                                // Source: https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/
                                foreach ($result['Geography']['Land boundaries'] as $key => $value) {
                                  echo '<strong>' . $key . '</strong>: ' . $value['text'] . '<br>';
                                }
                                
                                for ($i = 0; $i < $num_geo; $i++) {
                                  for($j = 0; $j < $num_land; $j++) {
                                    # Print out the details
                                    $details = $result['Geography']['Land boundaries']['text'];
                                    print "<li>in " . $result['Geography'] . " to </li>\n";
                                  }
                                }
                                echo "</ul> URL: " . $url[i];
                                break;
                            case "Germany":
                                $url[i] = $base_url . "gm.json?";
                                echo " URL: " . $url[i];
                                break;
                            case "Italy":
                                $url[i] = $base_url . "it.json?";
                                echo " URL: " . $url[i];
                                break;
                            case "UK":
                                $url[i] = $base_url . "uk.json?";
                                echo " URL: " . $url[i];
                                break;
                        }
                    }

                    print "</p>";

                } else {
                    // Basic error checking
                    print "<p class=\"error\">You need to select at least one country for me to give you something!</p>";
                }


                // DELETE ONCE DONE

                $year = 1979;

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