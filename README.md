```Gobline\Mailer\Swift_Mailer``` is a subclass of Fabien Potencier's [Swift_Mailer](http://swiftmailer.org/) class.
It allows to store a default sender in the *Swift_Mailer* instance.
This avoids specifying (hard-coded) the same sender address with ```$message->setFrom()``` for every new message application-wide.

## Installation

You can install the Mailer component using the dependency management tool [Composer](https://getcomposer.org/).
Run the *require* command to resolve and download the dependencies:

```
composer require gobline/mailer
```
