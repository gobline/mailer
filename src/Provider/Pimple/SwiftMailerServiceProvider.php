<?php

/*
 * Mendo Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mendo\Mailer\Provider\Pimple;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Mendo\Mailer\Swift_Mailer;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class SwiftMailerServiceProvider implements ServiceProviderInterface
{
    private $reference;

    public function __construct($reference = 'mailer')
    {
        $this->reference = $reference;
    }

    public function register(Container $container)
    {
        $reference = $this->reference;

        $container[$reference.'.secure'] = 'ssl';
        $container[$reference.'.port'] = 465;

        $container[$reference] = function ($c) use ($reference) {
            if (empty($c[$reference.'.host'])) {
                throw new \Exception('host not specified');
            }
            if (empty($c[$reference.'.user'])) {
                throw new \Exception('user not specified');
            }
            if (empty($c[$reference.'.password'])) {
                throw new \Exception('password not specified');
            }
            if (empty($c[$reference.'.from.default'])) {
                throw new \Exception('default from not specified');
            }

            $transport = \Swift_SmtpTransport::newInstance($c[$reference.'.host'], $c[$reference.'.port'], $c[$reference.'.secure'])
                ->setUsername($c[$reference.'.user'])
                ->setPassword($c[$reference.'.password']);

            $mailer = new Swift_Mailer($transport);
            $mailer->setDefaultFrom($c[$reference.'.from.default']);

            return $mailer;
        };
    }
}
