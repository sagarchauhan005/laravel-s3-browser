# Laravel S3 browser

Laravel S3 browser helps you browse your S3 bucket and view the files in it, directly in your browser. You can then either delete the files or download them. 

This project shall come handy to anyone who wants to clean their S3 bucket by going through majority of the files and not randomly clean or move the files.

# Getting Started !

  - Edit your environment file with the following variables and assign their values
    - AWS_ACCESS_KEY_ID
    - AWS_SECRET_ACCESS_KEY
    - AWS_DEFAULT_REGION
    - AWS_BUCKET
 - Run ```composer update``` and wait for all the dependencies to load
 - Run ```php artisan serve```
 - Enjoy.

# NOTE
If you want only images, set ```ONLY_IMAGE_RESULT=true``` and ```IMAGE_PAGINATION_COUNT={large number}```, so that it can skip non-image files for pagination

You can also:
  - Import and save files from GitHub, Dropbox, Google Drive and One Drive
  - Drag and drop markdown and HTML files into Dillinger
  - Export documents as Markdown, HTML and PDF

# Author

 [Sagar Chauhan](https://twitter.com/chauhansahab005) works as a Technical Lead at [Veu](https://www.theveu.com) and [Animal Advertising Pvt Ltd](https://www.weareanimal.co).
 In his spare time, he hunts bug as a Bug Bounty Hunter.
 Follow him at [Instagram](https://www.instagram.com/chauhansahab005/), [Twitter](https://twitter.com/chauhansahab005),[Facebook](https://facebook.com/sagar.chauhan3),
[Github](https://github.com/sagarchauhan005)

# License
MIT
