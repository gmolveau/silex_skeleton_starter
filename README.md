# silex_skeleton_starter
a basic skeleton for silex with PDO, bootstrap and jquery + examples and commentaries

FIRST : 'composer update'

<a href="http://silex.sensiolabs.org/doc/web_servers.html" target="_new">web server configuration</a>
in my case I was using apache and here's my configuration :

<VirtualHost *:80>
        ServerName silexexample.info
        DocumentRoot /var/www/silex/
        CustomLog /var/log/apache2/silex-access.log combined
        ErrorLog /var/log/apache2/silex-error.log
        <Directory /var/www/silex/>
            DirectoryIndex index.php
            AllowOverride All
            Options MultiViews Indexes SymLinksIfOwnerMatch
            <Limit GET POST PUT DELETE OPTIONS>
                    Require all granted
            </Limit>
            <LimitExcept GET POST PUT DELETE OPTIONS>
                    Require all denied
            </LimitExcept>
        </Directory>
</VirtualHost>

Make sure to have "AllowOverride All" in the <directory> section to enable the .htaccess

<a href="https://github.com/csanquer/PdoServiceProvider" target="_new">csanquer/ pdoServiceProvider</a>
Thank you for your work Sir :)

<a href="http://getbootstrap.com/getting-started/#download" target="_new">bootstrap</a>

<a href="https://jquery.com/download/" target="_new">jquery</a>

<a href="https://fortawesome.github.io/Font-Awesome/" target="_new">font-awesome</a>

use pdo with : $app['pdo']

use $_SESSION with : $app['session']

use $_REQUEST with : $app['request']

Ressources used (among many) :

silex official tutorial : <a href="http://silex.sensiolabs.org/doc/usage.html" target="new">here</a>

french forum openclassrooms silex tutorial : <a href="https://openclassrooms.com/courses/evoluez-vers-une-architecture-php-professionnelle/iteration-3-integration-du-framework-php-silex" target="new">here</a>