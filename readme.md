# MParser - Powerful String Parsing Library

MParser is a PHP package that simplifies parsing complex strings with custom tokens and expressions. It allows you to effortlessly create and extend parsing functionality using a flexible trait-based architecture. Easily integrate MParser into your projects for efficient string processing and data extraction in a user-friendly manner.

## Installation

You can install the MParser package using [Composer](https://getcomposer.org/). Run the following command:

```bash
composer require mojahed/mparser
```

## Basic Usage

To use MParser, follow these steps:

1. Import the necessary class:
   `use Mojahed\MParser;`

2. Parse the string with the provided data:
   ```php
   $data = [
       // Your data array here
   ];

   $string = "Your input string here";
   $result = MParser::parse($string, $data);
   ```

## Available Methods

MParser provides the following methods for parsing and replacing tokens in the input string:

### `exp`

Splits the token and returns the value at the specified index.

**Example:**
```php
$data = ['numbers' => '1-2-3-4-5'];
$string = "The second number is: <<numbers>[exp(-, 2)]>.";

// Result: "The second number is: 2."
```
!Note : exp doesn't supports (,) comma as first parameter

### `cut`

Extracts a substring from the token based on the start and length specified.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The first three letters are: <<word>[cut(1, 3)]>.";

// Result: "The first three letters are: hel."
```

### `cut_back`

Extracts a substring from the end of the token based on the length specified.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The last three letters are: <<word>[cut_back(3)]>.";

// Result: "The last three letters are: llo."
```

### `reverse`

Reverses the characters of the token.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The reversed word is: <<word>[reverse()]>.";

// Result: "The reversed word is: olleh."
```

### `sum`

Adds the specified number to the token (assumed to be numeric).

**Example:**
```php
$data = ['number' => 5];
$string = "The sum is: <<number>[sum(10)]>.";

// Result: "The sum is: 15."
```

### `sub`

Subtracts the specified number from the token (assumed to be numeric).

**Example:**
```php
$data = ['number' => 15];
$string = "The difference is: <<number>[sub(10)]>.";

// Result: "The difference is: 5."
```

### `mul`

Multiplies the token with the specified number (assumed to be numeric).

**Example:**
```php
$data = ['number' => 5];
$string = "The result is: <<number>[mul(3)]>.";

// Result: "The result is: 15."
```

### `div`

Divides the token by the specified number (assumed to be numeric). Returns 0 if the divisor is zero.

**Example:**
```php
$data = ['number' => 15];
$string = "The result is: <<number>[div(3)]>.";

// Result: "The result is: 5."
```

### `power`

Raises the token to the power of the specified number (assumed to be numeric).

**Example:**
```php
$data = ['number' => 2];
$string = "The result is: <<number>[power(3)]>.";

// Result: "The result is: 8."
```

### `upper`

Converts the token to uppercase.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The uppercase word is: <<word>[upper()]>.";

// Result: "The uppercase word is: HELLO."
```

### `lower`

Converts the token to lowercase.

**Example:**
```php
$data = ['word' => 'HELLO'];
$string = "The lowercase word is: <<word>[lower()]>.";

// Result: "The lowercase word is: hello."
```

### `capitalize`

Capitalizes the first character of the token while converting the rest to lowercase.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The capitalized word is: <<word>[capitalize()]>.";

// Result: "The capitalized word is: Hello."
```

### `replace`

Replaces occurrences of the search string with the replacement string in the token.

**Example:**
```php
$data = ['sentence' => 'The quick brown fox'];
$string = "The modified sentence is: <<sentence>[replace(quick, lazy)]>.";

// Result: "The modified sentence is: The lazy brown fox."
```

### `length`

Returns the length of the token (number of characters).

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The length of the word is: <<word>[length()]>.";

// Result: "The length of the word is: 5."
```

### `concat`

Concatenates the token with the specified string.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The concatenated word is: <<word>[concat( world)]>.";

// Result: "The concatenated word is: hello world."
```
# `Multiple Expression`
Use multiple expression at a time.

**Example:**
```php
$data = ['word' => 'hello'];
$string = "The length of hello world is: <<word>[concat( world)][upper()][length()]>.";

// Result: "The length of hello world is: 11."
```

## Custom Methods

You can add your own custom methods to extend the functionality of MParser. Simply create a new class that inherits from `MParser` and define your custom methods. For example:

```php
class ChildParser extends MParser
{
    function __construct($string, array $dataset)
    {
        parent::__construct($string, $dataset);
    }

    public function _reverse($token, $args)
    {
        return strrev($token);
    }
}
```

By creating the `ChildParser` class and defining the `_reverse` method, you can now use `[reverse()]` in your input string to call the custom method.

## Contributing

If you find any issues, have suggestions, or want to add new features, feel free to create an issue or submit a pull request on GitHub.

## License

This package is open-source and available under the [MIT License](https://opensource.org/licenses/MIT). Feel free to use and modify it according to your needs.
