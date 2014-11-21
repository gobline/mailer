<?php

/*
 * Mendo Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mendo\Mailer;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class Swift_Mailer extends \Swift_Mailer
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
