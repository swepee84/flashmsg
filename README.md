# FlashMessageControl

This is a module for the Anax-MVC web framework. The module has been developed as a part of a course on Blekinge Tekniska Högskola.

Flash messages are used to display status messages, results of actions or notices. Use this component to generate these types of messages.

The class FlashMsg uses the session service in Anax-MVC to store the messages until the array is cleared.

#Installation

1. To install, use composer.
2. Add this line into your composer.json file:
```
"require": {"epepee/flashmsg": "dev-master"}
```
3. Move or copy the css/flashmsg.css file to the webroot/css folder in your Anax-MVC installation. Modify it to your liking.
4. In the router you also need to add the css-stylesheet flashmsg.css.
5. You can move or copy the file flashmessages.php to your webroot to test in a web browser.

#Access the controller in your frontcontroller:

```
$di->setShared('flashmessage', function() use ($di){
    $flashMessages = new \epepee\FlashMsg\FlashMsg();
    $flashMessages->setDI($di);
    return $flashMessages;
});
```

#Add the route in your front controller:

```
$app->router->add('', function() use ($app) {
    $app->theme->addStylesheet('css/flashmsg.css');
    $app->theme->setTitle("Flash messages");

    $app->flashmessage->alert('Alert');
    $app->flashmessage->error('Error');
    $app->flashmessage->info('Info');
    $app->flashmessage->notice('Notice');
    $app->flashmessage->success('Success');
    $app->flashmessage->warning('Warning');

    $app->views->add('theme/index', ['content' => $app->flashmessage->outputMsgs()]);

    $app->flashmessage->clearMessages();

});
```