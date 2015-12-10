 <?php 
/**
 * This is an Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php';
$app->theme->configure(ANAX_APP_PATH . 'config/theme.php');


$di->setShared('flashmessage', function() use ($di){
    $flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
    $flashMessages->setDI($di);
    return $flashMessages;
});

// Prepare the page content
$app->theme->addStylesheet('css/flashmsg.css');

$app->flashmessage->alert('Alert flash message');
$app->flashmessage->error('Error flash message');
$app->flashmessage->info('Info flash message');
$app->flashmessage->notice('Notice flash message');
$app->flashmessage->success('Success flash message');
$app->flashmessage->warning('Warning flash message');
$app->theme->setVariable('title', "Flash messages")
            ->setVariable('main', $app->flashmessage->outputMsgs());
$app->flashmessage->clearMessages();

// Render the response using theme engine.
$app->theme->render(); 