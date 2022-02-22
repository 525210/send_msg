<?php

function text_to_speech($text)
{


// Note: new unified SpeechService API key and issue token uri is per region
// New unified SpeechService key
// Free: https://azure.microsoft.com/en-us/try/cognitive-services/?api=speech-services
// Paid: https://go.microsoft.com/fwlink/?LinkId=872236
    $region = 'eastasia';
    $AccessTokenUri = "https://".$region.".api.cognitive.microsoft.com/sts/v1.0/issueToken";
    $apiKey = '44e16094d0a740949effabcd9c697fec';

// use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Ocp-Apim-Subscription-Key: ".$apiKey."\r\n" . "content-length: 0\r\n",
            'method'  => 'POST',
        ),
    );

    $context  = stream_context_create($options);

    $access_token = file_get_contents($AccessTokenUri, false, $context);
    if (!$access_token) {
        throw new Exception("Problem with $AccessTokenUri, $php_errormsg");
    }
    else{


        $ttsServiceUri = "https://".$region.".tts.speech.microsoft.com/cognitiveservices/v1";

        //$SsmlTemplate = "<speak version='1.0' xml:lang='en-us'><voice xml:lang='%s' xml:gender='%s' name='%s'>%s</voice></speak>";
        $doc = new DOMDocument();

        $root = $doc->createElement( "speak" );
        $root->setAttribute( "version" , "1.0" );
        $root->setAttribute( "xml:lang" , "he-IL" );

        $voice = $doc->createElement( "voice" );
        $voice->setAttribute( "xml:lang" , "he-IL" );
        $voice->setAttribute( "xml:gender" , "Female" );
        $voice->setAttribute( "name" , "he-IL-AvriNeural"); // Short name for "Microsoft Server Speech Text to Speech Voice (en-US, Guy24KRUS)"

        $text = $doc->createTextNode($text);
        //$text = $doc->createTextNode( "This is a demo to call microsoft text to speech service in php." );

        $voice->appendChild( $text );
        $root->appendChild( $voice );
        $doc->appendChild( $root );
        $data = $doc->saveXML();


        $options = array(
            'http' => array(
                'header'  => "Content-type: application/ssml+xml\r\n" .
                    "X-Microsoft-OutputFormat: riff-8khz-16bit-mono-pcm\r\n" .
                    "Authorization: "."Bearer ".$access_token."\r\n" .
                    "X-Search-AppId: 07D3234E49CE426DAA29772419F436CA\r\n" .
                    "X-Search-ClientID: 1ECFAE91408841A480F00935DC390960\r\n" .
                    "User-Agent: TTSPHP\r\n" .
                    "content-length: ".strlen($data)."\r\n",
                'method'  => 'POST',
                'content' => $data,
            ),
        );

        $context  = stream_context_create($options);

        // get the wave data
        $result = file_get_contents($ttsServiceUri, false, $context);
        if (!$result)
        {
            throw new Exception("Problem with $ttsServiceUri, $php_errormsg");
        }
        else
        {
           return $result;

        }
    }
}
