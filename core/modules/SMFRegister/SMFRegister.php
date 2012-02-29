<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full license text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2011, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/

class SMFRegister extends CodonModule
{
        public function __construct() {
            CodonEvent::addListener('SMFRegister', array('registration_complete'));
        }
        public function EventListener($eventinfo) {
            if($eventinfo[0] == 'registration_complete') {
                $this->forum_register($eventinfo);
            }
        }

        public function forum_register($eventinfo)    {
               SMFRegisterData::forum_register($eventinfo);
       }
}