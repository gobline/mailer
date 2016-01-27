<?php

/*
 * Gobline Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gobline\Mailer;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class SwiftMailer extends \Swift_Mailer
{
    private $defaultFrom;

    public function setDefaultFrom($defaultFrom)
    {
        $this->defaultFrom = $defaultFrom;

        return $this;
    }

    public function getDefaultFrom()
    {
        return $this->defaultFrom;
    }
}
