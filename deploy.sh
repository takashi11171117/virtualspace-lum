rm -rf $PWD/wordpress/wp-content
cp -r $PWD/wp-content $PWD/wordpress/wp-content
rm $PWD/wordpress/wp-config.php
cp $PWD/wp-config.php $PWD/wordpress/wp-config.php
gcloud app deploy
