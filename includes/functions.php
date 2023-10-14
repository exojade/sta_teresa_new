<?php

    /* -------------------------------------------------
		City Administrators Office - I.T. Section
	--------------------------------------------------- */




    require_once("constants.php");


    function to_amount($number){
        return(round($number, 2));
    }

    function full_month($date){
        $readable_date = date("F", strtotime($date));  
        // dump($readable_date);
        return $readable_date;
    }

    function date_day($date){
        $readable_date = date("d", strtotime($date));  
        // dump($readable_date);
        return $readable_date;
    }


    function generateMonthArray($from, $to) {
        $from = max(1, min(12, (int)$from)); // Ensure $from is between 1 and 12.
        $to = max(1, min(12, (int)$to));     // Ensure $to is between 1 and 12.
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
    
        $result = [];
        for ($i = $from - 1; $i < $to; $i++) {
            $result[] = $months[$i];
        }
    
        return $result;
    }

    function generateRandomNumbers($min, $max) {
        $result = [];
        $count = $max;
        for ($i = $min; $i <= $count; $i++) {
            $result[] = rand(0, 100);
        }
        return $result;
    }
    



    function readable_date($date){
        $readable_date = date("F d, Y", strtotime($date));  
        // dump($readable_date);
        return $readable_date;
    }

    function short_date($date){
        $readable_date = date("M d, Y", strtotime($date));  
        // dump($readable_date);
        return $readable_date;
    }

    function convert_number_to_words($number) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            100000             => 'hundred',
            10000000          => 'million'
        );
    
        if (!is_numeric($number)) {
            return false;
        }
    
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
    
        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }
    
        $string = $fraction = null;
    
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
    
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            case $number < 100000:
                $thousands   = ((int) ($number / 1000));
                $remainder = $number % 1000;
    
                $thousands = convert_number_to_words($thousands);
    
                $string .= $thousands . ' ' . $dictionary[1000];
                if ($remainder) {
                    $string .= $separator . convert_number_to_words($remainder);
                }
                break;
            case $number < 10000000:
                $lakhs   = ((int) ($number / 100000));
                $remainder = $number % 100000;
    
                $lakhs = convert_number_to_words($lakhs);
    
                $string = $lakhs . ' ' . $dictionary[100000];
                if ($remainder) {
                    $string .= $separator . convert_number_to_words($remainder);
                }
                break;
            case $number < 1000000000:
                $crores   = ((int) ($number / 10000000));
                $remainder = $number % 10000000;
    
                $crores = convert_number_to_words($crores);
    
                $string = $crores . ' ' . $dictionary[10000000];
                if ($remainder) {
                    $string .= $separator . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }
    
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
    
        return $string;
    }

    function to_peso($number){
        if($number != ""){
            return(number_format($number, 2, '.', ','));
        }
        else
        return($number);
    }
    /**
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */
    function dump($variable)
    {
        require("dump.php");
        exit;
    }
	
	function dumper($variable)
    {
        require("../../templates/dump.php");
        exit;
    }
	
	function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
	}

    /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
				$handle->exec("set names utf8");
				$handle->exec("set character_set_results='utf8'");
				$handle->exec("set collation_connection='utf8'");
				$handle->exec("set character_set_client='utf8'");
                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    function logout()
    {
        // unset any session variables
        $_SESSION["sta_teresa"] = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        //session_destroy();
		unset($_SESSION["sta_teresa"]);
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     * 
     * 
     * 
     */

    function strips($data) {
  	  $data = trim($data);
  	  $data = stripslashes($data);
  	  $data = htmlspecialchars($data);
      if(empty($data)) {
        return null;
      }
      else {
        return $data;
      }
  	}



    function redirect($destination)
    {
		
		
		
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
			
			
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
			
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
			
			
        }
		
        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
		
        // if template exists, render it
        // if (file_exists("$template"))
        // {   // {   // {
            // extract variables into local scope
            extract($values);
            // render header
            require("layouts/header.php");
			
			// render sidebar
            // require("layouts/sidebar.php");

            // render template
            require("$template");
        // }

        // else err
        // else
        // {
            // trigger_error("Invalid template: $template", E_USER_ERROR);
        // }
    }

    function renderview($template, $values = []) {
        extract($values);
        require("$template");
    }
	
	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	
	function super_unique($array,$key)
	{
		$temp_array = array();
		foreach ($array as &$v) {
		if (!isset($temp_array[$v[$key]]))
		$temp_array[$v[$key]] =& $v;
			}
		$array = array_values($temp_array);
		return $array;
	}
	
	header('content-type:text/html;charset=utf-8');
	
	


?>
