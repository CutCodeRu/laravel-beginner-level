<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        $directory = Str::of(get_class($model))->afterLast("\\")
            ->lower()
            ->plural()
            ->prepend('public/');

        if(!$value instanceof \Illuminate\Http\UploadedFile) {
            if(is_string($value)) {
                return $value;
            }

            if(!request()->hasFile($key)) {
                return null;
            }

            $value = request()->file($key);
        }

        if($path = $value->store($directory)) {
            $value = Storage::url($path);
        } else {
            return null;
        }

        return $value;
    }
}
