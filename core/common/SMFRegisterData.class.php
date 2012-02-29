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

class SMFRegisterData extends CodonData
{
    public function forum_register($eventinfo)    {

        $id = PilotData::getPilotByEmail($eventinfo[2]['email']);
        $pid = PilotData::getPilotCode($eventinfo[2]['code'], $id->pilotid);
        $username = $eventinfo[2]['firstname'].' '.$eventinfo[2]['lastname'].' '.$pid;
        $password = sha1(strtolower($username . $eventinfo[2]['password1']));
        $salt = substr(md5(mt_rand()), 0, 4);
        $time = time();
        $email = $eventinfo[2]['email'];

            $query = "INSERT INTO smf_members (
                            member_name,
                            email_address,
                            passwd,
                            password_salt,
                            posts,
                            date_registered,
                            real_name,
                            pm_email_notify,
                            id_theme,
                            id_post_group
                            )
                    VALUES (
                        '$username',
                        '$email',
                        '$password',
                        '$salt',
                        '0',
                        '$time',
                        '$username',
                        '1',
                        '0',
                        '4'
                        )";

            DB::query($query);

            $query2 = "SELECT * FROM smf_members WHERE member_name = '$username'";

            $member = DB::get_row($query2);

            $query3 = "UPDATE smf_settings
                        SET value = (value + 1)
                        WHERE variable = 'totalMembers'
                        LIMIT 1";

            DB::query($query3);

            $query4 = "REPLACE INTO smf_settings (variable, value)
                            VALUES ('latestMember', '$member->id_member')";

            DB::query($query4);

            $query5 = "REPLACE INTO smf_settings (variable, value)
                            VALUES ('latestRealName', '$member->member_name')";

            DB::query($query5);
	}
}