## Installation ##

First, create your vkontakte application and enter "app url" option. http://vkontakte-sandbox.loc for example.

Then:

*  Fetch code from github and init submodules;
*  Create your database.yml;
*  Copy plugins/sfVkontaktePlugin/config/settings-example.yml to config/settings.yml and change values to yours;
*  Run ./symfony doctrine:build --all --and-load.

Thats all! Open vkontakte application and you will see suggestion to set necessary options. After necessary options set, application will run.
