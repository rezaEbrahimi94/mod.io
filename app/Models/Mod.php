<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    use HasFactory;
    

    /**
     * The fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'user_id',
    ];

    /**
     * Get the mod's ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * Get the mod's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * Get the mod's path.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->getAttribute('path');
    }

    /**
     * Get the mod's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->getAttribute('created_at');
    }

    /**
     * Define the relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
