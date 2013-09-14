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

`composer update`

<?php
require('path/to/autoload.php');

use Hazbo\Json\Formatter;

$formatter    = new Formatter($json_string);
$pretty_print = $formatter->format();
```