<?php

namespace buzzingpixel\passstringparam;

/**
 * Class Pass_string_param
 */
class Pass_string_param
{
    /** @var \EE_Template $templateService */
    private $templateService;

    /**
     * Pass_string_param constructor
     */
    public function __construct()
    {
        // Set services
        $this->templateService = ee()->TMPL;
    }

    /**
     * Encode
     * @return string
     */
    public function encode()
    {
        if (! $this->templateService->tagdata) {
            return '';
        }
        return base64_encode($this->templateService->tagdata);
    }

    /**
     * Decode
     * @return string
     */
    public function decode()
    {
        if (! $this->isBase64Encoded($this->templateService->tagdata)) {
            return '';
        }
        return base64_decode($this->templateService->tagdata);
    }

    /**
     * Is a string base 64 encoded
     * @param string $str
     * @return bool
     */
    private function isBase64Encoded($str)
    {
        return (bool) preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $str);
    }
}
