omnipay-sherlock-lcl
=============

**LCL Sherlock SIPS-v2 driver for the Omnipay PHP payment processing library**

## Basic Usage

The following gateways are provided by this package:

* Sherlock_Offsite

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.


## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "gvalfr35/omnipay-sherlock-lcl": "~3.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update



## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/dioscouri/omnipay-cybersource/issues),
or better yet, fork the library and submit a pull request.

## Troubleshooting

An incorrect currency will return an error like:

Technical problem  : code=03 message=None of the merchant's payment means is compliant with the transaction context
