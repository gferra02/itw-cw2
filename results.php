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
                            foreach ($_GET['country'] as $country_selected) {
                                if ($i != $country_count) {
                                  print $country_selected . ", ";
                                } else {
                                  // Fullstop after the last element.
                                  print $country_selected . ".";
                                }

                                $i++;

                                // Path to json levels
                                switch ($property_selected) {
                                  // Land boundaries, Coastline, Elevation
                                  case "Land boundaries":
                                  case "Coastline":
                                  case "Elevation":
                                    // $path_to_data[i] = "$result['Geography']";
                                    echo "path_to_data: " . $property_selected[i];
                                    break;

                                  // Population, Median age
                                  case "Population":
                                  case "Median age":
                                    // $path_to_data[i] = "$result['People and Society']";
                                    echo "path_to_data: " . [i];
                                    break;

                                  // Government type
                                  case "Government type":
                                    // $path_to_data[i] = "$result['Government']";
                                    echo "path_to_data: " . [i];
                                    break;

                                  // GDP - per capita (PPP), Unemployment rate, Exports, Imports
                                  case "GDP - per capita (PPP)":
                                  case "Unemployment rate":
                                  case "Exports":
                                  case "Imports":
                                    // $path_to_data[i] = "$result['Economy']";
                                    echo "path_to_data: " . [i];
                                    break;
                                }

                                switch ($country_selected) {
                                    case "France":
                                        $url[i] = $base_url . "fr.json";
                                        $string = file_get_contents($url[i]);
                                        # Read the JSON output into an associative array
                                        $result  = json_decode($string, true);

                                        # Find out how many land boundaries details
                                        $num_geo = count($result['Geography']);
                                        $num_land = count($result['Geography']['Land boundaries']);

                                        // Source: https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/
                                        echo '<p>Property selected: ' . $property_selected . '</p>';
                                        foreach ($result['Geography'][$property_selected] as $key => $value) {
                                          echo '<strong>' . $key . '</strong>: ' . $value['text'] . '<br>';
                                        }

                                        echo " URL: " . $url[i] . "</p>";
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
                        }

                    } else {
                        // Basic error checking on properties
                        print "<p class=\"error\">Please select between 1 and 5 properties.</p>";
                    }

                    print "</p>";

                } else {
                    // Basic error checking on country
                    print "<p class=\"error\">You need to select at least one country for me to give you something!</p>";
                }
            ?>

            <p><a class="button" a href="index.html">< Back</a></p>
        </div>
    </main>
</body>
</html>