<?php namespace XNok\Membership\Models;

use Model;

/**
 * Mandate Model
 */
class Mandate extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xnok_membership_mandates';

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
    public $hasMany = [
        'jobs' => ['XNok\Membership\Models\Job']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}