SMFRegister 2.0

phpVMS module to automatically register a new pilot in your smf 2.0 forum.

Released under the following license:
Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported License

Developed by:
simpilot - David Clark
www.simpilotgroup.com
www.david-clark.net

Developed on:
phpVMS ver 2.1.934-158
smf ver 2.0
php 5.3
mysql 5.0.51
apache 2.2.11

Included files:
readme.txt
license.txt
SMFRegister.php
SMFRegisterData.class.php

Install:

-Download the attached package.
-unzip the package and place the files as structured in your root phpVMS install.

-your structure should be:
root
  core
    common
      SMFRegisterData.class.php
    modules
      SMFRegister
        SMFRegister.php

- Your smf database must reside in the same datbase as your phpVMS install and use the standard "smf_" prefix.
- I have built this to work with smf forum version 2.0, it has not been tested with any other version.
- The module will register a new user in the forum when a new pilot registers with the VA.
        the format for registration into the forum is:
            user: John Smith ABC1234
            pass: same as they used to register on the main site.

Although not required, a link back to www.simpilotgroup.com would be greatly appreciated!

Have fun!