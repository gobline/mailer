<?php

/*
 * Mendo Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Mendo\Mailer\Provider\Pimple\SwiftMailerServiceProvider;
use Pimple\Container;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testServiceProvider()
    {
        $container = new Container();
        $container->register(new SwiftMailerServiceProvider());
        $container['mailer.host'] = 'smtp.gmail.com';
        $container['mailer.user'] = 'someUser';
        $container['mailer.password'] = 'somePassword';
        $container['mailer.from.default'] = 'someDefaultSender';
        $this->assertInstanceOf('Mendo\Mailer\Swift_Mailer', $container['mailer']);
    }
}
