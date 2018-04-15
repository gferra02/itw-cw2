$(document).ready(function() {
    // I'm using jQuery to exctrat the data I need for the visualization
    // from the table.
    // I split in mini arrays.

    // Get the th Country labels (exclude first th "Property")
    var countryLabels = [];

    $("th").not(":first-child").each(function() {
        countryLabels.push($(this).text());
    });
    // console.log(countryLabels);

    // Get the property labels (first td only)
    var propertyLabels = [];

    $("tr.results").each(function () {
        var tdArray = [];

        $(this).find('td:first-child').each(function() {
            tdArray.push($(this).text());
        });

        propertyLabels.push(tdArray);
    });
    // console.log(propertyLabels);

    // Get the values only
    var results = [];

    $("tr.results").each(function () {
        var tdArray = [];

        $(this).find('td').not(":first-child").each(function() {
            // Extract values from table and store them in an array
            var getFirstNum = /[\d|,|.|\+]+/g;
            var string = $(this).text();
            // remove commas from numbers
            var cleanString = string.replace(/,/g,'');
            var numResult = cleanString.match(getFirstNum);

            tdArray.push(numResult[0]);
        });

        results.push(tdArray);
    });
    // console.log(results);

    // Trying to use .map() to create the right array
    var thisMap = $.map(propertyLabels, function(p, c) {
        // creating an object for every property
        return { property: p, value: results[c] };
    });
    // console.log(thisMap);

    thisMap.forEach(function(d) {
        var graph = d3.select('.chart');
        graph.append('h3').text(d.property);
            var max = d3.max(d.value);
            console.log(max);

        for(i = 0; i < d.value.length; i++) {

            graph.append('div')
            .attr("class", "bar"+i)
            // .style("width", d.value[i]/100 + "%")
            .style("width", function() {
                if (d.value[i] == max) {
                    return "100%";
                } else {
                    return d.value[i] * 100 / max + "%";
                }
            })
            .text(d.value[i]);
        }
    });
});