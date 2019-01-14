# Kronos (Web-dev project)

## Installation

1. install apache, php and mysql servers.
1. Enable .htaccess file to rewrite path.

### Steps to enable .htaccess file (Linux)

Edit or create a config file

```bash
sudo nano /etc/apache2/conf-available/httpd.conf
```

Add the following to the config file

```apache
<Directory /var/www/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Enable the config file

```bash
sudo a2enconf httpd
```

Restart or reload Apache

```bash
sudo service apache2 restart
```