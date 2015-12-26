<?php
namespace FreeElephants\Configuration;

/**
 *
 * @author samizdam
 *
 */
class FormatNameNormalizer implements FormatEnum
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