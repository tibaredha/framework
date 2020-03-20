<?php

$certificateData = array(
    "countryName" => "US",
    "stateOrProvinceName" => "Texas",
    "localityName" => "Houston",
    "organizationName" => "DevDungeon.com",
    "organizationalUnitName" => "Development",
    "commonName" => "DevDungeon",
    "emailAddress" => "nanodano@devdungeon.com"
);

// Generate certificate
// $privateKey = openssl_pkey_new();
// $certificate = openssl_csr_new($certificateData, $privateKey);
// $certificate = openssl_csr_sign($certificate, null, $privateKey, 365);

// Generate PEM file
// $pem_passphrase = 'abracadabra'; // empty for no passphrase
// $pem = array();
// openssl_x509_export($certificate, $pem[0]);
// openssl_pkey_export($privateKey, $pem[1], $pem_passphrase);
// $pem = implode($pem);

// Save PEM file
// $pemfile = './server.pem';
// file_put_contents($pemfile, $pem);



// $socket = stream_socket_client("ssl://192.168.1.2:5522", $errno, $errstr);
// if ($socket) {
	// echo fread($socket, 2000);
// }


// $host = '192.168.1.2';
// $port = 5522;
// $timeout = 30;
// $cert = 'e:\www\workspace\php\sockets\server.pem'; // Path to certificate
// $context = stream_context_create(
    // array('ssl'=>array('local_cert'=> $cert))
// );
// if ($socket = stream_socket_client(
        // 'ssl://'.$host.':'.$port,
        // $errno,
        // $errstr,
        // 30,
        // STREAM_CLIENT_CONNECT,
        // $context)
// ) {
    // fwrite($socket, "\n");
    // echo fread($socket,8192);
    // fclose($socket);
// } else {
   // echo "ERROR: $errno - $errstr\n";
// }

// $context = stream_context_create();

// local_cert must be in PEM format
// stream_context_set_option($context, 'ssl', 'local_cert', $pemfile);

// Pass Phrase (password) of private key
// stream_context_set_option($context, 'ssl', 'passphrase', $pem_passphrase);
// stream_context_set_option($context, 'ssl', 'allow_self_signed', true);
// stream_context_set_option($context, 'ssl', 'verify_peer', false);

// Create the server socket
// $socket = stream_socket_server(
    // 'ssl://0.0.0.0:9001',
    // $errno,
    // $errstr,
    // STREAM_SERVER_BIND|STREAM_SERVER_LISTEN,
    // $context
// );

// fwrite/fread to $socket

// Get port and IP address
// $service_port = getservbyname('www', 'tcp');
// $address = gethostbyname('www.google.com');

// Bind socket
// $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// if ($socket === false) {
    // echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
// }

// Connect
// $result = socket_connect($socket, $address, $service_port);
// if ($result === false) {
    // echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
// }

// Create HTTP request
// $in = "HEAD / HTTP/1.1\r\n";
// $in .= "Host: www.google.com\r\n";
// $in .= "Connection: Close\r\n\r\n";
// $out = '';

// Send HTTP request
// socket_write($socket, $in, strlen($in));

// Read and output response
// while ($out = socket_read($socket, 2048)) {
    // echo $out;
// }

// Close socket
// socket_close($socket);




// $context = stream_context_create();

// local_cert must be in PEM format
// stream_context_set_option($context, 'ssl', 'local_cert', '/path/to/pem/file');
// stream_context_set_option($context, 'ssl', 'passphrase', $pem_passphrase);
// stream_context_set_option($context, 'ssl', 'allow_self_signed', true);
// stream_context_set_option($context, 'ssl', 'verify_peer', false);

// Create the server socket
// $server = stream_socket_server('ssl://192.168.1.96:9001', $errno, $errstr, STREAM_SERVER_BIND|STREAM_SERVER_LISTEN, $context);

// while(true)
// {
    // $buffer = '';
    // $client = stream_socket_accept($server);
    // if($client) {
        ////Read until double CRLF
        // while( !preg_match('/\r?\n\r?\n/', $buffer) )
            // $buffer .= fread($client, 2046); 
        ////Respond to client
        // fwrite($client,  "200 OK HTTP/1.1\r\n"
                         // . "Connection: close\r\n"
                         // . "Content-Type: text/html\r\n"
                         // . "\r\n"
                         // . "Hello World! " . microtime(true)
                         // . "\n<pre>{$buffer}</pre>");
        // fclose($client);
    // }
// }
