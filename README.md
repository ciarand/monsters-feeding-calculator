Monsters Feeding Calculator
===========================
This project is a very simple CLI app built on [Cilex][] (which in turn is
built on [Symfony][] components) that calculates the food cost of raising a
monster in [My Singing Monsters][] to a certain level.

[Cilex]: http://cilex.github.io/
[Symfony]: http://symfony.com
[My Singing Monsters]: http://www.mysingingmonsters.com/home/

Why?
----
Good question. This is an experiment with [Cilex][] (and thus
[Symfony Console][]), as well as an experiment in writing namespaced, testable
classes.

I also wasn't sure how much food my Entbrat would take to get to level 15.

[Symfony Console]: symfony.com/doc/current/components/console/index.html

Installation
------------
1. Git clone the project

  ```bash
  git clone https://github.com/ciarand/monsters-feeding-calculator
  ```
2. Use [composer][] to install the dependencies

  ```bash
  composer install
  ```
3. Run the app

  ```bash
  php app.php --from-level 1 --to-level 15 --current-food-cost 15
  ```

[composer]: http://getcomposer.org/

Output
------
```bash
+-------+--------------------+------------+
| Level | Cost to next level | Total cost |
+-------+--------------------+------------+
| 1     | 60                 | 45         |
| 2     | 120                | 105        |
| 3     | 240                | 225        |
| 4     | 480                | 465        |
| 5     | 960                | 945        |
| 6     | 1920               | 1905       |
| 7     | 3840               | 3825       |
| 8     | 7680               | 7665       |
| 9     | 15360              | 15345      |
| 10    | 30720              | 30705      |
| 11    | 61440              | 61425      |
| 12    | 122880             | 122865     |
| 13    | 245760             | 245745     |
| 14    | 491520             | 491505     |
| 15    | 983040             | 983025     |
+-------+--------------------+------------+
```

Testing
-------
To run the test suite, install the `--dev` dependencies (currently Composer
does this by default, but that behavior may change) and run PHPUnit from the
root directory.
```bash
./vendor/bin/phpunit
```
Output:
```bash
❯ ./vendor/bin/phpunit
PHPUnit 3.7.25 by Sebastian Bergmann.

Configuration read from {REDACTED}/monsters-feeding-utility/phpunit.xml

 2   -_-_,------,
 0   -_-_|  /\_/\
 0   -_-~|_( ^ .^)
     -_- ""  ""


Time: 47 ms, Memory: 3.75Mb

OK (2 tests, 2 assertions)
```

The MIT License
---------------
Copyright © 2013 Ciaran Downey &lt;code@ciarand.me&gt;

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
