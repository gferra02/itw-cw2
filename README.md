# Second Coursework for Internet and Web Technologies module (2017/18)
The following coursework will be assessed and counts 10% of the final mark for this module.

## The task
You will be working with JSON data derived from [The World Factbook](https://www.cia.gov/library/publications/the-world-factbook/), published by the CIA. The whole factbook is over 14MB, so you will instead work with data from four countries: France, Germany, Italy and the UK. The JSON data is available in the files [fr.json](http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/coursework/fr.json), [gm.json](http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/coursework/gm.json), [it.json](http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/coursework/it.json) and [uk.json](http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/coursework/uk.json), respectively. You should save copies of these files into your own web space.

The product of the coursework will be an HTML page using which a user can compare data regarding (some subset of) the four countries. The HTML page should contain appropriate form controls for user input (text boxes, drop-down selections and/or check boxes). The user input should be processed by a PHP script residing on the DCS titan web server, with an HTML page containing the output being returned to the user.

The HTML page should allow a user to:

1. select one to four of the above countries

2. select up to 5 property values out of a total of 10 to compare; you are free to choose the properties yourself, but they might include those such as geographical area (land, water, etc), coastline length, life expectancy, population, birth rate, death rate, population growth rate, (youth) unemployment rate, population below poverty line, labour force by occupation, etc.

3. view some/all of the results as a chart/diagram

The result should be returned as an HTML table, formatted appropriately. The techniques you need to use are discussed in the slides on [Server-side processing](http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/server/server.html) and those on <a href="http://www.dcs.bbk.ac.uk/~ptw/teaching/IWT/server/server.html#(20)">PHP and JSON</a> in particular. For item (3) above, you are free to use any Javascript library to produce the charts/diagrams. Your solution should work in either Chrome or Firefox. Please specify which browser you used in a comment at the start of your HTML file.

How to set up and access a web page on the department's titan web server is explained [here](https://www.dcs.bbk.ac.uk/intranet/index.php/Create_a_personal_web_page).

## Handing in the coursework
The deadline for submission is _**6pm on Tuesday 17th April 2018**_. Please submit the coursework via Moodle _**as a single zip file**_ containing a single HTML file and a single PHP file (and the Javascript library file if it is referenced locally rather than over the web). You should not submit any instructions or explanations in a separate file. Instead, the interface should be self explanatory and the code should be commented appropriately.

Remember that plagiarism is taken very seriously by the Department and the College (see the relevant section in your programme booklet). Consequently, you are required to state the following in a comment at the start of your HTML file: _I confirm that this report is entirely my own work, except where explicitly stated otherwise_. Your report may be submitted to an online plagiarism detection service. The College's disciplinary procedure will be invoked in any cases of suspected plagiarism.

The College policy with regard to late submission of coursework is described in the MSc/MRes programme booklet. No extensions will be granted. The cut-off date for submissions is _6pm on Tuesday 24th April 2018_. Submissions after this date will not be marked. Those submitted after 6pm on the 17th April and before 6pm on the 24th April, where mitigating circumstances are not accepted, will receive a maximum mark of 50%.

## Marking
Marks will be awarded out of 20.

Your program should be properly structured and should include comments and some simple error checking. The user interface does not need to be elaborate, but it should be clear to the user how to use it.

Marks will be awarded out of 20. The areas in which marks will be awarded and the maximum mark possible in each case are as follows:

|Criteria                          |Mark|
|:---------------------------------|---:|
|friendliness of the user interface|  2 |
|code structure and documentation  |  2 |
|error handling in the code        |  2 |
|output suitably presented         |  2 |
|up to 4 countries comparable      |  3 |
|up to 5 properties comparable     |  4 |
|production of charts/diagrams     |  5 |

Full marks for the first 4 items above will not be awarded if only a partial solution is provided for the others.

Comments on your report, along with the mark you were awarded, should be returned to you within 4 weeks of the cut-off date.
