
# Installation #
## Dependent ##
Must have [phpstorm-protocol](https://github.com/phuong17889/phpstorm-protocol) before

## Composer ##
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist phuong17889/yii2-errorhandler "@dev"
```

or add

```
"phuong17889/yii2-errorhandler": "@dev"
```

to the require section of your `composer.json` file.

# Configuration #

```
    'components' => [
        'errorHandler' => [
            'class' => \phuong17889\errorhandler\ErrorHandler::class,
        ], 
    ],
```
