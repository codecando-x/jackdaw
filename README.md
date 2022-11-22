# Jackdaw

Dispatch execution for code workflows. Whether the execution flow comes in via HTTP, Websockets, Pub/Sub, Command Line, Etc... Jackdaw helps you route your execution to the desired Controller::StaticFunction , Controller->InstanceFunction or GlobalFunction.

Simple syntax to define where the execution will flow.

	ControllerName::StaticFunction
	ControllerName->InstanceFunction
	GlobalFunction

HTTP context sample 

Add this to a Apache virtual host config or an .htaccess file to configure routes, specific or catch all.

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^([a-zA-Z0-9_]+)$ example.php?action=$1 [L,QSA]
    RewriteRule ^([a-zA-Z0-9_]+)/([a-zA-Z0-9_]+)$ example.php?action=$1::$2 [L,QSA]


Sample route tests:

	http://localhost/global_function
	http://localhost/SampleController/instance_function
	http://localhost/SampleController/static_function
