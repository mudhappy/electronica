<?php

    // your config
    $filename = $_FILES["miDatabase"]["tmp_name"];
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'taller';
    // less then your max script execution limit
    $maxRuntime = 8; 



    $deadline = time()+$maxRuntime; 
    // tmp file for progress
    $progressFilename = $filename.'_filepointer'; 
    // tmp file for erro
    $errorFilename = $filename.'_error'; 

    mysql_connect($dbHost, $dbUser, $dbPass) OR die('connecting to host: '.$dbHost.' failed: '.mysql_error());

    // DROP TABLES already exists
    mysql_query("DROP DATABASE IF EXISTS taller");
    $resultado = mysql_query("CREATE DATABASE taller CHARACTER SET utf8 COLLATE utf8_spanish_ci");

    if($resultado)
    {
        mysql_query("SET FOREIGN_KEY_CHECKS = 0");
        mysql_select_db($dbName) OR die('select db: '.$dbName.' failed: '.mysql_error());

        ($fp = fopen($filename, 'r')) OR die('failed to open file:'.$filename);

        // check for previous error
        if( file_exists($errorFilename) ){
            die('<pre> previous error: '.file_get_contents($errorFilename));
        }

        // activate automatic reload in browser
        echo '<html><head> <meta http-equiv="refresh" content="'.($maxRuntime+2).'"><pre>';

        // go to previous file position
        $filePosition = 0;
        if( file_exists($progressFilename) ){
            $filePosition = file_get_contents($progressFilename);
            fseek($fp, $filePosition);
        }

        $queryCount = 0;
        $query = '';
        while( $deadline>time() AND ($line=fgets($fp, 1024000)) ){
            if(substr($line,0,2)=='--' OR trim($line)=='' ){
                continue;
            }

            $query .= $line;
            if( substr(trim($query),-1)==';' ){
                if( !mysql_query($query) ){
                    $error = 'Error performing query \'<strong>' . $query . '\': ' . mysql_error();
                    file_put_contents($errorFilename, $error."\n");
                    exit;
                }
                $query = '';
                // save the current file position for 
                file_put_contents($progressFilename, ftell($fp)); 
                $queryCount++;
            }
        }

        if( feof($fp) ){
            echo 'dump successfully restored!';
            header('Location: ./');
        }else{
            echo ftell($fp).'/'.filesize($filename).' '.(round(ftell($fp)/filesize($filename), 2)*100).'%'."\n";
            echo $queryCount.' queries processed! please reload or wait for automatic browser refresh!';
        }
        mysql_query("SET FOREIGN_KEY_CHECKS = 1");
    }else
    {
        echo "Intenta de nuevo";
    }


?>