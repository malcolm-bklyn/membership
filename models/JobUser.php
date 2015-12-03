<?php namespace XNok\Membership\Models;

use Model;

/**
 * JobUser Model
 */
class JobUser extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xnok_membership_job_users';

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
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}