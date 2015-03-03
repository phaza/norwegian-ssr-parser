## This package was sponsored by [tjenestetorget.no][1] / [helsetjenester.no][2]

# What
This package contains functionality to parse the 'Norsk stedsnavnregister' (Norwegian location name register) geojson
dump as a stream. The main benefit over other parsers is that it is **stream** based, and hence doesn't load the full
file (usually ~500MB) into memory at once. The sacrifice for this is speed. This relies on a json stream parser
written in PHP, which naturally is slower than native `json_decode`.

# How
**Install the package**  
    
	composer require "phaza/norwegian-ssr-parser"
	
**Use the parser**
``
#!PHP
<?php
  
use Phaza\SSR\Feature;
use Phaza\SSR\Listener;

$handle = fopen('Stedsnavn.geojson', 'r');

$listener = new Listener(function(Feature $item) {
	/* Do your magic in the closure */
});
$parser = new JsonStreamingParser_Parser($handle, $listener);
$parser->parse();

fclose($handle);
```

# Tip

Remember that with PHP's stream filters, you can decompress on the fly.
 
Example:
```
#!PHP
<?php

$handle = fopen('Stedsnavn.bz2', 'r');
stream_filter_append($handle, 'bzip2.decompress', STREAM_FILTER_READ);
$parser = new JsonStreamingParser_Parser($handle, $listener);
fclose($handle);

// pr

$handle = fopen('compress.bzip2://Stedsnavn.bz2', 'r');
$parser = new JsonStreamingParser_Parser($handle, $listener);
fclose($handle);

```


[1]: http://tjenestetorget.no
[2]: http://helsetjenester.no
