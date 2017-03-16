<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Identicon\Identicon;
use Exception;
use Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 根据 email 生成随机头像
     *
     * @param $email
     *
     * @return string
     */
    static public function avatar($email)
    {
        $identicon = new Identicon();
        // 图片背景颜色设置为 白色
        // 图片长宽默认为 64
        $imageDataUri = $identicon->getImageData($email, 64, null, '#FFFFFF');
        // 用户头像命名规则 ：当前时间戳加6为随机数
        $avatar_name = time().mt_rand(100000, 999999).'.png';

        try
        {
            Storage::put('public/avatars/'.$avatar_name, $imageDataUri);

            return "/avatars/".$avatar_name;
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }
}
