<?php
    /**
     * @package Bye Felicia
     * @version 1.1
     */
    /*
        Plugin Name: Bye Felicia
        Plugin URI: http://wordpress.org/plugins/bye-felicia/
        Description: You know Hello, Dolly? Yeah, we're switching that out. When activated you will randomly see a line from <cite>Friday</cite> in the upper right of your admin screen on every page. We also put <cite>Today Was A Good Day</cite> by Ice Cube on here. You better know which line is from what. Now, what up on that 40, homie?
        Author: LLJB3
        Version: 1.1
        Author URI: http://kakemultimedia.com
    */

    function bye_felicia_script() {
        /** This is the entire script of the iconic scene: Bye, Felicia. Lyrics from Today Was */
        $lyrics = "Let me borrow a joint.
        You need to borrow a job with your broke ass. Always trying to smoke up somebody’s s#!+. Get the hell on Felicia.
        I’m gonna remember that.
        Remember it. Write it down. Take a picture. I don’t give a f---!
        Craig?
        Bye, Felicia.
        Y’all stingy.
        Just wakin' up in the morning, gotta thank God,
        I don't know, but today seems kinda odd...
        No barking from the dog, no smog.
        And momma cooked a breakfast with no hog.
        I got my grub on, but didn't pig out.
        Finally got a call from a girl I wanna dig out!
        Hooked it up for later as I hit the door,
        Thinkin', “Will I live another 24?”
        I gotta go, ‘cause I got me a drop-top.
        And if I hit the switch, I can make the ass drop.
        Had to stop at a red light,
        Lookin' in my mirror and not a jacker in sight.
        And everything is alright!
        I got a beep from Kim, and she can f--- all night.
        Called up the homies and I'm askin' y'all,
        “Which park are y'all playin' basketball?”
        Get me on the court and I'm trouble.
        Last week, f----d around and got a triple double!
        Freakin' n---as every way, like MJ,
        I can't believe today was a good day.";

        // Here we split it into lines
        $lyrics = explode( "\n", $lyrics );

        // And then randomly choose a line
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
    }

    // This just echoes the chosen line, we'll position it later
    function bye_felicia() {
        $chosen = bye_felicia_script();
        echo "<p id='bye_felicia'>$chosen</p>";
    }

    // Now we set that function up to execute when the admin_notices action is called
    add_action( 'admin_notices', 'bye_felicia' );

    // We need some CSS to position the paragraph
    function bye_felicia_css() {
        // This makes sure that the positioning is also good for right-to-left languages
        $x = is_rtl() ? 'left' : 'right';

        echo "
        <style type='text/css'>
            #bye_felicia {
                float: $x;
                padding-$x: 15px;
                padding-top: 5px;		
                margin: 0;
                font-size: 11px;
            }
        </style>
        ";
    }

    add_action( 'admin_head', 'bye_felicia_css' );

    // Delete Hello Dolly.
    function bye_felicia_activation_logic() {
        if (is_plugin_active('hello.php')) {
            deactivate_plugins('hello.php');
        }
    }
    add_action( 'update_option_active_plugins', 'bye_felicia_activation_logic', 10, 2 );
?>
