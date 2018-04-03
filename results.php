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
                    // Count how many properties have been selected
                    $property_count = count($_GET['property']);

                    if ($property_count > 0 && $property_count < 6) {

                        print "<table><thead><tr><th>Country</th>";

                        foreach ($_GET['property'] as $property_selected) {
                            print "<th>$property_selected</th>";
                        }

                        print "</tr></thead><tbody>";

                        foreach ($_GET['property'] as $property_selected) {
                            print "<tr>";
                            foreach ($_GET['country'] as $country_selected) {
                                print "<td>" . $country_selected . "</td>";
                                // Path to json levels
                                switch ($property_selected) {
                                  // Land boundaries, Coastline, Elevation
                                  case "Land boundaries":
                                  case "Coastline":
                                  case "Elevation":
                                    $path_to_data[j] = "Geography";
                                    break;

                                  // Population, Median age
                                  case "Population":
                                  case "Median age":
                                    $path_to_data[j] = "People and Society";
                                    break;

                                  // Government type
                                  case "Government type":
                                    $path_to_data[j] = "Government";
                                    break;

                                  // GDP - per capita (PPP), Unemployment rate, Exports, Imports
                                  case "GDP - per capita (PPP)":
                                  case "Unemployment rate":
                                  case "Exports":
                                  case "Imports":
                                    $path_to_data[j] = "Economy";
                                    break;
                                }

                                switch ($country_selected) {
                                    case "France":
                                        $url[i] = $base_url . "fr.json";
                                        $string = file_get_contents($url[i]);
                                        # Read the JSON output into an associative array
                                        $result  = json_decode($string, true);

                                        // Source: https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/
                                        // echo '<p>Property selected: ' . $property_selected . '</p>';
                                        foreach ($result[$path_to_data[j]][$property_selected] as $key => $value) {
                                          echo '<strong>' . $key . '</strong>: ' . $value['text'] . '<br>';
                                        }
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