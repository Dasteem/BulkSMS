ArpuPLus SMS
=================

Official low-level client for Elasticsearch. Its goal is to provide common ground for all Elasticsearch-related code in PHP; because of this it tries to be opinion-free and very extendable.

To maintain consistency across all the low-level clients (Ruby, Python, etc), clients accept simple associative arrays as parameters.  All parameters, from the URI to the document body, are defined in the associative array.


Features
--------

 - One-to-one SMS 
 - custom provider
Version Matrix
--------------
Since there are breaking changes in Elasticsearch 1.0, you need to match your version of Elasticsearch to the appropriate version of this library.
If you are using a version older than 1.0, you must install the `0.4` Elasticsearch-PHP branch.  Otherwise, use the `1.0` branch.

The master branch will always track Elasticsearch master, but it is not recommended to use `dev-master` in your production code.

| Elasticsearch Version | Elasticsearch-PHP Branch |
| --------------------- | ------------------------ |
| >= 1.0                | 1.0                      |
| <= 0.90.*             | 0.4                      |

Documentation
--------------
[Full documentation can be found here.](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html)  Docs are stored within the repo under /docs/, so if you see a typo or problem, please submit a PR to fix it!

Installation via Composer
-------------------------
The recommended method to install arpuplussms-PHP_ is through [Composer](http://getcomposer.org).

1. Add ``shadywallas/arpuplussms`` as a dependency in your project's ``composer.json`` file (change version to suit your version of Elasticsearch):

    ```json
        {
            "require": {
                "shadywallas/arpuplussms": "~1.0"
            }
        }
    ```

2. Download and install Composer:

    ```bash
        curl -s http://getcomposer.org/installer | php
    ```

3. Install your dependencies:

    ```bash
        php composer.phar install --no-dev
    ```

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

    ```php
        <?php
        require 'vendor/autoload.php';

        $obj = new BulkSMS('user', 'pass','http://smsbulk.eg.mobizone.mobi/BSMS/BSendAPI?');
    ```
You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

You'll notice that the installation command specified `--no-dev`.  This prevents Composer from installing the various testing and development dependencies.  For average users, there is no need to install the test suite (which also includes the complete source code of Elasticsearch).  If you wish to contribute to development, just omit the `--no-dev` flag to be able to run tests.

PHP Version Requirement
----
The minimum version of PHP that this library supports is 5.3.9.  For a longer explanation as to why this is the case, see [Minimum PHP Version Requirement Documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_php_version_requirement.html).

Index a document
-----

In elasticsearch-php, almost everything is configured by associative arrays.  The REST endpoint, document and optional parameters - everything is an associative array.

To index a document, we simply specify a `body` that contains the document that we wish to index.  Each field in the document is represented by a different key/value pair in the associative array.

The index, type and ID are also specified in the parameters assoc. array:

```php
    $obj->sendSMS('لقد تم الجز', 'ar' , 201281264677 ,'E7gezly');
```


Wrap up
=======

That was just a crash-course overview of the client and it's syntax.  If you are familiar with elasticsearch, you'll notice that the methods are named just like REST endpoints.

You'll also notice that the client is configured in a manner that facilitates easy discovery via the IDE.  All core actions are available under the `$client` object (indexing, searching, getting, etc).  Index and cluster management are located under the `$client->indices()` and `$client->cluster()` objects, respectively.

Check out the rest of the [Documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html) to see how the entire client works.


License
-------

Copyright 2013 Elasticsearch

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
