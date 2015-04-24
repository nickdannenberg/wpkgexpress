**NOTE: development of wpkgExpress is now indefinitely on hold**

wpkgExpress is a web-frontend to the [WPKG](http://www.wpkg.org) software deployment system.
<br /><br />
## Features ##
  * Add/edit/delete WPKG packages, profiles, and hosts
  * Ajax-enabled functions: sorting/deleting of packages, profiles, and hosts; and re-ordering of package check conditions and actions
  * Import existing WPKG packages.xml, profiles.xml, and hosts.xml files
  * Ability to password protect the XML feeds used by WPKG
  * Search records by type or search all types at any time using the search form at the top of every page
  * Ability to force SSL
  * Built using CakePHP - use any CakePHP relational database DataSource. As of this writing, the following are natively supported:
    * adodb
    * db2
    * firebird
    * mssql
    * mysql
    * mysqli
    * odbc
    * oracle
    * postgres
    * sqlite (v2.x -- wpkgExpress as of v1.0-`r7` includes a v3.x DataSource, but it is not officially supported yet by CakePHP's developers)
    * sybase

## Requirements ##
  * Apache (with at least mod\_rewrite enabled)
  * PHP 5.0.2 or newer (with DOM extension enabled)
  * PCRE with unicode properties support enabled (check this via "pcretest -C"). If it's not enabled, go [here](http://gaarai.com/2009/01/31/unicode-support-on-centos-52-with-php-and-pcre/) to find out how to quickly recompile it to enable this support.
  * Any (SQL-based) CakePHP 1.2.x DataSource (i.e. mysql, mssql, postgres, etc) -- Note: thus far only mysql, sqlite (v2.x), and sqlite3 have been tested
    * Note: Most DataSources rely on certain PHP extensions being enabled, whether they're compiled in or dynamically loaded. This is important to know because some of the extensions required by some DataSources may not be available by default for some PHP distributions. For example: the sqlite DataSource requires the sqlite PHP extension, whereas the sqlite3 DataSource requires the pdo and pdo\_sqlite PHP extensions.

## Getting Started ##
  1. Uncompress this archive to a directory on your webserver that is reachable via a browser (Firefox 3.x is recommended for best results).
  1. Ensure Apache is correctly configured before starting. Follow steps 1 & 2 from [here](http://book.cakephp.org/view/37/Apache-and-mod_rewrite-and-htaccess).
  1. Start the wpkgExpress installation process by navigating to (replacing 'yourserver' with your hostname and 'someplace' with the directory containing wpkgExpress): http://yourserver/someplace/installer
  1. Follow and complete the short installation wizard and you're set!
    * Note: On the Database Setup step, sqlite/sqlite3 users only need to set the value of the "Database Name" field to the absolute path to the sqlite/sqlite3 database. If the sqlite/sqlite3 database file does not exist, it will automatically be created.

## TODO ##
  * Bring up to speed with latest stable WPKG (1.1.2 as of this writing)
  * GraphViz integration for interactive visualizing of associations, dependencies, and perhaps other kinds of data
  * WPKG download tag support
  * ~~Add ability to change the main login/password in the Admin section~~