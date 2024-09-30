# Parser aviation routine weather reports
## _Decode aviation data in format METAR and TAF._

![Status static Badge](https://img.shields.io/badge/status-active-green)
[![PHP online compiler](https://img.shields.io/badge/try-online-blue)](https://onecompiler.com/php/42tr9mxr5)

This script is a PHP library which allows to parse the METAR and TAF code, and convert it to an array of data parameters. These METAR or TAF can be given in the form of the ICAO code string (in this case, the script will receive data from the NOAA website) or in raw format (just METAR/TAF code string). METAR or TAF code parsed using the syntactic analysis and regular expressions. It solves the problem of parsing the data in the presence of any error in the code METAR or TAF. In addition to the return METAR parameters, the script also displays the interpreted (easy to understand) information of these parameters.

## Installation

Copy all files to your repository on web server. Change the variable raw to get the result. Run index.php in internet browser.

Links:
- https://mediawiki.ivao.aero/index.php?title=METAR_explanation
- http://woody.cowpi.com/phpscripts/
- http://www.hsdn.org/
