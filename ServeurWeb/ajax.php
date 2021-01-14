# Place in : /var/www/php

<?php
$reponse="";

    if (isset($_POST['action1'])) {
        switch ($_POST['action1']) {
            case 'Allumer':
                on1();
                break;
            case 'Eteindre':
                off1();
                break;
        }
    }

   elseif (isset($_POST['action2'])) {
        switch ($_POST['action2']) {
            case 'Allumer':
                on2();
                break;
            case 'Eteindre':
                off2();
                break;
        }
    }

    elseif (isset($_POST['action3.1'])) {
        switch ($_POST['action3.1']) {
            case 'Allumer':
                on1();
                break;
            case 'Eteindre':
                off1();
                break;
        }
    }

    elseif (isset($_POST['action3.2'])) {
        switch ($_POST['action3.2']) {
            case 'Allumer':
                on2();
                break;
            case 'Eteindre':
                off2();
                break;
        }
    }



    function on1() {
	shell_exec('mosquitto_pub -t "prise/prise1" -m "A"');
	$reponse = shell_exec('timeout 2s mosquitto_sub -t "prise/prise1" -C 1');
	exit;
    }

    function off1() {
        shell_exec('mosquitto_pub -t "prise/prise1" -m "E"');
        $reponse = shell_exec('timeout 2s mosquitto_sub -t "prise/prise1" -C 1');
	exit;
    }

    function on2() {
        shell_exec('mosquitto_pub -t "prise/prise2" -m "A"');
        $reponse = shell_exec('timeout 2s mosquitto_sub -t "prise/prise2" -C 1');
        exit;
    }


    function off2() {
        shell_exec('mosquitto_pub -t "prise/prise2" -m "E"');
        $reponse = shell_exec('timeout 2s mosquitto_sub -t "prise/prise2" -C 1');
        exit;
    }

    function on() {
	    on1();
	    on2();
	exit;
    }

    function off() {
        off1();
	      off2();
    exit;
    }

?>
