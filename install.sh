docker exec dockerappengine_php_1 \
bash -c "mkdir /var/www/html/wordpress;"

docker exec -it dockerappengine_php_1 \
composer update

docker exec dockerappengine_php_1 \
bash -c "
cd /var/www/html/wordpress;
wp config create --dbname=test --dbuser=root --dbpass=pass --dbhost=mysql --allow-root;
wp core install --url=example.com --title=Example --admin_user=supervisor --admin_password=strongpassword --admin_email=info@example.com --allow-root;
wp theme activate default_theme --allow-root;"

dir=$(cd $(dirname $0) && pwd)
echo $dir/wordpress/wp-content
ln -snf $dir/wordpress/wp-content $dir/wp-content
ln -snf $dir/wordpress/wp-config.php $dir/wp-config.php
