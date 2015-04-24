# Common Issues #

Since not all Apache installations are created equal (i.e. vanilla Apache configuration differs from XAMPP Apache configuration) and there are also other non-wpkgExpress issues that affect wpkgExpress installation/usage, I thought I'd address some of them here:

  * When visiting the installer URL, the following Apache error occurs: "404 Not Found - The requested URL /<path to wpkgExpress>/installer was not found on this server." This problem has specifically been found on vanilla Apache installs on at least Debian (Lenny).
    * **Solution:** This error generally occurs for one of two reasons: .htaccess overrides are not enabled in the Apache config for your site, or mod\_rewrite has not been enabled.
      * For the former: when your site configuration file (i.e. "/etc/apache2/sites-enabled/000-default" - replace the triple-digit number with the correct site number if you are running multiple sites) has a Directory entry for the site root that contains an "AllowOverride None" statement. For example:
```
        <Directory /var/www/>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride None
                Order allow,deny
                allow from all
        </Directory>
```
> > > > The "AllowOverride None" here must be set to "AllowOverride All".
      * For the latter: enable mod\_rewrite via "a2enmod rewrite" (or "sudo a2enmod rewrite" for Ubuntu)

> > Once you have finished either of these steps, you must restart apache via "/etc/init.d/apache2 restart" (or "sudo /etc/init.d/apache2 restart" for Ubuntu).

  * I cannot add packages or profiles via the web interface. It complains that the package or profile's id "must start with a letter or number and only contain: letters, numbers, underscores, and hyphens," when in fact the id fits this criteria.
    * **Solution:** wpkgExpress as of v1.0-[r11](https://code.google.com/p/wpkgexpress/source/detail?r=11) now supports unicode characters for these fields. CentOS and RHEL (as of this writing) currently ship with a version of PCRE that does not have unicode properties enabled. To ensure this is what is happening in your case, check the output of "pcretest -C".


> In order to enable this option, you must perform a quick recompile of PCRE. All the steps needed to do this are outlined here: http://gaarai.com/2009/01/31/unicode-support-on-centos-52-with-php-and-pcre/
  * _**Note:**_ Once you install the new PCRE (via RPM for RHEL/CentOS), don't forget to stop apache and then start it up again for the changes to take effect in PHP (i.e. "apachectl stop" followed by "apachectl start"). Merely issuing a "apachectl restart" was not enough in my testing.