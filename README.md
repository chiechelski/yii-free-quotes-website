# QuotesWebsite
Free quotes website using Yii, Bootstrap 3, jQuery &amp; MySQL

## Setting up

INSTALLATION
------------

Please make sure the release file is unpacked under a Web-accessible
directory. You shall see the following files and directories:

      framework/           framework source files
      requirements/        requirement checker
      CHANGELOG            describing changes in every Yii release
      README               this file
      UPGRADE              upgrading instructions
      quotesite            project file


REQUIREMENTS
------------

The minimum requirement by Yii is that your Web server supports
PHP 5.1.0 or above. Yii has been tested with Apache HTTP server
on Windows and Linux operating systems.

Please access the following URL to check if your Web server reaches
the requirements by Yii, assuming "YiiPath" is where Yii is installed:

      http://hostname/YiiPath/requirements/index.php


QUICK START
-----------

Yii comes with a command line tool called "yiic" that can create
a skeleton Yii application for you to start with.

On command line, type in the following commands:

        $ cd YiiPath/framework                (Linux)
        cd YiiPath\framework                  (Windows)

        $ ./yiic webapp ../testdrive          (Linux)
        yiic webapp ..\testdrive              (Windows)

The new Yii application will be created at "YiiPath/testdrive".
You can access it with the following URL:

        http://hostname/YiiPath/testdrive/index.php


### Coding Standards ###

All code is indented with four spaces, not tabs and [Symfony Coding Standards](http://symfony.com/doc/current/contributing/code/standards.html).  Remember
that the main advantage of standards is that every piece of code looks and feels familiar, it's not about this or that
being more readable.

#### Naming conventions:

* Class member variables are camel case - e.g firstName
* Database column names use underscores - e.g first_name
  * Date time columns end with _at - e.g created_at
  * Boolean columns start with is_ - e.g is_awesome
* Template names use camelCase - e.g firstName.html.twig

### Code Layout ###

A bundle is simply a structured set of files within a directory that implement
a single feature. So, a bundle should be created for each feature.

[Bundle Structure and Best Practices](http://symfony.com/doc/current/cookbook/bundles/best_practices.html)

### Testing ###

TO DO

### HTML/CSS style guide ###

TO DO

### _Please contribute suggestions, features, issues, and pull requests._

## License

yii-free-quotes-website may be freely distributed under the [MIT license](http://en.wikipedia.org/wiki/MIT_License#License_terms).
