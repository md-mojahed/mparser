# MParser

MParser is a powerful PHP package that simplifies parsing complex strings with custom tokens and expressions. With a flexible trait-based architecture, it enables effortless creation and extension of parsing functionality. Easily integrate MParser into your projects for efficient string processing and data extraction in a user-friendly manner.

## Installation

You can install MParser via Composer. Run the following command in your project directory:

```bash
composer require mojahed/mparser
```

## Usage

To use MParser, first, make sure you have an associative array ($data) containing the data you want to replace in your string. Then, create an instance of `MParser` and call the `parse()` method with your string and dataset as arguments:

```php
use Mojahed\MParser;

$data = [
    'name' => 'Mojahedul Islam',
    'age' => 28,
    // Add more key-value pairs as needed
];

$str = "Hello, my name is <name>. I am <age> years old.";

$result = MParser::parse($str, $data);

echo $result;
```

### Sample Output

```
Hello, my name is Mojahedul Islam. I am 28 years old.
```

## Custom Tokens and Expressions

MParser allows you to define custom tokens and expressions to perform more complex operations on the data. The package comes with several built-in trait methods that can be used within expressions. Here are some examples:

### 1. reverse()

Reverse a given token (string):

```php
$str = "Reverse of <name> is: <<name>[reverse()]>.";

// Output: Reverse of Mojahedul Islam is: masI ludeha joM.
```

### 2. cut(start, length)

Extract a substring from a given token:

```php
$str = "First three letters of <name> are: <<name>[cut(1, 3)]>.";

// Output: First three letters of Mojahedul Islam are: Moj.
```

### 3. cut_back(length)

Extract a substring from the end of a given token:

```php
$str = "Last three letters of <name> are: <<name>[cut_back(3)]>.";

// Output: Last three letters of Mojahedul Islam are: lam.
```

### 4. sum(value)

Add a numeric value to a given token:

```php
$str = "Adding 5 to <age> results in: <<age>[sum(5)]>.";

// Output: Adding 5 to 28 results in: 33.
```

### 5. sub(value)

Subtract a numeric value from a given token:

```php
$str = "Subtracting 10 from <age> results in: <<age>[sub(10)]>.";

// Output: Subtracting 10 from 28 results in: 18.
```

### 6. exp(delimiter, index)

Split a token into an array using a delimiter and return the element at a specific index:

```php
$data = [
    'skills' => 'PHP, JavaScript, HTML, CSS',
];

$str = "My first skill is: <<skills>[exp(, 1)]>.";

// Output: My first skill is: PHP.
```

Feel free to combine these expressions and tokens creatively to suit your specific use cases.

## License

This package is open-source and released under the MIT License. See the [LICENSE](LICENSE) file for more information.
