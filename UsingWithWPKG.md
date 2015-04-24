# Using with WPKG #

  1. Open WPKG's config.xml in a text editor
  1. Uncomment and change the wpkg\_base parameter to the appropriate base url for your wpkgExpress installation. Examples:
    * Without SSL
      * For no XML username/password protection: http://yourserver/path/to/wpkgExpress
      * For XML username/password protection: http://xmlusername:xmlpassword@yourserver/path/to/wpkgExpress
    * With SSL
      * For no XML username/password protection: https://yourserver/path/to/wpkgExpress
      * For XML username/password protection: https://xmlusername:xmlpassword@yourserver/path/to/wpkgExpress
  1. Scroll down to the web`_``*``_`file\_name parameters and modify them like so:
    * For web\_packages\_file\_name, change 'value' to: packages.xml
    * For web\_profiles\_file\_name, change 'value' to: profiles.xml
    * For web\_hosts\_file\_name, change 'value' to: hosts.xml
  1. Now your wpkgExpress packages, profiles, and hosts should now be pulled in by WPKG during WPKG execution