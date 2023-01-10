
# Installation #
## Dependent ##
Must have [phpstorm-protocol](https://github.com/phuongdev89/phpstorm-protocol) before

## Composer ##
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist phuongdev89/yii2-errorhandler "@dev"
```

or add

```
"phuongdev89/yii2-errorhandler": "@dev"
```

to the require section of your `composer.json` file.

# Configuration #

```
    'components' => [
        'errorHandler' => [
            'class' => \phuongdev89\errorhandler\ErrorHandler::class,
        ], 
    ],
```
