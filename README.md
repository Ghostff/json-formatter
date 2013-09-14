# Json Formatter

### Usage

```json
{
	"require" : {
		"hazbo/json-formatter" : "dev-master"
	}
}
```

```php
<?php

use Hazbo\Json\Formatter;

$formatter    = new Formatter($json_string);
$pretty_print = $formatter->format();
```