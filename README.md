# File Sharing Website Template
Really simple template for file sharing/hosting websites (like Firefox Send, WeTranfer and others).

## Instructions
Files you want to share need to be placed in "cdn" directory. They could be accessed by name (i.e. `YOUR-WEBSITE.COM/download.php?file=FILE-NAME-WITH-SPACES`) or by hash (i.e. `YOUR-WEBSITE.COM/download.php?hash=FILE-HASH`). Hash is calculated with the CRC32 algorithm.

This is a PHP-based website so you need to have a webserver installed on your machine.

## Live preview
You can preview the website at http://mrriky54hd.altervista.org/cdn/

Test download file at http://mrriky54hd.altervista.org/cdn/download.php?hash=00000000

## 404
404 page has been swapped with "notfound.org" 404 page. If you don't like that, you can change the option and create your own 404 page at "download.php"

## License
This work is licensed under GNU GPL v3 license.
