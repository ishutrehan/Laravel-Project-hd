<?php

return array(
/** set your paypal credential **/
'client_id' =>'ATaC-RsluYKoAdVHrbW7eAgP-HtfKIM8rkLcuzgXet7zNCJZY7Ny31EiU2FwzfDRrXRr8hf1XV-7jKq-',
'secret' => 'EDf0gCV7lyE8tijQwbbo8fzG9vxkl19N7IMlyrOd7z1K0_wQMimMOUWy15yv3VAtJfyCc2b_aPxcGuC7',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);