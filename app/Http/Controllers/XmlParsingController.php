<?php

namespace App\Http\Controllers;


use App\Domains\Parser\Context\Xml2ArrayParser;
use App\Domains\Reader\Context\XmlReader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class XmlParsingController extends Controller
{

    public function __construct(public XmlReader $xml_reader, public Xml2ArrayParser $parser) { }

    public function index(Request $request)
    {
        //read the first feed
        $xml = $this->xml_reader->read($request->all()['url'], $request->all()['node'])->xml;
        //convert to array
        $array = $this->parser->parse($xml)->data;
        //return the array as json
        return response()->json($array);
    }

}
