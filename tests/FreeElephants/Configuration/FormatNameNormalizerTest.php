<?php

namespace FreeElephants\Configuration;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

/**
 *
 * @author samizdam
 *
 */
class FormatNameNormalizerTest extends AbstractCalendarUnitTestCase
{

    public function testNormalizeFormatWithYamlAlias()
    {
        $configurationFormatNormalizer = new FormatNameNormalizer();
        $this->assertEquals("yaml", $configurationFormatNormalizer->normalizeFormat("yml"));
    }
}