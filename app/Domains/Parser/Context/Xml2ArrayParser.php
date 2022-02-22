<?php

namespace App\Domains\Parser\Context;

use App\Domains\Parser\Data\ParsedData;
use Illuminate\Support\Str;

class Xml2ArrayParser
{
    public function parse($xml):ParsedData
    {
        //convert xml to array
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //clear out the CDATA tags
        foreach ($array as $key=>$value){
            if(is_string($value) && Str::startsWith($value, '<![CDATA[')){
                $array[$key] = substr($value,9,-3);
            }
        }
        //return parsed data
        return new ParsedData($array);
    }
}
