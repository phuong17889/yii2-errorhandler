
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
## Parameters ##
#### $traceLine
Type: `string`  
Default: `{html}`  
If [phpstorm-protocol](https://github.com/phuongdev89/phpstorm-protocol) installed, change it to
```
<a href="phpstorm://open?url=file://{file}&line={line}">{html}</a>
```
#### $useDocker
Type: `bool`  
Default: `false`  
If you are using docker to deploy this project, set it `true`
#### $tracePathMappings
Type: `array|null`  
Default: `null`  
In docker container, project directory is `/app` maybe different with your IDE, just map it
## Example ##

```
    'components' => [
        'errorHandler' => [
            'class' => \phuongdev89\errorhandler\ErrorHandler::class,
            /**
            'traceLine' => '<a href="phpstorm://open?url=file://{file}&line={line}">{html}</a>',
            'useDocker' => true,
            'tracePathMappings' => [
                '/app' => 'D:\\Ampps\\www\mofiex-com'
            ]
            */
        ], 
    ],
```
