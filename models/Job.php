<?php namespace XNok\Membership\Models;

use Model;

/**
 * Job Model
 */
class Job extends Model
{
    use \October\Rain\Database\Traits\SimpleTree;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xnok_membership_jobs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'mandate' => ['XNok\Membership\Models\Mandate'],
    ];
    public $belongsToMany = [
        'users' => ['Backend\Models\User', 'table' => 'xnok_membership_job_users'],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}