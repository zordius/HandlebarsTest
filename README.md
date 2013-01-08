HandlebarsTest
==============

Performance tests on Mustache and Handlebars php libs

Requirements
------------

* php 5.3+ with json suppport.

* nodejs04+ and handlebars for fixture generation.
  ( npm install handlebars )

Libraries
---------

Testing targets:

* pure php template with logic commands.

* Mustache.php https://github.com/bobthecow/mustache.php

* mustache-php https://github.com/dingram/mustache-php

* Handlebars.php https://github.com/XaminProject/handlebars.php

Testing data and templates:

* some examples converted from https://github.com/bobthecow/mustache.php/tree/master/test/fixtures/examples

Directories
-----------

* *cloned*: all cloned library files are placed here.
* *fixture*: all data files for testing are placed here:
   * .json : testing data files in json format
   * .tmpl : testing template files
   * .txt  : correct results
* *inc*: all required php lib files are placed here.
* *bin*: all testing scripts and commands are placed here.
