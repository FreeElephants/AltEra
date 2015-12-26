<?php
namespace FreeElephants\AltEra\Configuration;

/**
 *
 * @author samizdam
 *
 */
class ConfigurationFormatNormalizer implements ConfigurationFormatEnum
{

    /**
     *
     * @param string $format
     * @return string
     */
    public function normalizeFormat($format)
    {
        $normalizedFormat = strtolower($format);
        if ($normalizedFormat === 'yml') {
            $normalizedFormat = self::FORMAT_YAML;
        }
        return $normalizedFormat;
    }

    /**
     *
     * @param string $format
     * @return bool
     */
    public function isValidFormat($format)
    {
        return in_array($this->normalizeFormat($format), $this->getValidFormats(), true);
    }

    public function getValidFormats()
    {
        return [
            self::FORMAT_JSON,
            self::FORMAT_PHP,
            self::FORMAT_YAML
        ];
    }
}