HandlebarsTest
==============

Performance tests on Mustache and Handlebars php libs

Requirements
------------

* php 5.3+ with json and mbstring suppport.

* [optional] nodejs04+ and handlebars for fixture generation.
  ( npm install handlebars )

* [optional] nodejs06+ and amanda for json schema validation.
  ( npm install amanda )

Quick Conclusion
----------------
<b>Use https://github.com/zordius/lightncandy to compile handlebars in php, because:</b>

* it runs 4~6 times faster than https://github.com/bobthecow/mustache.php
* it runs 4~10 times faster than https://github.com/dingram/mustache-php
* it runs 10~30 times faster than https://github.com/XaminProject/handlebars.php

Detail reports please browse the 'report' directory.

Libraries
---------

Testing targets:

* pure php template with logic commands.

* Mustache.php https://github.com/bobthecow/mustache.php

* mustache-php https://github.com/dingram/mustache-php

* Handlebars.php https://github.com/XaminProject/handlebars.php

* lightncandy https://github.com/zordius/lightncandy

Testing data and templates:

* some examples converted from https://github.com/bobthecow/mustache.php/tree/master/test/fixtures/examples

Directories
-----------

* *cloned*: all cloned library files are placed here.
* *fixture*: all data files for testing are placed here:
   * .json : testing data files in json format
   * .tmpl : testing template files
   * .txt  : correct results and library outputs
   * .php  : lightncandy generated php template
* *inc*: all required php lib files are placed here.
* *bin*: all testing scripts and commands are placed here.
* *report*: all reports generated by bin/hbreport are placed here, in different format.

Feature Comparison
------------------
* YES : Exact same behavior with handlebars.js run in nodejs
* NO : Do not support, can not parse the template
* OUTPUT : Do not output for array value, object or true
* CR/LF : Output more or less CR/LF (minor issue)
* QUOTE : Encode ' to &amp;#039;, not to &amp;#x27; (minor issue)
* SINGLEQUOTE : Do not encode ' to &amp;#x27;

<pre>
|       test case       | handlebars.php        |       lightncandy     |       mustache-php    |       mustache.php  |
|  001-simple-vars-001  |                 YES   |                 YES   |              OUTPUT   |                 YES |
|  001-simple-vars-002  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  001-simple-vars-003  |                 YES   |                 YES   |              OUTPUT   |                 YES |
|  001-simple-vars-004  |                 YES   |                 YES   |              OUTPUT   |                 YES |
|  001-simple-vars-005  |                 YES   |                 YES   |              OUTPUT   |                 YES |
|  001-simple-vars-006  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|    002-simple-if-001  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|    002-simple-if-002  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|    002-simple-if-003  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|  003-simple-else-001  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|  003-simple-else-002  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|  003-simple-else-003  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|  003-simple-else-004  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-005  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-006  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-007  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-008  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-009  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|  003-simple-else-010  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-011  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  003-simple-else-012  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 004-simple-mvars-001  |                 YES   |                 YES   |                 YES   |                 YES |
| 004-simple-mvars-002  |                 YES   |                 YES   |                 YES   |                 YES |
| 004-simple-mvars-003  |                 YES   |                 YES   |                 YES   |                 YES |
| 004-simple-mvars-004  |                 YES   |                 YES   |                 YES   |                 YES |
| 05-simple-escape-001  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 05-simple-escape-002  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 05-simple-escape-003  |              OUTPUT   |               QUOTE   |              OUTPUT   |              OUTPUT |
| 6-simple-section-001  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-002  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-003  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 6-simple-section-004  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 6-simple-section-005  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-006  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-007  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-008  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 6-simple-section-009  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| -simple-sections-001  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| -simple-sections-002  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| -simple-sections-003  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| -simple-sections-004  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 8-simple-comment-001  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
| 8-simple-comment-002  |               CR/LF   |                 YES   |                 YES   |               CR/LF |
|   009-simple-dot-001  |         SINGLEQUOTE   |               QUOTE   |              OUTPUT   |         SINGLEQUOTE |
|   009-simple-dot-002  |                 YES   |                 YES   |              OUTPUT   |                 YES |
|   009-simple-dot-003  |                 YES   |                 YES   |              OUTPUT   |                 YES |
| le-doublesection-001  |              OUTPUT   |                 YES   |                 YES   |              OUTPUT |
| le-doublesection-002  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| le-doublesection-003  |                  NO   |                 YES   |              OUTPUT   |              OUTPUT |
| le-doublesection-004  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| le-doublesection-005  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 1-simple-context-001  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
| 1-simple-context-002  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-001  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-002  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-003  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-004  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-005  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|  012-simple-this-006  |              OUTPUT   |                 YES   |              OUTPUT   |              OUTPUT |
|      013-hb-each-001  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-002  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-003  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-004  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-005  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-006  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-007  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-008  |               CR/LF   |                 YES   |                  NO   |                  NO |
|      013-hb-each-009  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|        014-hb-if-001  |               CR/LF   |                 YES   |                  NO   |                  NO |
|        014-hb-if-002  |               CR/LF   |                 YES   |                  NO   |                  NO |
|        014-hb-if-003  |               CR/LF   |                 YES   |                  NO   |                  NO |
|    015-hb-unless-001  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|    015-hb-unless-002  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|    015-hb-unless-003  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|  016-hb-eachthis-001  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|  016-hb-eachthis-002  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|      017-hb-with-001  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|      017-hb-with-002  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|  018-hb-withwith-001  |                  NO   |                 YES   |                  NO   |                  NO |
|  018-hb-withwith-002  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|  018-hb-withwith-003  |              OUTPUT   |                 YES   |                  NO   |                  NO |
|  livetest-001-hb-001  |              OUTPUT   |                 YES   |                  NO   |                  NO |
</pre>

How to Test
-----------

1. install nodejs04+
2. install npm
3. npm install handlebars
4. bin/generate-fixture
   * This will generate *.txt files under fixtures.
   * These files is generated with handlebars.js.
   * All tests will use these txt files as standard answers.

* single lib test
   * bin/hbtest libName testFile [testTimes]
   * libName can be one of: none , lightncandy , handlebars.php , mustache-php , mustache.php
   * testTimes default 100000. When testing on lightncandy, testTimes as even times will test as best performance, testTimes as odd times will test as best features.
   * Example: bin/hbtest mustache.php fixture/001-simple-vars-001.json

* feature test
   * bin/hbreport 1
   * This do not generate any file under report/
   * Will print a feature chart on console.

* performance test
   * bin/hbreport
   * This will generate report files under report/
