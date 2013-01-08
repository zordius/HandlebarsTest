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

* https://github.com/bobthecow/mustache.php/tree/master/test/fixtures/examples

Directories
-----------

* *cloned*: all cloned library files are placed here.
* *data*: all data files for testing are placed here, in json format.
* *template*: all template files for testing are placed here.
* *inc*: all required php lib files are placed here.
* *bin*: all testing scripts and commands are placed here.
