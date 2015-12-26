<?php

namespace FreeElephants\AltEra\Configuration;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

/**
 *
 * @author samizdam
 *
 */
class ConfigurationFormatNormalizerTest extends AbstractCalendarUnitTestCase
{

    public function testNormalizeFormatWithYamlAlias()
    {
        $configurationFormatNormalizer = new ConfigurationFormatNormalizer();
        $this->assertEquals("yaml", $configurationFormatNormalizer->normalizeFormat("yml"));
    }
}