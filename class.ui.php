<?php


            wp_register_style( 'main.css', plugin_dir_url( __FILE__ ) . '_inc/main.css', array());
			wp_enqueue_style( 'main.css');

			wp_register_script( 'main.js', plugin_dir_url( __FILE__ ) . '_inc/main.js', array('jquery') );
			wp_enqueue_script( 'main.js' );