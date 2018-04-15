// I am using the jQuery plugin 'table-to-json' to generate
// a json array I can use to create the chart.
// Source: https://github.com/lightswitch05/table-to-json

$(document).ready(function() {

    // Get the th Country labels (exclude first th "Property")
    var countryLabels = [];

    $("th").not(":first-child").each(function() {
        countryLabels.push($(this).text());
    });

    console.log(countryLabels);

    // Get the property labels (first td only)
    var propertyLabels = [];

    $("tr.results").each(function () {
        var innerArray = [];

        $(this).find('td:first-child').each(function() {
            innerArray.push($(this).text());
        });

        propertyLabels.push(innerArray);
    });

    console.log(propertyLabels);

    // Get the values only
    var results = [];

    $("tr.results").each(function () {
        var innerArray = [];

        $(this).find('td').not(":first-child").each(function() {
            // Extract values from table and store them in an array
            var getFirstNum = /[\d|,|.|\+]+/g;
            var string = $(this).text();
            // remove commas from numbers
            var cleanString = string.replace(/,/g,'');
            var numResult = cleanString.match(getFirstNum);

            innerArray.push(numResult[0]);
        });

        results.push(innerArray);
    });

    console.log(results);

    // Combine the three arrays above to pass to D3JS

    data = [countryLabels, propertyLabels, results];
    console.log(data);

    /*** Simple div graph ***/
    d3.select(".chart")
      .selectAll("div")
        .data(data)
      .enter().append("div")
        .style("width", function(d) {
            if (d > 20000) {
                return d/1000000 + "%";
            } else {
                return d/100 + "%";
            }
        })
        .text(function(d) { return d; });
    /******/
});