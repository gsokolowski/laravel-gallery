
## Laravel Gallery Rest API

- Original images needs to be downloaded and unpack to /public/originalimages directory
- use my artisan build command to import and optimise images
- php artisan import:images

- Images will be re-sized and optimised and dropped to /public/images directory of laravel project


## Gallery Controller

- to get list of active images
// get http://laravel-gallery.local/api/gallery/active

- to get list of deleted images
// get http://laravel-gallery.local/api/gallery/deleted

- to soft delete image
// delete http://laravel-gallery.local/api/gallery/4

- to restore soft deleted image
// put http://laravel-gallery.local/api/gallery/4/restore

