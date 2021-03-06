
PHP_INI_PATH=/usr/local/etc/php/php.ini

if [ -f "$PHP_INI_PATH-$DOCKER_PHP_CONFIG" ] && [ ! -f "$PHP_INI_PATH" ]
then
	cp "$PHP_INI_PATH-$DOCKER_PHP_CONFIG" "$PHP_INI_PATH"
fi

if [ "$DOCKER_XDEBUG" != "" ]
then    
	echo -e "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so) \n[xdebug]\nxdebug.mode=debug\nxdebug.client_host=$(/sbin/ip route|awk '/default/ { print $3 }')\nxdebug.client_port=$DOCKER_XDEBUG_PORT\nxdebug.idekey=\"vscode\"\nxdebug.max_nesting_level=1000\n" > /usr/local/etc/php/conf.d/xdebug.ini
fi

if [ "$DOCKER_CRON" != "" ]
then
	echo -e "* * * * * /usr/local/bin/php /var/www/gestli/artisan schedule:run >> /dev/null 2>&1"  >> /etc/crontabs/www
	crond	
fi