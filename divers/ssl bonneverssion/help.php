openssl genrsa -aes256 -out private.key 2048
openssl rsa -in private.key -out private.key

openssl req -new -x509 -nodes -sha1 -key private.key -out certificat.crt -days 36500  -config C:\wamp\bin\apache\apache2.2.11\conf\openssl.cnf 


1-Editer C:\wamp\bin\apache\Apache2.2.11\conf\httpd.conf
LoadModule ssl_module modules/mod_ssl.so
Include conf/extra/httpd-ssl.conf


2-Editer C:\wamp\bin\php\php5.3.8\php.ini
extension=php_openssl.dll


3-Editer C:\wamp\bin\apache\Apache2.2.11\conf\extra\httpd-ssl.conf
DocumentRoot "c:/wamp/www/"
ServerName localhost:443
ErrorLog "c:/wamp/bin/apache/Apache2.2.11/logs/ssl_error.log"
TransferLog "c:/wamp/bin/apache/Apache2.2.11/logs/ssl_access.log"
SSLCertificateFile "c:/wamp/bin/apache/Apache2.2.11/conf/cert/certificat.crt"
SSLCertificateKeyFile "c:/wamp/bin/apache/Apache2.2.11/conf/key/private.key"
<Directory "c:/wamp/www/">
CustomLog "C:/wamp/bin/apache/Apache2.2.11/logs/ssl_request.log" 


httpd -t
