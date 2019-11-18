# image-library
it's for convert image to base64 and decode base64 to image

# Binary Image to Base64

```php
try{
    $ImageEncoder = new \HamidAtyabi\ImageLibrary\ImageEncoder(array("jpeg", "gif", "png"));
    $result = $ImageEncoder->encode($binaryImage);
    var_dump(($result));

} catch (ImageLibrary\Exceptions\LibraryNotFound $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\ContentTypeNotValid $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\FileSizeTooLarge $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\ExtensionNotAllow $ex) {
    echo ($ex->getMessage());
}
```

# Base64 to Image

```php
try{
    $base64EncodedImage = "/9j/4AAQSkZJRgABAQAAAQA...";
    $ImageDecoder = new \HamidAtyabi\ImageLibrary\ImageDecoder($base64EncodedImage, array("jpeg", "gif", "png"));
    $result = $ImageDecoder->upload("/var/www/html/uploads/");
    var_dump($result);

} catch (DirectoryNotPermission $ex) {
    echo ($ex->getMessage());
} catch (DirectoryNotValid $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\LibraryNotFound $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\ContentTypeNotValid $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\FileSizeTooLarge $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\ExtensionNotAllow $ex) {
    echo ($ex->getMessage());
} catch (ImageLibrary\Exceptions\Base64Format $ex) {
    echo ($ex->getMessage());
} 
```
