<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class XmlParsingController extends Controller
{

    public function index(Request $request)
    {
        $url = $request->all()['url'];
        //open up a reader for the feed
        $reader = new \XMLReader();
        $reader->open($url);
        //loop through the feed until we find the related tag
        while ($reader->read() && $reader->name !== $request->all()['node'] ){}
        $node = new \SimpleXMLElement($reader->readOuterXML(), LIBXML_NOCDATA);
        $reader->close();
        $xml = simplexml_load_string($node->asXML(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        foreach ($array as $key=>$value){
            if(Str::startsWith($value, '<![CDATA[')){
                $array[$key] = substr($value,9,-3);
            }
        }
        return response()->json($array);
    }

}
