<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * @var array|null
     */
    protected static $cachedSettings = null;

    /**
     * Helper to get a setting value by key.
     */
    public static function get(string $key, $default = null)
    {
        if (self::$cachedSettings === null) {
            try {
                self::$cachedSettings = self::pluck('value', 'key')->all();
            } catch (\Throwable $e) {
                return $default;
            }
        }
        return self::$cachedSettings[$key] ?? $default;
    }

    /**
     * Helper to set/update a setting value by key.
     */
    public static function set(string $key, $value)
    {
        $result = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        
        if (self::$cachedSettings !== null) {
            self::$cachedSettings[$key] = $value;
        } else {
            self::$cachedSettings = [$key => $value];
        }
        
        return $result;
    }
}
