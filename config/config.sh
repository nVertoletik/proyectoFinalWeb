#! /bin/shell
mv prestashop.com.conf /etc/apache2/sites-available/;
a2ensite /etc/apache2/sites-available/;
echo "127.0.0.1     www.prestashop.com" >>/etc/hosts;
mv config/llave-prestashop.key /etc/ssl/private/
mv certificado-prestashop.crt /etc/ssl/certs/
chmod 644 /etc/ssl/certs/certificado-3pnalvarado.crt
chmod 644 /etc/ssl/private/llave-3pnalvarado.key
service apache2 restart;