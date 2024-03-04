<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;

    // 대량 할당을 허용.
    // 값을 한꺼번에 할당할 경우 필요하지 않은 값도 수정을 할 수 있게되어 탈취의 대상이 될 수 있다.
    // 예를 들어 email을 수정하는 기능인데 is_admin을 예상하고 ture 값을 주면, 실제 is_admin으로 관리자를 설정하고 있을 때, 의도치 않은 계정에 관리자 권한을 부여할 수 있게 된다.
    // 그렇기 때문에 라라벨에서는 기본적으로 대량 할당을 금지하고 있고, 이를 위해 임의적으로 대량 할당을 허용해야하는 경우가 생긴다.
    protected $fillable = [
        'title',
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
