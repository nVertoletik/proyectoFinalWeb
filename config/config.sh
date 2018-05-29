mv prestashop.com.conf /etc/apache2/sites-available/
a2ensite /etc/apache2/sites-available/
echo "127.0.0.1     www.prestashop.com" >>/etc/hosts
service apache2 restart