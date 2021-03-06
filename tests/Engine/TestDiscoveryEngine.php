<?php

/**
 * This file is part of the GraphAware Reco4PHP package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Reco4PHP\Tests\Engine;

use GraphAware\Common\Cypher\Statement;
use GraphAware\Common\Cypher\StatementInterface;
use GraphAware\Reco4PHP\Context\Context;
use GraphAware\Reco4PHP\Engine\SingleDiscoveryEngine;
use GraphAware\Common\Type\Node;

class TestDiscoveryEngine extends SingleDiscoveryEngine
{
    public function discoveryQuery(Node $input, Context $context) : StatementInterface
    {
        $query = "MATCH (n) WHERE id(n) <> {inputId} RETURN n";

        return Statement::create($query, ['inputId' => $input->identity()]);
    }

    public function name() : string
    {
        return "test_discovery";
    }

}