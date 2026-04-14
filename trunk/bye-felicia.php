<?php
    /**
     * @package Bye Felicia
     * @version 1.3
     */
    /*
        Plugin Name: Bye Felicia
        Plugin URI: http://wordpress.org/plugins/bye-felicia/
        Description: You know Hello, Dolly? Yeah, we're switching that out. When activated you will randomly see a line from <cite>Friday</cite> in the upper right of your admin screen on every page. We also put <cite>Today Was A Good Day</cite> by Ice Cube on here. You better know which line is from what. Now, what up on that 40, homie?
        Author: LLJB3
        Version: 1.2
        Author URI: http://kakemultimedia.com
    */

    function bye_felicia_script() {
17	        /** This is the entire script of the iconic scene: Bye, Felicia from Friday. */
18	        $lyrics = "Let me borrow a joint.
19	        You need to borrow a job with your broke ass. Always trying to smoke up somebody’s s#!+. Get the hell on Felicia.
20	        I’m gonna remember that.
21	        Remember it. Write it down. Take a picture. I don’t give a f---!
22	        Craig?
23	        Bye, Felicia.
24	        Damn. Y'all stingy.
25	        We ain't got no sugar.
26	        No sugar? Damn. Y'all ain't never got two things that match. Either y'all got Kool-aid, no sugar. Peanut butter, no jelly. Ham, no burger. Daaamn.
27	        I know you don't smoke weed, I know this; but I'm gonna get you high today, 'cause it's Friday; you ain't got no job... and you ain't got s#!+ to do.
28	        Weed is from the earth. God put this here for me and you. Take advantage man, take advantage.
29	        Puff puff, give. Puff puff, give. You f---in' up the rotation.
30	        Older the berry, the sweeter the juice.
31	        Man, it's the blacker the berry, the sweeter the juice.
32	        Yeah, well she blacker than a m----f----r too.
33	        Every time I come in the kitchen, you in the kitchen. In the goddamn refrigerator. Eatin' up all the food. All the chitlins... All the pigs' feet... All the collard greens... All the hog maws. I wanna eat them chitlins... I like pigs' feet.";

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