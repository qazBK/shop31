<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'categories',
        'name',
        'description',
        'price',
        'images',
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','ctegory_id');
    }

    private function createThumbnailWithWatermark($sourcePath, $outputPath): void
    {
        [$origWidth, $origHeight, $imageType] = getimagesize($sourcePath);

        $srcImage = match ($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
        };

        $maxWidth = 300;
        $maxHeight = 300;

        if ($origWidth > $origHeight) {
            $newWidth = $maxWidth;
            $newHeight = $origHeight * $newWidth / $origWidth;
        } else {
            $newHeight = $maxHeight;
            $newWidth = $origWidth * $newHeight / $origHeight;
        }

        if ($newWidth > $maxWidth) {
            $newHeight = $newHeight * $maxWidth / $newWidth;
            $newWidth = $maxWidth;
        }

        if ($newHeight > $maxHeight) {
            $newWidth = $newHeight * $maxHeight / $newHeight;
            $newHeight = $maxHeight;
        }

        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresized($newImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        $text = "Shop";
        $fontSize = 10;
        $fontColor = imagecolorallocate($newImage, 100, 100, 100);
        imagestring($newImage, $fontSize, $newWidth - 40, $newHeight - 15, $text, $fontColor);

        imagejpeg($newImage, $outputPath, 90);

        imagedestroy($newImage);
        imagedestroy($srcImage);
    }


    public function updateImages(array|Illuminate\Http\UploadedFile|null $files)
    {
        if ($files) {
            $images = [];

            foreach ($files as $image) {
                // 1. Генерация уникального имени файла
                $imageName = uniqid(). '.' . $image->getClientOriginalName();
                // Пример: "662a1b3c-image.jpg"

                // 2. Определяем, куда сохранять обработанное изображение
                $outputPath = public_path( path: 'images' ) . '/'. $imageName;
                // Пример: "/var/www/public/images/662a1b3c-image.jpg"

                // 3. Проверяем, существует ли временный файл
                if (file_exists($image->getRealPath())) {
                    // getRealPath() возвращает что-то вроде: "/tmp/php7F3F.tmp"
                }

                // 4. Создадим миниатюру и водяную надпись
                $this->createThumbnailWithWatermark(
                    $image->getRealPath(), // Вход: временный файл
                    $outputPath    // Выход: постоянное место
                );

                // 5. Сохраняем относительный путь для БД
                $images[] = 'images/'. $imageName;
                // Пример: "images/662a1b3c-image.jpg"
            }

            // 6. Сохраняем массив путей в JSON поле
            $this->images = $images;
            $this->save();
        }
    }
    protected   function  casts()
    {
        return[
          'images'=>'array',
        ];
    }
    public function defaultImage(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (empty($this->images)) {
                    return asset('assets/img/default.jpg');
                }

                $images = is_array($this->images) ? $this->images : json_decode($this->images, true);

                if (empty($images)) {
                    return asset('assets/img/default.jpg');
                }

                return asset($images[0]);
            }
        );
    }
    public function imageUrls(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (empty($this->images)) {
                    return [];
                }

                return array_map(function ($image) {
                    return asset($image);
                }, $this->images);
            }
        );
    }

}

