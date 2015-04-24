# Introduction #

As of this writing, wpkgExpress utilizes only SSL connections by default. For many sysadmins out there with lower budgets that cannot afford to purchase an SSL certificate from any of the major certificate providers, there is a need to create self-signed SSL certificates. These can be used in place of the paid certificates, provided you install the self-signed certificate wherever wpkgExpress will be accessed via the browser. I have outlined steps below to create such certificates for XAMPP installations.

# XAMPP #

Paths noted below are relative paths with the first "xampp\" part referring to the root XAMPP installation folder. These instructions were tested on the Windows build of XAMPP (Linux version should only require slight changes).

  1. Run "xampp\apache\makecert.bat" to start the certificate creation process.
    1. "Enter PEM pass phrase:" -- here just enter a good password that you won't forget (otherwise write it down)
    1. Follow the rest of the prompts until you get to the "Common Name" prompt.
    1. At the "Common Name" prompt, you must enter the hostname of the server machine. You can enter dyndns or similar hostnames here (for small servers for example).
    1. At the "Enter pass phrase for privkey.pem" prompt, enter the same PEM pass phrase you created in step 1a.
    1. After that, if successful, the new certificate will be automatically copied to the "xampp\apache\conf\ssl.crt" directory.
    1. Restart Apache. The new self-signed SSL certificate should now be in use for https connections.
    1. One last note: if 10 years (changed from 1 year as of xampp v1.7.0 pl1 beta5 (Feb 2009)) from the current date is not a sufficient expiration date for your self-signed certificate, you can change the number of days from today it will expire by editing makecert.bat and changing the numerical argument for the "-days" parameter contained within.
  1. Add/Import the certificate on each local (client) computer which will be executing wpkg.js. This can be done two ways.
    * Option 1 (good for small numbers of clients or local testing):
      1. Open IE's Internet Options menu (or Internet Options in the Control Panel)
      1. Select the "Content" tab and click "Certificates..."
      1. Click "Import", "Next->", and then "Browse" and select your server.crt in the "xampp\apache\conf\ssl.crt" directory or other path if you have copied it elsewhere.
      1. Ensure "Place all certificates in the following store" is selected, click "Browse...", select "Trusted Root Certification Authorities", click "OK", "Next->", and "Finish".
      1. Close out the "Certificates" and "Internet Options" windows and you're done.
    * Option 2 (good for any number of clients, since it can be silently automated):
      1. Google for "codesigningx86.exe" and download it (it'll be a self-extracting zip archive). Note: microsoft once hosted this file, but has pulled it from their site some time ago.
      1. The only file we need from that self-extracting archive is "certmgr.exe".
      1. Create a batch file in the same directory as "certmgr.exe" that contains the following line (or execute manually or however you wish to do it): certmgr -add "path\to\server.crt" -c -s -r localMachine Root
      1. If all goes well, the certificate should now be installed and wpkg can now happily download xml via an https url that uses the self-signed certificate