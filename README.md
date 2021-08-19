# aws-lambda-php-mvc

This repo deploys a Lambda function running PHP.  I am running this locally on MacOS 11.4 with PHP installed locally ( php I only used to install the dependencies ), however these instructions are about how to deploy using AWS Cloud9 IDE.

Create a new CLoud9 Enviroment, the smallest isntance siz will be just fine, but ensure you select Amazon Linux 2.

In Cloud 9 perform the following steps in the terminal:

```
sudo yum -y update
sudo amazon-linux-extras install -y php7.2 
sudo yum install -y php-mbstring

git clone https://github.com/kukielp/aws-lambda-php-mvc.git

cd aws-lambda-php-mvc

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

This installs PHP 7.2 , clones the repo and installs and composer, next we will install bref and guzzel.

```
cd code
php ../composer.phar require bref/bref
php ../composer.phar require guzzlehttp/guzzle
```

Open the template.yaml update line 27 to align the region you wish to deploy into. You can look here for avaiable layers: https://runtimes.bref.sh/

Then run

```
cd ..
sam deploy --guided
```

Follow the instructions adn ensure you deploy to the region you specifed in the template.yaml

Once that is deployed you can open the WebEndpoint from the outputs section in your browser and you'll see the app running.

Are how to deploy using AWS Cloud9 ID You may notice that I wrote a little MVC framework to avoid having multiple Endpoints to multiple files, this will inevitably blow upto to a monolith in time and is likely the wrong approach for anything other then a hobby site.  The Framework has 4 example pages, the "Home" page ( I called it base ), a sample page ( /sample/page ), a form ( /sample/form ) form results ( /sample/results ) and a second controller that "gets" and displays a random joke ( /random/joke ).  The article ( here ) will talk about the framework a little more in depth, it is not feature rich it took ~1 hour to make including this README.md

Enjoy

Resource:  https://github.com/aws-samples/php-examples-for-aws-lambda/tree/master/0.3-Replacing-The-HTTP-Web-Server-For-Traditional-PHP-Frameworks
