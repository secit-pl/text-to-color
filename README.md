# Simple text to RGB color converter

This library allows to create RGB color from a given string.
The usage is as simple as possible (one line). The returned value
for each string will be the same for each execution so it's ideal
for generating dedicated user color from his/her name/username/email etc.

## Installation

From the command line run

```
$ composer require secit-pl/text-to-color
```

## Usage

```php
<?php

use SecIT\TextToColor;

echo TextToColor::toRGB('some text');
```

## Example outputs

| Input        | Output  |
|--------------|---------|
| example foo  | #17E500 |
| example      | #E50066 |
| foo bar      | #0059E5 |
| test         | #7800E5 |
| example text | #D300E5 |
| Username     | #6DE500 |
